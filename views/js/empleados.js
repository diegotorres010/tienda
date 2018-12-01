$(".nuevaFoto").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})

$(".editarFoto").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".editarFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".editarFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarEditar").attr("src", rutaImagen);

  		})

  	}
})

$(document).ready(function () {
  validarBotonesEmpleados();
  $('.sorting_1').click(function () {
    setTimeout(function () { validarBotonesEmpleados() }, 50)
  });
});

function validarBotonesEmpleados() {
  var botones = $('.btnEditarEmpleado');
  for (var i = 0; i < botones.length; i++) {
    let boton = botones[i]
    if ($(boton).attr('estado') == 0) $(boton).attr('disabled', 'true')
  }
}

$(".tablas").on("click", ".btnEditarEmpleado", function () {

  var idUsuarioSistema = $(this).attr("idUsuarioSistema");
  
  var datos = new FormData();
  datos.append("idUsuarioSistema", idUsuarioSistema);
  
  console.log(idUsuarioSistema);
  $.ajax({
    url: "ajax/empleados.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {      
      $("#idUsuarioSistema").val(respuesta["idUsuarioSistema"]);
      $("#editarNombre").val(respuesta["nombreEmpleado"]);
      $("#fotoActual").val(respuesta["foto"]);
      $("#editarFoto").val(respuesta["foto"]);
      $("#passwordActual").val(respuesta["password"]);

				if(respuesta["foto"] != ""){
          $(".previsualizarEditar").attr("src", respuesta["foto"]);
        }else{
          $(".previsualizarEditar").attr("src", "views/img/empleados/default/anonymous.png");
        }
    }
  })

})

$(".tablas").on("click", ".btnActivarEmpleado", function () {

  var idUsuarioSistema = $(this).attr("idUsuarioSistema");
  var estado = $(this).attr("estado");

  var datos = new FormData();
  datos.append("activarIdUsuario", idUsuarioSistema);
  datos.append("activarUsuario", estado);

  $.ajax({

    url: "ajax/empleados.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      swal({
        title: "El empleado ha sido actualizado",
        type: "success",
        confirmButtonText: "¡Cerrar!"
      }).then(function (result) {
        if (result.value) {
          window.location = "empleados";
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

$("#nuevoEmpleado").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	 $.ajax({
	    url:"ajax/empleados.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoEmpleado").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

	    		$("#nuevoEmpleado").val("");

	    	}

	    }

	})
})