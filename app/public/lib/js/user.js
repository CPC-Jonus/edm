$(document).ready(function () {
  $("#err_message").hide();
});
$("#loginForm").submit(function (e) {
  e.preventDefault();
  var form = $(this);
  $.ajax({
    type: "POST",
    url: "../src/router/routes.php",
    data: { ch: "login", data: form.serialize() },
    success: function (data) {
      if (data == 200) window.location.href = "./main.php";
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr + "|" + ajaxOptions + "|" + thrownError);
    },
  });
});

$("#regForm").submit(function (e) {
  e.preventDefault();
  var form = $(this);
  $.ajax({
    type: "POST",
    url: "../src/router/routes.php",
    data: { ch: "register", data: form.serialize() },
    success: function (data) {
      console.log(data);
      if (data == 201) window.location.href = "./";
      else $("#err_message").show();
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr + "|" + ajaxOptions + "|" + thrownError);
    },
  });
});
