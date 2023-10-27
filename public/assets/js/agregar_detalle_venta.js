var c = 0;
var detallesVenta = [];
var tarjetaCodigo = "";
var tarjetaProductoId = "";
var tarjetaNombre = "";
var tarjetaTipo = "";
var tarjetaCantidad = "";
var tarjetaUnidades = "";
var nombreCliente = "";
var tecnicoAsignado = "";
var idOrden = 0;
var productosJs = [];
var productoIndexJs = 0;
var productoUnidad = "";
var monto_pagado = 0;
var monto_total = 0;
var sin_lote_checked = false;
var lote_codigo = "";
var lote_id = 0;
var precio = 0;
var subtotal = 0;
var vuelto = 0;
var cantidadProductos = 0;
function quitarArticuloTarjeta(id) {
  var idNumber = parseInt(id);
  cantidadProductos -= parseInt(detallesVenta[idNumber - 1].cantidad);
  detallesVenta.splice(id - 1, 1);
  for (var i = idNumber + 1; i <= c; i++) {
    var articulo = document.getElementById("contenedor" + i);
    articulo.setAttribute("id", "contenedor" + (i - 1));

    var articulolink = document.getElementById(i);
    articulolink.setAttribute("id", i - 1);
  }
  c--;
  document.getElementById("cantidad_productos").innerHTML =
    cantidadProductos + " c";
  monto_total = (
    parseFloat(monto_total) - parseFloat($("#inputTotalProducto" + id).val())
  ).toFixed(2);
  document.getElementById("monto_total_label").innerHTML = "S/. " + monto_total;
  vuelto = (monto_pagado - monto_total).toFixed(2);
  document.getElementById("vuelto").innerHTML = "S/. " + vuelto;
  document.getElementById("contenedor" + id).remove();
}

function agregarArticuloTarjeta(codigoLote) {
  c++;
  cantidadProductos += parseInt($("#cantidad").val());
  document.getElementById("cantidad_productos").innerHTML =
    cantidadProductos + " c";

  subtotal = (precio * $("#cantidad").val()).toFixed(2);
  monto_total = (parseFloat(monto_total) + parseFloat(subtotal)).toFixed(2);
  $("#monto_pagado").val("");
  vuelto = 0;
  monto_pagado = monto_total;
  document.getElementById("monto_total_label").innerHTML = "S/. " + monto_total;
  document.getElementById("monto_pagado_label").innerHTML =
    "S/. " + monto_total;
  document.getElementById("vuelto").innerHTML = "S/. " + vuelto;

  detallesVenta.push({
    productoId: $("#producto_id").val(),
    loteCodigo: codigoLote,
    cantidad: $("#cantidad").val(),
  });

  var contenedor = document.createElement("div");
  contenedor.setAttribute("id", "contenedor" + c);
  contenedor.setAttribute("class", "card w-100 mb-10");

  var inputTotalProducto = document.createElement("input");
  inputTotalProducto.setAttribute("type", "hidden");
  inputTotalProducto.setAttribute("id", "inputTotalProducto" + c);
  inputTotalProducto.setAttribute("value", subtotal);
  contenedor.appendChild(inputTotalProducto);

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

  var loteCol = document.createElement("div");
  loteCol.setAttribute("class", "col-sm");
  fila.appendChild(loteCol);

  var loteInfo = document.createElement("p");
  loteInfo.setAttribute("class", "m-0 font-weight-bold text-center dark-color");
  loteInfo.innerHTML = lote_codigo;
  loteCol.appendChild(loteInfo);

  var cantidadCol = document.createElement("div");
  cantidadCol.setAttribute("class", "col-sm");
  fila.appendChild(cantidadCol);

  var cantidadInfo = document.createElement("p");
  cantidadInfo.setAttribute(
    "class",
    "m-0 font-weight-bold text-center dark-color"
  );
  cantidadInfo.innerHTML = $("#cantidad").val() + " " + productoUnidad;
  cantidadCol.appendChild(cantidadInfo);

  var preciouCol = document.createElement("div");
  preciouCol.setAttribute("class", "col-sm");
  fila.appendChild(preciouCol);

  var preciouInfo = document.createElement("p");
  preciouInfo.setAttribute(
    "class",
    "m-0 font-weight-bold text-center dark-color"
  );
  preciouInfo.innerHTML = "S/." + precio;
  preciouCol.appendChild(preciouInfo);

  var preciosubCol = document.createElement("div");
  preciosubCol.setAttribute("class", "col-sm d-flex pr-0");
  fila.appendChild(preciosubCol);

  var preciosubInfo = document.createElement("p");
  preciosubInfo.setAttribute(
    "class",
    "m-0 font-weight-bold text-center dark-color"
  );
  preciosubInfo.innerHTML = "S/." + subtotal;
  preciosubCol.appendChild(preciosubInfo);

  var quitarbtn = document.createElement("button");
  quitarbtn.setAttribute("id", c);
  quitarbtn.setAttribute("onClick", "quitarArticuloTarjeta(this.id)");
  quitarbtn.setAttribute("class", "btn-quitar ml-2");
  preciosubCol.appendChild(quitarbtn);

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
  // codigo.innerHTML = "Codigo de Lote: " + lote_codigo;
  // info.appendChild(codigo);

  // var nombre = document.createElement("h4");
  // nombre.setAttribute("style", "font-weight: 900");
  // nombre.innerHTML = $("#producto_id option:selected").text();
  // info.appendChild(nombre);

  // var info2 = document.createElement("div");
  // info2.setAttribute("class", "col-sm justify-content-end align-items-center");
  // fila.appendChild(info2);

  // var info3 = document.createElement("div");
  // info3.setAttribute(
  //   "class",
  //   "col-sm d-flex justify-content-end align-items-center"
  // );
  // fila.appendChild(info3);

  // var preciodiv = document.createElement("h4");
  // preciodiv.setAttribute("style", "font-weight: 900");
  // preciodiv.innerHTML = "Precio Unitario: S/." + precio;
  // info2.appendChild(preciodiv);

  // var cantidad = document.createElement("h4");
  // cantidad.setAttribute("class", "mr-5");
  // cantidad.setAttribute("style", "font-weight: 900");
  // cantidad.innerHTML =
  //   "Cantidad: " + $("#cantidad").val() + " " + productoUnidad;
  // info2.appendChild(cantidad);

  // var subtotaldiv = document.createElement("h2");
  // subtotaldiv.setAttribute("class", "mr-5");
  // subtotaldiv.setAttribute("style", "font-weight: 900");
  // subtotaldiv.innerHTML = "S/." + subtotal;
  // info3.appendChild(subtotaldiv);

  // var link = document.createElement("button");
  // link.setAttribute("id", c);
  // link.setAttribute("onClick", "quitarArticuloTarjeta(this.id)");
  // info3.appendChild(link);

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
