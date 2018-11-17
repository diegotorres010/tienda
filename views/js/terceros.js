/*=============================================
EDITAR TERCERO
=============================================*/
$(".tablas").on("click", ".btnEditarTercero", function(){

  var idTercero = $(this).attr("idTercero");

	var datos = new FormData();
    datos.append("idTercero", idTercero);

    $.ajax({

      url:"ajax/terceros.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
        $("#idTercero").val(respuesta["idTercero"]);                       
        $('select[name="editarTipoDoc"] > option[value="' + respuesta["tipoDocumento"] +'"]').attr('selected',true);
        $("#editarDocumentoId").val(respuesta["documento"]);
	      $("#editarTercero").val(respuesta["nombre"]);
	      $("#editarTelefono").val(respuesta["telefono"]);
	      $("#editarEmail").val(respuesta["email"]);
	      $("#editarDireccion").val(respuesta["direccion"]);
        $("#editarFechaNacimiento").val(respuesta["fechaNacimiento"]);
        $('select[name="editarGeneroTercero"] > option[value="' + respuesta["genero"] +'"]').attr('selected',true);
        $('select[name="editarTipoTercero"] > option[value="' + respuesta["tipoTercero"] +'"]').attr('selected',true);        
	  }

  	})

})

/*=============================================
ELIMINAR TERCERO
=============================================*/
$(".tablas").on("click", ".btnEliminarTercero", function(){

	var idTercero = $(this).attr("idTercero");
	
	swal({
        title: '¿Está seguro de borrar el usuario?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=terceros&idTercero="+idTercero;
        }

  })

})