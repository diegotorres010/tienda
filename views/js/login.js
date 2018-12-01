$(document).ready(function () {
    $('#tabTienda').click(function () {
        $(this).removeAttr('href')
        $(this).removeAttr('data-toggle')

        if ($('[name="nuevoHost"]').val().length < 1
            && $('[name="nuevoDB"]').val().length < 1
            && $('[name="nuevoUsuarioDB"]').val().length < 1){
                $('#modal-danger').modal('show');
        } else if ($('[name="nuevoHost"]').val().length < 1) {
            $('[name="nuevoHost"]').focus();
            $('#alertError').html('Nombre de host o ip vacío').show()
        } else if ($('[name="nuevoDB"]').val().length < 1) {
            $('[name="nuevoDB"]').focus();
            $('#alertError').html('Nombre de la base de datos vacío').show()
        } else if ($('[name="nuevoUsuarioDB"]').val().length < 1) {
            $('[name="nuevoUsuarioDB"]').focus();
            $('#alertError').html('Nombre del usuario de la base de datos vacío').show()
        } else {
            $('#alertError').hide()
            $(this).attr({ 'href': '#tiendatab', 'data-toggle': 'tab' })
            setTimeout(function () {
                $(this).click()
            }, 100)
        }
    });

    $('#tabUsuario').click(function () {
        $(this).removeAttr('href')
        $(this).removeAttr('data-toggle')

        if ($('[name="nuevaTiendaNombre"]').val().length < 1
        && $('[name="nuevaTiendaDireccion"]').val().length < 1
        && $('[name="nuevaTiendaTelefono"]').val().length < 1
        && $('[name="nuevaTiendaPropietario"]').val().length < 1
        && $('[name="nuevaTiendaEmail"]').val().length < 1){
            $('#modal-danger').modal('show');
        } else if ($('[name="nuevaTiendaNombre"]').val().length < 1) {
            $('[name="nuevaTiendaNombre"]').focus();
            $('#alertError').html('Nombre de la tienda vacío').show()
        } else if ($('[name="nuevaTiendaDireccion"]').val().length < 1) {
            $('[name="nuevaTiendaDireccion"]').focus();
            $('#alertError').html('Dirección vacío').show()
        } else if ($('[name="nuevaTiendaTelefono"]').val().length < 1) {
            $('[name="nuevaTiendaTelefono"]').focus();
            $('#alertError').html('Teléfono vacío').show()
        } else if ($('[name="nuevaTiendaPropietario"]').val().length < 1) {
            $('[name="nuevaTiendaPropietario"]').focus();
            $('#alertError').html('Propietario vacío').show()
        } else if ($('[name="nuevaTiendaEmail"]').val().length < 1) {
            $('[name="nuevaTiendaEmail"]').focus();
            $('#alertError').html('Email vacío').show()
        } else if (!validateEmail($('[name="nuevaTiendaEmail"]').val())) {
            $('[name="nuevaTiendaEmail"]').focus();
            $('#alertError').html('Email inválido').show()
        } else {
            $('#alertError').hide()
            $(this).attr({ 'href': '#usuariotab', 'data-toggle': 'tab' })
            setTimeout(function () {
                $(this).click()
            }, 100)
        }
    });


    $('#tabSistema').click(function () {
        $(this).removeAttr('href')
        $(this).removeAttr('data-toggle')

        if ($('[name="nuevoTipoDoc"]').val().length < 1
        && $('[name="nuevoDocumentoId"]').val().length < 1
        && $('[name="nuevoTercero"]').val().length < 1
        && $('[name="nuevoTelefono"]').val().length < 1
        && $('[name="nuevoEmail"]').val().length < 1
        && $('[name="nuevaDireccion"]').val().length < 1
        && $('[name="nuevaFechaNacimiento"]').val().length < 1
        && $('[name="nuevoGeneroTercero"]').val().length < 1
        && $('[name="nuevoTipoTercero"]').val().length < 1){
            $('#modal-danger').modal('show');
        } else if ($('[name="nuevoTipoDoc"]').val().length < 1) {
            $('[name="nuevoTipoDoc"]').focus();
            $('#alertError').html('Tipo de documento vacío').show()
        } else if ($('[name="nuevoDocumentoId"]').val().length < 1) {
            $('[name="nuevoDocumentoId"]').focus();
            $('#alertError').html('Número de documento vacío').show()
        } else if ($('[name="nuevoTercero"]').val().length < 1) {
            $('[name="nuevoTercero"]').focus();
            $('#alertError').html('Nombre del usuario vacío').show()
        } else if ($('[name="nuevoTelefono"]').val().length < 1) {
            $('[name="nuevoTelefono"]').focus();
            $('#alertError').html('Teléfono vacío').show()
        } else if ($('[name="nuevoEmail"]').val().length < 1) {
            $('[name="nuevoEmail"]').focus();
            $('#alertError').html('Email vacío').show()
        } else if (!validateEmail($('[name="nuevoEmail"]').val())) {
            $('[name="nuevoEmail"]').focus();
            $('#alertError').html('Email inválido').show()
        } else if ($('[name="nuevaDireccion"]').val().length < 1) {
            $('[name="nuevaDireccion"]').focus();
            $('#alertError').html('Dirección vacía').show()
        } else if ($('[name="nuevaFechaNacimiento"]').val().length < 1) {
            $('[name="nuevaFechaNacimiento"]').focus();
            $('#alertError').html('Fecha nacimiento vacía').show()
        } else if ($('[name="nuevoGeneroTercero"]').val().length < 1) {
            $('[name="nuevoGeneroTercero"]').focus();
            $('#alertError').html('Genero vacío').show()
        } else if ($('[name="nuevoTipoTercero"]').val().length < 1) {
            $('[name="nuevoTipoTercero"]').focus();
            $('#alertError').html('Tipo tercero vacío').show()
        } else {
            $('#alertError').hide()
            $(this).attr({ 'href': '#sistematab', 'data-toggle': 'tab' })
            setTimeout(function () {
                $(this).click()
            }, 100)
        }
    });
});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

/*$('#botonTienda').click(function(event){
    event.preventDefault();    
        var contrasena       = $("#nuevoPassword").val();
        var confirContrasena = $("#nuevoRepetirPass").val();
    
        if (contrasena !='' && confirContrasena != '') {    
            if (contrasena === confirContrasena) {    
                $("#alertError").html('Los campos coinciden.');
            }else{    
                $("#alertError").html('Lo siento!, los campos no coinciden.');
            }
        }else{
          $("#alertError").html('Hey! No dejes los campos vacios');
        }            
    });
*/

/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
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