/*=============================================
EDITAR TERCERO
=============================================*/
$(document).ready(function () {
  validarBotonesProveedores();
  $('.sorting_1').click(function () {    
    setTimeout(function () { validarBotonesProveedores() }, 50)
  });
});

function validarBotonesProveedores() {  
  var botones = $('.btnEditarProveedor');
  for (var i = 0; i < botones.length; i++) {
    let boton = botones[i]
    if ($(boton).attr('estado') == 0) $(boton).attr('disabled', 'true')
  }
}

$(".tablas").on("click", ".btnEditarProveedor", function(){

  var idUsuario = $(this).attr("idUsuario");

	var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({

      url:"ajax/proveedores.ajax.php",
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

$(".tablas").on("click", ".btnActivarProveedor", function () {

	var idUsuario = $(this).attr("idUsuario");
	var estado = $(this).attr("estado");
  
	  var datos = new FormData();
	  datos.append("activarIdUsuario", idUsuario);
	  datos.append("activarUsuario", estado);	
  
	$.ajax({
  
	  url: "ajax/proveedores.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (respuesta) {
				  swal({
					  title: "El proveedor ha sido actualizado",
					  type: "success",
					  confirmButtonText: "¡Cerrar!"
				  }).then(function (result) {
					  if (result.value) {
						  window.location = "proveedores";
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