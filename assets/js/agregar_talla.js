var c = 0;
var cg = 0;
var tallas = [];
var tallasRegistradas = [];
var editarTallaIndex = 0;
var editarTallaRegistradaIndex = 0;
var eliminarTallas = [];

function agregarTalla() {
  c++;
  cg++;
  tallas.push({
    nombre: $("#talla_nombre").val(),
    estado_stock: $("#talla_stock").val(),
  });

  var contenedor = document.createElement("div");
  contenedor.setAttribute("id", "talla_contenedor_" + c);
  contenedor.setAttribute("class", "dropdown show");

  var elemento_a = document.createElement("a");
  elemento_a.setAttribute("class", "talla");
  elemento_a.setAttribute("href", "#");
  elemento_a.setAttribute("role", "button");
  elemento_a.setAttribute("id", "dropdownMenuLink" + c);
  elemento_a.setAttribute("data-toggle", "dropdown");
  elemento_a.setAttribute("aria-haspopup", "true");
  elemento_a.setAttribute("aria-expanded", "false");
  contenedor.appendChild(elemento_a);

  var nombreLabel = document.createElement("span");
  nombreLabel.setAttribute("id", "labelTalla" + c);
  nombreLabel.setAttribute("style", "align-items: center;");
  nombreLabel.innerHTML = $("#talla_nombre").val();
  elemento_a.appendChild(nombreLabel);

  var menu = document.createElement("div");
  menu.setAttribute("class", "dropdown-menu");
  menu.setAttribute("aria-labelledby", "dropdownMenuLink");
  contenedor.appendChild(menu);

  var editar = document.createElement("a");
  editar.setAttribute("id", "editar" + c);
  editar.setAttribute("class", "dropdown-item");
  editar.setAttribute("href", "javascript:abrirModalEditarTalla(" + c + ")");
  editar.innerHTML = "Editar";
  menu.appendChild(editar);

  var eliminar = document.createElement("a");
  eliminar.setAttribute("id", "eliminar" + c);
  eliminar.setAttribute("class", "dropdown-item");
  eliminar.setAttribute("href", "javascript:eliminarTalla(" + c + ")");
  eliminar.innerHTML = "Eliminar";
  menu.appendChild(eliminar);

  var divPrincipal = document.getElementById("tallas_container");
  divPrincipal.appendChild(contenedor);
  $("#talla_nombre").val("");
  $("#talla_stock").val("1");
  $("#agregarTallaModal .close").click();
}

function abrirModalEditarTalla(id) {
  editarTallaIndex = parseInt(id) - 1;
  $("#editar_talla_nombre").val(tallas[editarTallaIndex].nombre);
  $("#editar_talla_stock").val(tallas[editarTallaIndex].estado_stock);
  $("#editarTallaModal").modal("show");
}

function abrirModalEditarTallaRegistrada(id) {
  editarTallaRegistradaIndex = parseInt(id);
  $("#editar_talla_registrada_nombre").val(
    tallasRegistradas[editarTallaRegistradaIndex].talla
  );
  $("#editar_talla_registrada_stock").val(
    tallasRegistradas[editarTallaRegistradaIndex].estado_stock
  );
  $("#editarTallaRegistradaModal").modal("show");
}

function editarTalla() {
  tallas[editarTallaIndex].nombre = $("#editar_talla_nombre").val();
  tallas[editarTallaIndex].estado_stock = $("#editar_talla_stock").val();
  var labelTalla = document.getElementById(
    "labelTalla" + (editarTallaIndex + 1)
  );
  labelTalla.innerHTML = $("#editar_talla_nombre").val();
  $("#editarTallaModal .close").click();
}

function editarTallaRegistrada() {
  tallasRegistradas[editarTallaRegistradaIndex].talla = $(
    "#editar_talla_registrada_nombre"
  ).val();
  tallasRegistradas[editarTallaRegistradaIndex].estado_stock = $(
    "#editar_talla_registrada_stock"
  ).val();
  var labelTalla = document.getElementById(
    "labelTallaRegistrada" + editarTallaRegistradaIndex
  );
  labelTalla.innerHTML = $("#editar_talla_registrada_nombre").val();
  $("#editarTallaRegistradaModal .close").click();
}

function eliminarTallasEditar(id) {
  tallasRegistradas.splice(id - 1, 1);
  eliminarTallas.push({
    id: id,
  });
  cg--;
  document.getElementById("talla_contenedor_registrado_" + id).remove();
}

function eliminarTalla(id) {
  var idNumber = parseInt(id);
  tallas.splice(id - 1, 1);
  for (var i = idNumber + 1; i <= c; i++) {
    console.log("talla_contenedor_" + (i - 1));
    var articulo = document.getElementById("talla_contenedor_" + i);
    articulo.setAttribute("id", "talla_contenedor_" + (i - 1));

    var elemento_a = document.getElementById("dropdownMenuLink" + i);
    elemento_a.setAttribute("id", "dropdownMenuLink" + (i - 1));

    var nombreLabel = document.getElementById("labelTalla" + i);
    nombreLabel.setAttribute("id", "labelTalla" + (i - 1));

    var eliminar = document.getElementById("eliminar" + i);
    eliminar.setAttribute("id", "eliminar" + (i - 1));
    eliminar.setAttribute("href", "javascript:eliminarTalla(" + (i - 1) + ")");

    var editar = document.getElementById("editar" + i);
    editar.setAttribute("id", "editar" + (i - 1));
    editar.setAttribute(
      "href",
      "javascript:abrirModalEditarTalla(" + (i - 1) + ")"
    );
  }
  c--;
  cg--;
  document.getElementById("talla_contenedor_" + id).remove();
}
