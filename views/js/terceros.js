/*=============================================
EDITAR TERCERO
=============================================*/
$(document).ready(function () {
  validarBotonesTerceros();
  $('.sorting_1').click(function () {    
    setTimeout(function () { validarBotonesTerceros() }, 50)
  });
});

function validarBotonesTerceros() {  
  var botones = $('.btnEditarTercero');
  for (var i = 0; i < botones.length; i++) {
    let boton = botones[i]
    if ($(boton).attr('estado') == 0) $(boton).attr('disabled', 'true')
  }
}

$(".tablas").on("click", ".btnEditarTercero", function(){

  var idUsuario = $(this).attr("idUsuario");

	var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({

      url:"ajax/terceros.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
        $("#idTercero").val(respuesta["idUsuario"]);                       
        $('select[name="editarTipoDoc"] > option[value="' + respuesta["tipoDocumento"] +'"]').attr('selected',true);
        $("#editarDocumentoId").val(respuesta["documento"]);
	      $("#editarTercero").val(respuesta["descripcion"]);
	      $("#editarTelefono").val(respuesta["telefono"]);
	      $("#editarEmail").val(respuesta["email"]);
	      $("#editarDireccion").val(respuesta["direccion"]);
        $("#editarFechaNacimiento").val(respuesta["fechaNacimiento"]);
        $('select[name="editarGeneroTercero"] > option[value="' + respuesta["genero"] +'"]').attr('selected',true);
        $('select[name="editarTipoTercero"] > option[value="' + respuesta["tipoUsuario"] +'"]').attr('selected',true);        
	  }

  	})

})

$(".tablas").on("click", ".btnActivarUsuario", function () {

	var idUsuario = $(this).attr("idUsuario");
	var estado = $(this).attr("estado");
  
	  var datos = new FormData();
	  datos.append("activarIdUsuario", idUsuario);
	  datos.append("activarUsuario", estado);	
  
	$.ajax({
  
	  url: "ajax/terceros.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (respuesta) {      
				  swal({
					  title: "El tercero ha sido actualizado",
					  type: "success",
					  confirmButtonText: "¡Cerrar!"
				  }).then(function (result) {
					  if (result.value) {
						  window.location = "terceros";
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

$("#nuevoDocumentoId").change(function () { validarTerceros('#nuevoDocumentoId', '#nuevoTipoDoc', 'documento', 'tipoDocumento') });
$("#nuevoTipoDoc").change(function () { validarTerceros('#nuevoDocumentoId', '#nuevoTipoDoc', 'documento', 'tipoDocumento') });

function validarTerceros(numero, tipodo, campoT, campoTer) {
  $(".alert").remove();

  var tercero = $(numero).val();
  var tipoter = $(tipodo).val();
  var datos = new FormData();
  datos.append("validarDocTercero", tercero);
  datos.append("validarTipoTercero", tipoter);
  datos.append("campoT", campoT);
  datos.append("campoTer", campoTer);

  $.ajax({
    url: "ajax/terceros.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta) {
        $("#nuevoDocumentoId").val('').parent().after('<div class="alert alert-warning">Este tipo de documento con este número ya existe</div>');
        $("#nuevoTipoDoc").val("");
      }

    }

  })
}