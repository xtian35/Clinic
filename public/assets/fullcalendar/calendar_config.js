$(document).ready(function () {
  var calendar = $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,listWeek",
    },
    defaultView: "month",
    selectable: true,
    selectHelper: true,
    contentHeight: "auto",
    select: function (start, end) {
      var currentDate = moment();
      console.log("Hey");
      if (start.isBefore(currentDate, "day")) {
        failed("Cannot select a date in the past");
        return;
      }
      Swal.fire({
        title: "Are you sure?",
        text: "Do you want to set this time as available?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "http://localhost/Clinic Capstone/actions/saveCalendar.php",
            type: "POST",
            data: {
              date: start.format("YYYY-MM-DD"),
            },
            success: function (response) {
              response = JSON.parse(response);
              console.log(response);
              if (response.status === "success") {
                success(response.message);
                calendar.fullCalendar("refetchEvents"); // Refresh events after successful setting
              }
            },
          });
        } else {
          calendar.fullCalendar("unselect");
        }
      });
    },
    editable: false,
    events: function (start, end, timezone, callback) {
      $.ajax({
        url: "http://localhost/Clinic Capstone/actions/getSavedDates.php",
        type: "GET",
        success: function (response) {
          response = JSON.parse(response);
          console.log(response);
          if (response.status == "success") {
            console.log(response.status);
            var events = [];
            $.each(response.data, function (i, item) {
              events.push({
                id: item.Doctor_schedule_ID,
                title: "Available",
                start: item.Doctor_schedule_avail,
                allDay: true,
              });
            });
            callback(events);
          } else {
            failed("Error getting availability.");
          }
        },
        error: function (xhr, status, error) {
          // Handle the error
          failed("Error getting availability.");
        },
      });
    },
    eventClick: function (event, jsEvent, view) {
      Swal.fire({
        title: "Are you sure?",
        text: "Do you want to delete this Available time?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "http://localhost/Clinic Capstone/actions/deleteCalendar.php",
            data: {
              delete_Schedule: true,
              Doctor_schedule_ID: event.id,
            },
            type: "POST",
            success: function (response) {
              response = JSON.parse(response);
              if (response.status == "success") {
                success(response.message);
                calendar.fullCalendar("refetchEvents"); // Refresh events after successful setting
              } else {
                failed("Error setting time.");
                calendar.fullCalendar("unselect");
              }
            },
            error: function (xhr, status, error) {
              // Handle the error
              failed("Error setting time.");
              calendar.fullCalendar("unselect");
            },
          });
        }
      });
    },
  });
  function success(message) {
    Swal.fire({
      title: "Success",
      text: message,
      icon: "success",
      confirmButtonText: "Yes",
      cancelButtonText: false,
    });
  }

  function failed(message) {
    Swal.fire({
      title: "Failed",
      text: message,
      icon: "warning",
      confirmButtonText: "Yes",
      cancelButtonText: false,
    });
  }
});



$(document).ready(function () {
  var urlHttp = "http://localhost/Clinic Capstone/actions/";

  var calendar2 = $("#calendarsetSched").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,listWeek",
    },
    defaultView: "month",
    selectable: true,
    selectHelper: true,
    contentHeight: "auto",
    editable: false,
    events: function (start, end, timezone, callback) {
      $.ajax({
        url: "http://localhost/Clinic Capstone/actions/getSavedDates.php",
        type: "GET",
        success: function (response) {
          response = JSON.parse(response);
          console.log(response);
          if (response.status == "success") {
            console.log(response.status);
            var events = [];
            $.each(response.data, function (i, item) {
              events.push({
                id: item.Doctor_schedule_ID,
                title: "Available",
                start: item.Doctor_schedule_avail,
                allDay: true,
                // Add a custom property to indicate this is an available date
                isAvailable: true,
                backgroundColor: "blue",
              });
            });
            // Retrieve booked appointments for the selected date
            $.ajax({
              url: "http://localhost/Clinic Capstone/actions/getStatus.php",
              type: "GET",
              success: function (response) {
                response = JSON.parse(response);
                if (response.status == "success") {
                  console.log(response.data);
                  if (response.data.length > 0) {
                    $.each(response.data, function (i, item) {
                      var title =
                        item.Appointment_status == 0
                          ? "Pending"
                          : item.Appointment_status == 1
                            ? "Accepted"
                            : item.Appointment_status == 2
                              ? "Rejected"
                              : item.Appointment_status == 3
                                ? "Cancelled"
                                : item.Appointment_status == 4
                                  ? "Done"
                                  : "Dne";
                      var backgroundColor =
                        item.Appointment_status == 0
                          ? "orange"
                          : item.Appointment_status == 1
                            ? "green"
                            : item.Appointment_status == 2
                              ? "red"
                              : item.Appointment_status == 3
                                ? "red"
                                : item.Appointment_status == 4
                                  ? "light-blue"
                                  : "blue";

                      events.push({
                        id: item.Appointment_ID,
                        title: title,
                        start: item.Doctor_schedule_avail,
                        allDay: true,
                        isAvailable: false, // set isAvailable to false for booked appointments
                        backgroundColor: backgroundColor,
                      });
                    });
                  }
                }
                // Call the callback function after all events have been added to the events array
                callback(events);
              },
              error: function (xhr, status, error) {
                callback(events);
              },
            });
          } else {
            callback(events);
          }
        },
        error: function (xhr, status, error) {
          // Handle the error
          failed("Error getting availability.");
        },
      });
    },
    eventClick: function (event, jsEvent, view) {
      var currentDate = moment();
      if (moment(event.start).isBefore(currentDate, "day")) {
        failed("Cannot select a date in the past");
        return;
      }
      $.ajax({
        url:
          urlHttp +
          "checkDate.php?date=" +
          moment(event.start).format("YYYY-MM-DD"),
        type: "GET",
        success: function (response) {
          var responseData = JSON.parse(response);
          if (responseData === "occupied") {
            if (moment(event.start).isBefore(currentDate, "day")) {
              // Show an alert message that the selected date is not acceptable
              failed("Cannot select a date in the past");
              return;
            }
            checkTime(moment(event.start).format("YYYY-MM-DD"));
            $("#timeSchedule").modal("show");
            $("#dAte_time").html(
              " " + moment(event.start).format("MMMM D, YYYY")
            );
            $("#DateSchedule").val(moment(event.start).format("YYYY-MM-DD"));
            $("#setSched").on("click", function (event) {
              event.preventDefault();
              $.ajax({
                url: urlHttp + "setScheduleForm.php",
                type: "POST",
                data: {
                  DateSchedule: $("#DateSchedule").val(),
                  schedTime: $("input[name=schedTime]:checked").val(),
                  Services: $("input[name='services[]']:checked")
                    .map(function () {
                      return $(this).val();
                    })
                    .get(),
                },

                success: function (response) {
                  console.log(response);
                  if (response.status === "success") {
                    $("#Services").modal("hide");
                    $("#timeSchedule").modal("hide");
                    success(response.message);
                    calendar2.fullCalendar("refetchEvents"); // Refresh events after successful setting
                  } else {
                    alert("Error: " + response.message);
                  }
                },
              });
            });
          }
          calendar2.fullCalendar("unselect");
        },
        error: function (xhr, status, error) {
          // Handle the error
          failed("Error getting availability.");
        },
      });
    },
  });
  function success(message) {
    Swal.fire({
      title: "Success",
      text: message,
      icon: "success",
      confirmButtonText: "Yes",
      cancelButtonText: false,
    });
  }

  function failed(message) {
    Swal.fire({
      title: "Failed",
      text: message,
      icon: "warning",
      confirmButtonText: "Yes",
      cancelButtonText: false,
    });
  }
  function checkTime(date) {
    $.ajax({
      url: urlHttp + "checkTime.php",
      type: "GET",
      data: {
        date: date,
      },
      success: function (response) {
        $("#Time_disable").html(response);
      },
      error: function (xhr, status, error) {
        // Handle the error
        failed("Error getting time availability.");
      },
    });
  }
});
