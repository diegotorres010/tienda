/*=============================================
EDITAR MEDIDAS
=============================================*/
$(document).ready(function () {
  validarBotonesMedidas();
  $('.sorting_1').click(function () {    
    setTimeout(function () { validarBotonesMedidas() }, 50)
  });
});

function validarBotonesMedidas() {  
  var botones = $('.btnEditarMedida');
  for (var i = 0; i < botones.length; i++) {
    let boton = botones[i]
    if ($(boton).attr('estado') == 0) $(boton).attr('disabled', 'true')
  }
}

$(".tablas").on("click", ".btnEditarMedida", function(){

  var idUnidadVenta = $(this).attr("idUnidadVenta");

	var datos = new FormData();
  datos.append("idUnidadVenta", idUnidadVenta);

    $.ajax({
      url:"ajax/medidas.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        $("#idUnidadVenta").val(respuesta["idUnidadVenta"]);                       
        $("#editarMedida").val(respuesta["descripcion"]);
	  }

  	})

})

/*=============================================
ACTIVAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnActivarMedida", function () {

  var idUnidadVenta = $(this).attr("idUnidadVenta");
  var estado = $(this).attr("estado");

	var datos = new FormData();
	datos.append("activarIdMedida", idUnidadVenta);
	datos.append("activarMedida", estado);	

  $.ajax({

    url: "ajax/medidas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {      
				swal({
					title: "La unidad de medida ha sido actualizado",
					type: "success",
					confirmButtonText: "¡Cerrar!"
				}).then(function (result) {
					if (result.value) {
						window.location = "medidas";
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


$("#nuevaMedida").change(function(){

  $(".alert").remove();

  var medida = $(this).val();

	var datos = new FormData();
	datos.append("validarMedida", medida);

	 $.ajax({
	    url:"ajax/medidas.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevaMedida").val("").parent().after('<div class="alert alert-warning">Esta unidad de medida ya existe en la base de datos</div>');

	    	}

	    }

	})
})

/*=============================================
ELIMINAR TERCERO
=============================================*/
// $(".tablas").on("click", ".btnEliminarMedida", function(){

//   var idUnidadVenta = $(this).attr("idUnidadVenta");
//   var descripcion = $(this).attr("descripcion");

//   swal({
//     title: '¿Está seguro de borrar la unidad de medida?',
//     text: "¡Si no lo está puede cancelar la acción!",
//     type: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     cancelButtonText: 'Cancelar',
//     confirmButtonText: 'Si, borrar unidad de medida!'
//   }).then(function(result){

//     if(result.value){

//       window.location = "index2.php?ruta=medidas&idUnidadVenta="+ idUnidadVenta + "&descripcion=" + descripcion;

//     }

//   })

// })