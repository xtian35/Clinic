$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,listWeek'
        },
        defaultView: 'month',
        selectable: true,
        selectHelper: true,
        contentHeight: 'auto',
        select: function (start, end) {
            var currentDate = moment();
            if (start.isBefore(currentDate, "day")) {
                failed('Cannot select a date in the past');
                return;
            }
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to set this time as available?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "http://localhost/Clinic Capstone/actions/saveCalendar.php",
                        type: "POST",
                        data: {
                            date: start.format("YYYY-MM-DD"),
                        },
                        success: function (response) {
                            if (response.status === "success") {
                                successMessage(response.message);
                                fetchSavedDates();
                            }
                        },
                    });
                } else {
                    calendar.fullCalendar('unselect');
                }
            });
        },
        editable: false,
        events: function (start, end, timezone, callback) {

            $.ajax({
                url: 'http://localhost/Clinic Capstone/actions/getSavedDates.php',
                type: "GET",
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.status == "success") {
                        var events = [];
                        $.each(response.data, function (i, item) {
                            events.push({
                                id: item.Doctor_schedule_ID,
                                title: 'Available',
                                start: item.Doctor_schedule_avail,
                                allDay: false
                            });
                        });
                        callback(events);
                    } else {
                        failed('Error getting availability.');
                    }
                },
                error: function (xhr, status, error) {
                    // Handle the error
                    failed('Error getting availability.');
                }
            });
        },
        eventClick: function (event, jsEvent, view) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to delete this Available time?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'http://localhost/Clinic Capstone/actions/deleteCalendar.php',
                        data: {
                            delete_Schedule: true,
                            availability_ID: event.id,
                        },
                        type: "POST",
                        success: function (response) {
                            response = JSON.parse(response);
                            if (response.status == "success") {
                                success(response.message);
                                calendar.fullCalendar('refetchEvents'); // Refresh events after successful setting
                            } else {
                                failed('Error setting time.');
                                calendar.fullCalendar('unselect');
                            }
                        },
                        error: function (xhr, status, error) {
                            // Handle the error
                            failed('Error setting time.');
                            calendar.fullCalendar('unselect');
                        }
                    });
                }
            });
        }
    });
    function success(message) {
        Swal.fire({
            title: 'Success',
            text: message,
            icon: 'success',
            confirmButtonText: 'Yes',
            cancelButtonText: false
        })
    }

    function failed(message) {
        Swal.fire({
            title: 'Failed',
            text: message,
            icon: 'warning',
            confirmButtonText: 'Yes',
            cancelButtonText: false
        })
    }
});






$(document).ready(function () {
    var teacher_ID = $('#calendarStudent').attr('teacher-ID');
    console.log(teacher_ID);
    var calendar = $('#calendarStudent').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            // right: 'agendaWeek'
        },
        defaultView: 'agendaWeek',
        selectable: false,
        selectHelper: false,
        slotLabelInterval: '00:30:00',
        minTime: '07:30:00',
        maxTime: '17:00:00',
        slotDuration: '00:30:00',
        contentHeight: 'auto',
        editable: false,
        events: function (start, end, timezone, callback) {
            $.ajax({
                url: `http://localhost/Research Management System/ajax/getTime.php?getStudent&teacher_ID=${teacher_ID}`,
                type: "GET",
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.status == "success") {
                        var events = [];
                        $.each(response.data, function (i, item) {
                            events.push({
                                id: item.availability_ID,
                                title: item.availability_Status,
                                start: item.availability_startDatetime,
                                end: item.availability_endDatetime,
                                allDay: false
                            });
                        });
                        callback(events);
                    } else {
                        failed('Do not have available Schedules.');
                    }
                },
                error: function (xhr, status, error) {
                    // Handle the error
                    failed('Do not have available Schedules.');
                }
            });
        },
        slotLabelFormat: ['h:mm'],
        timeFormat: 'h:mm',
        slotEventOverlap: false,
        businessHours: {
            start: '07:30',
            end: '17:00',
            dow: [1, 2, 3, 4, 5]
        },
        allDaySlot: false,
    });
    function failed(message) {
        Swal.fire({
            title: 'Not Available',
            text: message,
            icon: 'warning',
            confirmButtonText: 'Yes',
            cancelButtonText: false
        })
    }
});
