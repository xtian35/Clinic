$(".logout").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");
  Swal.fire({
    type: "warning",
    icon: "warning",
    title: "Are You Sure?",
    text: "You will be logout",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Logout",
    customClass: {
      actions: "my-actions",
      cancelButton: "order-1 right-gap",
      confirmButton: "order-2",
      container: "my-swal",
    },
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    }
  });
});

$(document).ready(function () {
  $("#imageInput").change(function (event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#previewImage").html(
        '<img src="' + e.target.result + '" class="img-fluid img-prev"/>'
      );
    };
    reader.readAsDataURL(file);
  });
});

$("#cancel").on("submit", function (e) {
  e.preventDefault();
  const form = $(this);
  const actionUrl = form.attr("action");
  Swal.fire({
    type: "warning",
    icon: "warning",
    title: "Are You Sure?",
    text: "This Appointment will be cancelled",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Confirm",
    customClass: {
      actions: "my-actions",
      cancelButton: "order-1 right-gap",
      confirmButton: "order-2",
      container: "my-swal",
    },
  }).then((result) => {
    if (result.value) {
      form.unbind("submit").submit();
    }
  });
});


$(document).ready(function () {
  function attachClickEvent() {
    $(".teeths").on("click", function (e) {
      var $teethBox = $(this).closest("#teeth_box");

      var $popup = $teethBox.find("#popup");
      var offset = $teethBox.offset();
      var x = e.pageX - offset.left;
      var y = e.pageY - offset.top;
      var toothId = $(this).attr("tooth-id");
      // console.log(toothId);

      var toothstatus = $(this).attr("tooth-status");
      console.log(toothstatus);

      if (toothstatus == 1 || toothstatus == 2 || toothstatus == 3 || toothstatus == 4) {
        $("#normal-tooth").show();
      } else {
        $("#normal-tooth").hide();
      }
      $popup
        .css({
          top: y - 10 + "px",
          left: x + 20 + "px",
          zIndex: "999",
        })
        .show();

      //Ajax update the teeth
      $(".tooties").on("click", function () {
        var tooth_type = $(this).attr("tooth-type");
        $.ajax({
          url: "http://localhost/Clinic%20Capstone/actions/tooth_update.php",
          type: "POST",
          data: {
            tooth_ids: toothId,
            tooth_types: tooth_type,
          },
          success: function (response) {
            if (response.success) {
              $("#teeth_box")
                .empty()
                .load(location.href + " #teeth_box>*", function () {
                  attachClickEvent();
                });
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          },
        });
      });
    });
  }

  attachClickEvent();
});


$("#prescriptcheckbox").on("change", function () {
  var checked = $("#prescriptcheckbox").prop("checked");
  if (!checked) {
    $("#prescription").hide();
  } else {
    $("#prescription").show();
  }
});


function password(id) {
  var input = document.getElementById(id);
  if (input.type === "password") {
    input.type = "text";
  } else {
    input.type = "password";
  }
}

$(document).ready(function () {
  $("#filter-input").on("change", function () {
    $("#filter-form").submit();
  });
});



$(document).ready(function () {
  function attachClickEvent() {
    $(".teeth").on("click", function (e) {
      var $teethBox = $(this).closest("#teeth_box");

      var $popup = $teethBox.find("#popup");
      var offset = $teethBox.offset();
      var x = e.pageX - offset.left;
      var y = e.pageY - offset.top;
      var toothId = $(this).attr("tooth-id");
      // console.log(toothId);

      var toothstatus = $(this).attr("tooth-status");

      console.log(toothstatus);

      if (toothstatus == 1 || toothstatus == 2 || toothstatus == 3 || toothstatus == 4) {
        $("#normal-tooth").show();
      } else {
        $("#normal-tooth").hide();
      }
      $popup
        .css({
          top: y - 10 + "px",
          left: x + 20 + "px",
          zIndex: "999",
        })
        .show();

      //Ajax update the teeth
      $(".tootie").on("click", function () {
        var tooth_type = $(this).attr("tooth-type");
        var appointment_id = $(this).attr("appointment-id");
        var patient_id = $(this).attr("patient-id");

        $.ajax({
          url: "http://localhost/Clinic%20Capstone/actions/tooth_update1.php",
          type: "POST",
          data: {
            tooth_ids: toothId,
            tooth_types: tooth_type,
          },
          success: function (response) {
            if (response.success) {
              var newURL = `http://localhost/Clinic%20Capstone/views/assistantHistoryTooth.php?appointment_id=${appointment_id}&patient_id=${patient_id}`;
              window.location.href = newURL;
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          },
        });
      });
    });
  }

  attachClickEvent();
});


$(document).ready(function () {
  function attachClickEvent() {
    $(".teet").on("click", function (e) {
      var $teethBox = $(this).closest("#teeth_box");

      var $popup = $teethBox.find("#popup");
      var offset = $teethBox.offset();
      var x = e.pageX - offset.left;
      var y = e.pageY - offset.top;
      var toothId = $(this).attr("tooth-id");
      // console.log(toothId);

      var toothstatus = $(this).attr("tooth-status");

      console.log(toothstatus);

      if (toothstatus == 1 || toothstatus == 2 || toothstatus == 3 || toothstatus == 4) {
        $("#normal-tooth").show();
      } else {
        $("#normal-tooth").hide();
      }
      $popup
        .css({
          top: y - 10 + "px",
          left: x + 20 + "px",
          zIndex: "999",
        })
        .show();

      //Ajax update the teeth
      $(".tootie").on("click", function () {
        var tooth_type = $(this).attr("tooth-type");
        var appointment_id = $(this).attr("appointment-id");
        var patient_id = $(this).attr("patient-id");

        $.ajax({
          url: "http://localhost/Clinic%20Capstone/actions/tooth_update1.php",
          type: "POST",
          data: {
            tooth_ids: toothId,
            tooth_types: tooth_type,
          },
          success: function (response) {
            if (response.success) {
              var newURL = `http://localhost/Clinic%20Capstone/views/assistantHistoryFront.php?patient_id=${patient_id}`;
              window.location.href = newURL;
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          },
        });
      });
    });
  }

  attachClickEvent();
});




$(document).ready(function () {
  function attachClickEvent() {
    $(".teth").on("click", function (e) {
      var $teethBox = $(this).closest("#teeth_box");

      var $popup = $teethBox.find("#popup");
      var offset = $teethBox.offset();
      var x = e.pageX - offset.left;
      var y = e.pageY - offset.top;
      var toothId = $(this).attr("tooth-id");
      // console.log(toothId);

      var toothstatus = $(this).attr("tooth-status");

      console.log(toothstatus);

      if (toothstatus == 1 || toothstatus == 2 || toothstatus == 3 || toothstatus == 4) {
        $("#normal-tooth").show();
      } else {
        $("#normal-tooth").hide();
      }
      $popup
        .css({
          top: y - 10 + "px",
          left: x + 20 + "px",
          zIndex: "999",
        })
        .show();

      //Ajax update the teeth
      $(".tootie").on("click", function () {
        var tooth_type = $(this).attr("tooth-type");
        var patient_id = $(this).attr("patient-id");

        $.ajax({
          url: "http://localhost/Clinic%20Capstone/actions/tooth_update.php",
          type: "POST",
          data: {
            tooth_ids: toothId,
            tooth_types: tooth_type,
          },
          success: function (response) {
            if (response.success) {
              $("#teeth_box")
                .empty()
                .load(location.href + " #teeth_box>*", function () {
                  attachClickEvent();
                });
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          },
        });
      });
    });
  }

  attachClickEvent();
});



