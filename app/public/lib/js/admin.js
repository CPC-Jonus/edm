$(document).ready(function () {
  displayAll();
});

$("#btnLogout").click(function () {
  displayAll();
});

const displayAll = () => {
  $.ajax({
    type: "POST",
    url: "../src/router/routes.php",
    data: { ch: "displayAll" },
    success: function (data) {
      let tmp = JSON.parse(data);
      let str = "";
      let ctr = 1;
      tmp.forEach((element) => {
        str += "<tr>";
        str += "<td>" + ctr + "</td>";
        str += "<td>" + element.idnum + "</td>";
        str += "<td>" + element.section + "</td>";
        str += "<td>" + element.timein + "</td>";
        str += "<td>" + element.timeout + "</td>";
        str += "<td>";
        str +=
          "<button class='btn btn-primary' onclick='reset(" +
          element.id +
          ")')'>Reset</button>";
        str +=
          "<button class='btn btn-success ms-2' onclick='update()')'>Update</button>";
        str += "<button class='btn btn-danger ms-2'>Disable</button>";
        str += "</td>";
        str += "</tr>";
        ctr++;
      });
      $("#adminTbody").append(str);
      $("#adminTbl").DataTable();
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr + "|" + ajaxOptions + "|" + thrownError);
    },
  });
};

const reset = (value) => {
  $.ajax({
    type: "POST",
    url: "../src/router/routes.php",
    data: { ch: "displayAll" },
    success: function (data) {
      alert(data);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr + "|" + ajaxOptions + "|" + thrownError);
    },
  });
};

const update = () => {
  $("#updateModal").modal("show");
};
