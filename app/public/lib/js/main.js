$(document).ready(function () {
  setCredentials();
});

$("#logout").click(function () {
  $.ajax({
    type: "POST",
    url: "../src/router/routes.php",
    data: { ch: "logout" },
    success: function (data) {
      console.log(data);
      if (data == 201) window.location.href = "./";
      else alert("Something went wrong. contact your instructor");
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr + "|" + ajaxOptions + "|" + thrownError);
    },
  });
});

$("#time").click(function () {
  if ($("#time").text().trim() == "Timein") {
    timein();
  } else {
    timeout();
  }
});

const timein = () => {
  $.ajax({
    type: "POST",
    url: "../src/router/routes.php",
    data: { ch: "timein" },
    success: function (data) {
      console.log(data);
      $("#timein").text(data);
      $("#time").text("Timeout");
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr + "|" + ajaxOptions + "|" + thrownError);
    },
  });
};

const timeout = () => {
  $.ajax({
    type: "POST",
    url: "../src/router/routes.php",
    data: { ch: "timeout" },
    success: function (data) {
      console.log(data);
      $("#timeout").text(data);
      $("#time").text("Timein");
      $("#time").prop("disabled", true);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr + "|" + ajaxOptions + "|" + thrownError);
    },
  });
};

const setCredentials = () => {
  $.ajax({
    type: "POST",
    url: "../src/router/routes.php",
    data: { ch: "getid" },
    success: function (data) {
      const tmp = data.split("~");
      $("#idnum").text(tmp[0]);
      $("#timein").text(tmp[1]);
      $("#timeout").text(tmp[2]);
      checkValues(tmp);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr + "|" + ajaxOptions + "|" + thrownError);
    },
  });
};

const checkValues = (tmp) => {
  if (tmp[1] != "" && tmp[2] == "") {
    $("#time").text("Timeout");
  } else if (tmp[1] != "" && tmp[2] != "") {
    $("#time").prop("disabled", true);
  }
};
