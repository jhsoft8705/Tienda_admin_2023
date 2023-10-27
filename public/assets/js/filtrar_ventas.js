var datosTabla = [];
let cantidad_ventas = 0;
function verificarDatos(type) {
  if (cantidad_ventas == 0) {
    Swal.fire(
      "No hay ventas registradas",
      "Aún no tienes ninguna venta registrada, por favor registra una venta para poder mostrarte tus datos.",
      "warning"
    );
  } else {
    if (type) {
      if ($("#fecha_inicio").val() && $("#fecha_fin").val()) {
        datosTabla = ventasJs.slice(0);
        ventasJs.forEach(function (venta) {
          var fechadesde = $("#fecha_inicio").val(); //'2021-10-06'
          var fechaVenta = venta.fecha; //"2021/10/06"
          var fechahasta = $("#fecha_fin").val(); //'2021-10-06'

          var desde1 = fechadesde.split("-");
          var fechaVenta1 = fechaVenta.split("/");
          var hasta1 = fechahasta.split("-");

          var desde = new Date(desde1[0], parseInt(desde1[1]) - 1, desde1[2]);
          var fechaVenta = new Date(
            fechaVenta1[0],
            parseInt(fechaVenta1[1]) - 1,
            fechaVenta1[2]
          );
          var hasta = new Date(hasta1[0], parseInt(hasta1[1]) - 1, hasta1[2]);

          if (
            !(
              fechaVenta.getTime() <= hasta.getTime() &&
              fechaVenta.getTime() >= desde.getTime()
            )
          ) {
            let index = datosTabla
              .map((item) => item.venta_id)
              .indexOf(venta.venta_id);
            if (index > -1) {
              datosTabla.splice(index, 1);
            }
          }
        });
        updateTabla(false);
      } else {
        Swal.fire(
          "Complete los campos por favor",
          "Por favor selecciona una fecha de inicio y fin para poder mostrar los datos de ventas.",
          "warning"
        );
      }
    } else {
      datosTabla = ventasJs;
      updateTabla(false);
    }
  }
}

function updateTabla(inicio) {
  if (!inicio) {
    Swal.fire({ title: "Cargando Tabla", allowOutsideClick: false });
    Swal.showLoading();
  }

  var tablaVentas = document.getElementById("datatable_ventas");
  if (tablaVentas) {
    tablaVentas.remove();
  }
  var divPrincipal = document.getElementById("div_ventas");
  var tabla = document.createElement("table");
  tabla.setAttribute("id", "datatable_ventas");
  tabla.setAttribute("class", "table table-striped datatable_custom");
  var thead = document.createElement("thead");
  tabla.appendChild(thead);

  var columna1 = document.createElement("th");
  columna1.innerHTML = "Fecha";
  thead.appendChild(columna1);
  var columna2 = document.createElement("th");
  columna2.innerHTML = "Monto Total";
  thead.appendChild(columna2);
  var columna3 = document.createElement("th");
  columna3.innerHTML = "Monto Pagado";
  thead.appendChild(columna3);
  var columna4 = document.createElement("th");
  columna4.innerHTML = "Vuelto";
  thead.appendChild(columna4);
  if (tipoUsuario == 1) {
    var columna5 = document.createElement("th");
    columna5.innerHTML = "Vendedor";
    thead.appendChild(columna5);
  }
  var columna6 = document.createElement("th");
  columna6.setAttribute("class", "text-center");
  columna6.innerHTML = "Acciones";
  thead.appendChild(columna6);
  var tbody = document.createElement("tbody");
  tabla.appendChild(tbody);
  datosTabla.forEach(function (venta) {
    var tr = document.createElement("tr");
    tbody.appendChild(tr);
    var datos1 = document.createElement("td");
    datos1.innerHTML = venta.fecha;
    tr.appendChild(datos1);
    var datos2 = document.createElement("td");
    datos2.innerHTML = "S/. " + venta.monto_total;
    tr.appendChild(datos2);
    var datos3 = document.createElement("td");
    datos3.innerHTML = "S/. " + venta.monto_pagado;
    tr.appendChild(datos3);
    var datos4 = document.createElement("td");
    datos4.innerHTML = "S/. " + venta.vuelto;
    tr.appendChild(datos4);
    if (tipoUsuario == 1) {
      var datos5 = document.createElement("td");
      datos5.innerHTML = venta.vendedor;
      tr.appendChild(datos5);
    }
    var datos6 = document.createElement("td");
    datos6.setAttribute("class", "text-center");
    var modalName = "#modal" + venta.venta_id;
    datos6.innerHTML =
      "<a href='" +
      modalName +
      "' data-target='" +
      modalName +
      "' data-toggle='modal' class='text-info' title='Ver Detalles'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'><path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/><path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/></svg></a><a href='javascript:eliminarVenta(" +
      venta.venta_id +
      ")' style='color: red' title='Eliminar Venta'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></a>";
    tr.appendChild(datos6);
  });

  divPrincipal.appendChild(tabla);
  if (!inicio) {
    swal.close();
  }

  //   $("#datatable_ventas").DataTable({
  //     oLanguage: {
  //       oPaginate: { sPrevious: "Anterior", sNext: "Siguiente" },
  //       sInfo: "Mostrando página _PAGE_ de _PAGES_",
  //       sSearch: "",
  //       sSearchPlaceholder: "Buscar",
  //       sLengthMenu: "Mostrar _MENU_ resultados",
  //     },
  //     order: [[0, "desc"]],
  //     stripeClasses: [],
  //     lengthMenu: [10, 25, 50, 100],
  //     pageLength: 10,
  //   });
}
