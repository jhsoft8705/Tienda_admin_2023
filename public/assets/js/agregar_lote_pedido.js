var c = 0;
var lotes = [];
var tarjetaCodigo = "";
var tarjetaProductoId = "";
var tarjetaNombre = "";
var tarjetaTipo = "";
var tarjetaCantidad = "";
var tarjetaUnidades = "";
var nombreCliente = "";
var tecnicoAsignado = "";
var fecha = "";
var hora = "";
var idOrden = 0;
var productosJs = [];
var productoIndexJs = 0;
var productoIdJs = 0;
var productoUnidad = "";
var proveedor_id = 0;
var cantidadLotes = 0;

function quitarArticuloTarjeta(id) {
  var idNumber = parseInt(id);
  cantidadLotes -= parseInt(lotes[idNumber - 1].cantidad);
  document.getElementById("cantidad_productos").innerHTML =
    cantidadLotes + " c";
  lotes.splice(id - 1, 1);
  for (var i = idNumber + 1; i <= c; i++) {
    var articulo = document.getElementById("contenedor" + i);
    articulo.setAttribute("id", "contenedor" + (i - 1));

    var articulolink = document.getElementById(i);
    articulolink.setAttribute("id", i - 1);
  }
  c--;
  document.getElementById("contenedor" + id).remove();
}

function agregarArticuloTarjeta() {
  c++;

  cantidadLotes += parseInt($("#cantidad").val());
  document.getElementById("cantidad_productos").innerHTML =
    cantidadLotes + " c";

  lotes.push({
    productoId: $("#producto_id").val(),
    fechaVencimiento: $("#fecha_vencimiento").val(),
    cantidad: $("#cantidad").val(),
  });

  var contenedor = document.createElement("div");
  contenedor.setAttribute("id", "contenedor" + c);
  contenedor.setAttribute("class", "card w-100 mb-10");

  var fila = document.createElement("div");
  fila.setAttribute("class", "row card-body");
  fila.setAttribute("style", "align-items: center;");
  contenedor.appendChild(fila);

  var categoriaCol = document.createElement("div");
  categoriaCol.setAttribute("class", "col-sm");
  fila.appendChild(categoriaCol);

  var categoriaInfo = document.createElement("p");
  categoriaInfo.setAttribute(
    "class",
    "m-0 font-weight-bold text-center dark-color"
  );
  categoriaInfo.innerHTML = productosJs[productoIndexJs].categoria_nombre;
  categoriaCol.appendChild(categoriaInfo);

  var productoCol = document.createElement("div");
  productoCol.setAttribute("class", "col-sm");
  fila.appendChild(productoCol);

  var productoInfo = document.createElement("p");
  productoInfo.setAttribute(
    "class",
    "m-0 font-weight-bold text-center dark-color"
  );
  productoInfo.innerHTML = productosJs[productoIndexJs].nombre;
  productoCol.appendChild(productoInfo);

  var fechaCol = document.createElement("div");
  fechaCol.setAttribute("class", "col-sm");
  fila.appendChild(fechaCol);

  var fechaInfo = document.createElement("p");
  fechaInfo.setAttribute(
    "class",
    "m-0 font-weight-bold text-center dark-color"
  );
  fechaInfo.innerHTML = $("#fecha_vencimiento").val();
  fechaCol.appendChild(fechaInfo);

  var cantidadCol = document.createElement("div");
  cantidadCol.setAttribute("class", "col-sm d-flex pr-0");
  fila.appendChild(cantidadCol);

  var cantidadInfo = document.createElement("p");
  cantidadInfo.setAttribute(
    "class",
    "m-0 font-weight-bold text-center dark-color"
  );
  cantidadInfo.innerHTML = $("#cantidad").val() + " " + productoUnidad;
  cantidadCol.appendChild(cantidadInfo);

  var quitarbtn = document.createElement("button");
  quitarbtn.setAttribute("id", c);
  quitarbtn.setAttribute("onClick", "quitarArticuloTarjeta(this.id)");
  quitarbtn.setAttribute("class", "btn-quitar ml-2");
  cantidadCol.appendChild(quitarbtn);

  var borrar = document.createElement("i");
  borrar.setAttribute("class", "material-icons");
  borrar.setAttribute("style", "font-weight: 900; color: #4166ac;");
  borrar.innerHTML = "remove_circle";
  quitarbtn.appendChild(borrar);

  // var info = document.createElement("div");
  // info.setAttribute("class", "col-sm");
  // info.setAttribute("style", "text-align:left");
  // fila.appendChild(info);

  // var codigo = document.createElement("p");
  // codigo.setAttribute("class", "m-0");
  // codigo.innerHTML = "Fecha de Vencimiento: " + $("#fecha_vencimiento").val();
  // info.appendChild(codigo);

  // var nombre = document.createElement("h4");
  // nombre.setAttribute("style", "font-weight: 900");
  // nombre.innerHTML = "Lote de: " + $("#producto_id option:selected").text();
  // info.appendChild(nombre);

  // var info2 = document.createElement("div");
  // info2.setAttribute(
  //   "class",
  //   "col-sm d-flex justify-content-end align-items-center"
  // );
  // fila.appendChild(info2);

  // var cantidad = document.createElement("h2");
  // cantidad.setAttribute("class", "mr-5");
  // cantidad.setAttribute("style", "font-weight: 900");
  // cantidad.innerHTML =
  //   "Cantidad: " + $("#cantidad").val() + " " + productoUnidad;
  // info2.appendChild(cantidad);

  // var link = document.createElement("button");
  // link.setAttribute("id", c);
  // link.setAttribute("onClick", "quitarArticuloTarjeta(this.id)");
  // info2.appendChild(link);

  // var borrar = document.createElement("i");
  // borrar.setAttribute("class", "material-icons");
  // borrar.setAttribute("class", "material-icons");
  // borrar.setAttribute("style", "font-weight: 900; font-size: xxx-large;");
  // borrar.innerHTML = "highlight_off";
  // link.appendChild(borrar);

  var divPrincipal = document.getElementById("cuerpoPagina");
  divPrincipal.appendChild(contenedor);
  tarjetaCantidad = $("#cantidad").val() + " " + tarjetaUnidades;
  $("#fecha_vencimiento").val("");
  $("#cantidad").val("");
  $("#agregarArticuloModal .close").click();
}
