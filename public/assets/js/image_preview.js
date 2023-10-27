if ($("#inputGroupFile01").length) {
  $("#inputGroupFile01").change(function (event) {
    readURL(this, "1");
  });
}
if ($("#inputGroupFile02").length) {
  $("#inputGroupFile02").change(function (event) {
    readURL(this, "2");
  });
}
if ($("#inputGroupFile03").length) {
  $("#inputGroupFile03").change(function (event) {
    readURL(this, "3");
  });
}

function readURL(input, id) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    var filename = $("#inputGroupFile0" + id).val();
    filename = filename.substring(filename.lastIndexOf("\\") + 1);
    reader.onload = function (e) {
      $("#preview" + id).attr("src", e.target.result);
      $("#preview" + id).hide();
      $("#preview" + id).fadeIn(500);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

if ($("#imagenguia").length) {
  $("#imagenguia").change(function (event) {
    readURLGuia(this);
  });
}

function readURLGuia(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    var filename = $("#imagenguia").val();
    filename = filename.substring(filename.lastIndexOf("\\") + 1);
    reader.onload = function (e) {
      $("#preview").attr("src", e.target.result);
      $("#preview").hide();
      $("#preview").fadeIn(500);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
