//get department in registration of teacher in admin UI
$(document).ready(function () {
  $("#role").on("change", function () {
    if ($(this).val() == "student") {
      $("#courseform").show();
      $("#registerform").css("height", "890px");
      $("#pic").css("height", "890px");
    } else {
      $("#courseform").hide();
      $("#registerform").css("height", "700px");
      $("#pic").css("height", "700px");
    }
  });
});

$(document).ready(function () {
  var college_id = $("#college").val();
  function department(college_id) {
    $.ajax({
      url:
        "http://localhost/Clinic Capstone/actions/findcollege.php?college=" +
        college_id,
      success: function (result) {
        $("#course").html(result);
      },
    });
  }
  $("#college").on("change", function () {
    var college_new = $(this).val();
    department(college_new);
  });

  department(college_id);
});

