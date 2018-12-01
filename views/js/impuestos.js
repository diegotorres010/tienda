/*=============================================
EDITAR IMPUESTOS
=============================================*/
$(document).ready(function () {
  validarBotonesImpuestos();
  $('.sorting_1').click(function () {    
    setTimeout(function () { validarBotonesImpuestos() }, 50)
  });
  // esto sirve para cargar el dato en el config
  // $('#nombreTercero').val($('#nombrePersona').val())
});

function validarBotonesImpuestos() {  
  var botones = $('.btnEditarImpuesto');
  for (var i = 0; i < botones.length; i++) {
    let boton = botones[i]
    if ($(boton).attr('estado') == 0) $(boton).attr('disabled', 'true')
  }
}

$(".tablas").on("click", ".btnEditarImpuesto", function () {

  var idIva = $(this).attr("idIva");

  var datos = new FormData();
  datos.append("idIva", idIva);

  $.ajax({
    url: "ajax/impuestos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {

      $("#idIva").val(respuesta["idIva"]);
      $("#editarImpuesto").val(respuesta["descripcion"]);
      $("#editarPorcentaje").val(respuesta["porcentaje"]);
    }

  })

})

/*=============================================
ACTIVAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnActivarIva", function () {

  var idIva = $(this).attr("idIva");
  var estado = $(this).attr("estado");

  var datos = new FormData();
  datos.append("activarIdIva", idIva);
  datos.append("activarImpuesto", estado);

  $.ajax({

    url: "ajax/impuestos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      swal({
        title: "El impuesto ha sido actualizado",
        type: "success",
        confirmButtonText: "¡Cerrar!"
      }).then(function (result) {
        if (result.value) {
          window.location = "impuestos";
        }
      });
    }

  })

  if (estado == 0) {

    $(this).removeClass('btn-success');
    $(this).addClass('btn-danger');
    $(this).html('Desactivado');
    $(this).attr('estado', 1);

  } else {

    $(this).addClass('btn-success');
    $(this).removeClass('btn-danger');
    $(this).html('Activado');
    $(this).attr('estado', 0);

  }

})


$("#nuevoImpuesto").change(function () { validarImpuestos(this, 'descripcion') });
$("#nuevoPorcentaje").change(function () { validarImpuestos(this, 'porcentaje') });

function validarImpuestos(control, porcentaje) {
  $(".alert").remove();

  var impuesto = $(control).val();
  var datos = new FormData();
  datos.append("validarImpuesto", impuesto);
  datos.append("campo", porcentaje);

  $.ajax({
    url: "ajax/impuestos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta) {
        $(control).val('').parent().after('<div class="alert alert-warning">Este impuesto ya existe en la base de datos</div>');
      }

    }

  })
}
/*=============================================
 ELIMINAR TERCERO
 =============================================*/
// $(".tablas").on("click", ".btnEliminarImpuesto", function(){

//   var idIva = $(this).attr("idIva");
//   var descripcion = $(this).attr("descripcion");
//   var porcentaje = $(this).attr("porcentaje");

//   swal({
//     title: '¿Está seguro de borrar el impuesto?',
//     text: "¡Si no lo está puede cancelar la acción!",
//     type: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     cancelButtonText: 'Cancelar',
//     confirmButtonText: 'Si, borrar impuesto!'
//   }).then(function(result){

//     if(result.value){

//       window.location = "index2.php?ruta=impuestos&idIva="+ idIva + "&descripcion=" + descripcion + "&porcentaje=" + porcentaje;

//     }

//   })

// })