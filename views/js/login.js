var pass1 = $('[name=nuevoPassword]');
var pass2 = $('[name=repetirPassword]');
var confirmacion = "Las contraseñas si coinciden";
var longitud = "La contraseña debe tener mínimo 5 carácteres";
var negacion = "No coinciden las contraseñas";
var vacio = "La contraseña no puede ir vacia";
$(document).ready(function () {
    $('#crearTiendaBoton').click(function () {
        $('#configAdmin').submit();
    });

    $('#crearTiendaBoton').attr('disabled', 'true')
    //oculto por defecto el elemento span
    // var span = $('<div id="alertError" class="alert alert-danger">').insertAfter(pass2);
    // span.hide();
    //función que comprueba las dos contraseñas


    //ejecuto la función al soltar la tecla
    pass2.keyup(function () {
        coincidePassword();
    });
    pass1.keyup(function () {
        coincidePassword();
    });

    $('[data-mask]').inputmask()

    $('#nuevaFechaNacimiento').change(function () {
        var date = $(this).inputmask('unmaskedvalue');

        today = new Date();
        fechaForm = new Date(cambiarFormato(date));
        fechaMax = new Date(1919, 11, 31);

        if (today <= fechaForm){
            $('[name="nuevaFechaNacimiento"]').focus();
            $('#alertError').html('Fecha nacimiento no puede ser mayor a fecha actual y menor a 1920').show()
            $('.newTipo').removeClass('has-error');
            $('.newDocumentoTer').removeClass('has-error');
            $('.newTercero').removeClass('has-error');
            $('.newTelefonoTer').removeClass('has-error');
            $('.newEmailTer').removeClass('has-error');
            $('.newDireccionTer').removeClass('has-error');
            $('.newFechaNac').addClass('has-error');
            $('.newGenero').removeClass('has-error');
        }else if (fechaForm <= fechaMax){
            $('[name="nuevaFechaNacimiento"]').focus();
            $('#alertError').html('Fecha nacimiento no puede ser mayor a fecha actual y menor a 1920').show()
            $('.newTipo').removeClass('has-error');
            $('.newDocumentoTer').removeClass('has-error');
            $('.newTercero').removeClass('has-error');
            $('.newTelefonoTer').removeClass('has-error');
            $('.newEmailTer').removeClass('has-error');
            $('.newDireccionTer').removeClass('has-error');
            $('.newFechaNac').addClass('has-error');
            $('.newGenero').removeClass('has-error');
        }else {
            $('.newTipo').removeClass('has-error');
            $('.newDocumentoTer').removeClass('has-error');
            $('.newTercero').removeClass('has-error');
            $('.newTelefonoTer').removeClass('has-error');
            $('.newEmailTer').removeClass('has-error');
            $('.newDireccionTer').removeClass('has-error');
            $('.newFechaNac').removeClass('has-error');
            $('.newGenero').removeClass('has-error');
        }
    });

    $("#nuevaTiendaDireccion").change(function () {
        var value = $(this).val();
        $("#nuevaDireccion").val(value);
    });

    $("#nuevaTiendaTelefono").change(function () {
        var value = $(this).val();
        $("#nuevoTelefono").val(value);
    });

    $("#nuevaTiendaPropietario").change(function () {
        var value = $(this).val();
        $("#nuevoTercero").val(value);
    });

    $("#nuevaTiendaEmail").change(function () {
        var value = $(this).val();
        $("#nuevoEmail").val(value);
    });

    $('#tabTienda').click(function () {
        $(this).removeAttr('href')
        $(this).removeAttr('data-toggle')

        if ($('[name="nuevoHost"]').val().length < 1
            && $('[name="nuevoDB"]').val().length < 1
            && $('[name="nuevoUsuarioDB"]').val().length < 1) {
            $('#modal-danger').modal('show');
            $('[name="nuevoHost"]').focus();
            $('.host').addClass('has-error');
            $('.namedb').removeClass('has-error');
            $('.userdb').removeClass('has-error');
        } else if ($('[name="nuevoHost"]').val().length < 1) {
            $('[name="nuevoHost"]').focus();
            $('#alertError').html('Nombre de host o ip vacío').show()
            $('.host').addClass('has-error');
            $('.namedb').removeClass('has-error');
            $('.userdb').removeClass('has-error');
        } else if ($('[name="nuevoDB"]').val().length < 1) {
            $('[name="nuevoDB"]').focus();
            $('#alertError').html('Nombre de la base de datos vacío').show()
            $('.namedb').addClass('has-error');
            $('.host').removeClass('has-error');
            $('.userdb').removeClass('has-error');
        } else if ($('[name="nuevoUsuarioDB"]').val().length < 1) {
            $('[name="nuevoUsuarioDB"]').focus();
            $('#alertError').html('Nombre del usuario de la base de datos vacío').show()
            $('.userdb').addClass('has-error');
            $('.host').removeClass('has-error');
            $('.namedb').removeClass('has-error');
        } else {
            $('#alertError').hide()
            $('.host').removeClass('has-error');
            $('.namedb').removeClass('has-error');
            $('.userdb').removeClass('has-error');
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
            && $('[name="nuevaTiendaEmail"]').val().length < 1) {
            $('#modal-danger').modal('show');
            $('[name="nuevaTiendaNombre"]').focus();
            $('.newTienda').addClass('has-error');
            $('.newDirecc').removeClass('has-error');
            $('.newTelefo').removeClass('has-error');
            $('.newPropie').removeClass('has-error');
            $('.newEmail').removeClass('has-error');
        } else if ($('[name="nuevaTiendaNombre"]').val().length < 1) {
            $('[name="nuevaTiendaNombre"]').focus();
            $('#alertError').html('Nombre de la tienda vacío').show()
            $('.newTienda').addClass('has-error');
            $('.newDirecc').removeClass('has-error');
            $('.newTelefo').removeClass('has-error');
            $('.newPropie').removeClass('has-error');
            $('.newEmail').removeClass('has-error');
        } else if ($('[name="nuevaTiendaDireccion"]').val().length < 1) {
            $('[name="nuevaTiendaDireccion"]').focus();
            $('#alertError').html('Dirección vacío').show()
            $('.newTienda').removeClass('has-error');
            $('.newDirecc').addClass('has-error');
            $('.newTelefo').removeClass('has-error');
            $('.newPropie').removeClass('has-error');
            $('.newEmail').removeClass('has-error');
        } else if ($('[name="nuevaTiendaTelefono"]').val().length < 1) {
            $('[name="nuevaTiendaTelefono"]').focus();
            $('#alertError').html('Teléfono vacío').show()
            $('.newTienda').removeClass('has-error');
            $('.newDirecc').removeClass('has-error');
            $('.newTelefo').addClass('has-error');
            $('.newPropie').removeClass('has-error');
            $('.newEmail').removeClass('has-error');
        } else if ($('[name="nuevaTiendaPropietario"]').val().length < 1) {
            $('[name="nuevaTiendaPropietario"]').focus();
            $('#alertError').html('Propietario vacío').show()
            $('.newTienda').removeClass('has-error');
            $('.newDirecc').removeClass('has-error');
            $('.newTelefo').removeClass('has-error');
            $('.newPropie').addClass('has-error');
            $('.newEmail').removeClass('has-error');
        } else if ($('[name="nuevaTiendaEmail"]').val().length < 1) {
            $('[name="nuevaTiendaEmail"]').focus();
            $('#alertError').html('Email vacío').show()
            $('.newTienda').removeClass('has-error');
            $('.newDirecc').removeClass('has-error');
            $('.newTelefo').removeClass('has-error');
            $('.newPropie').removeClass('has-error');
            $('.newEmail').addClass('has-error');
        } else if (!validateEmail($('[name="nuevaTiendaEmail"]').val())) {
            $('[name="nuevaTiendaEmail"]').focus();
            $('#alertError').html('Email inválido').show()
            $('.newTienda').removeClass('has-error');
            $('.newDirecc').removeClass('has-error');
            $('.newTelefo').removeClass('has-error');
            $('.newPropie').removeClass('has-error');
            $('.newEmail').addClass('has-error');
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
            && $('[name="nuevoGeneroTercero"]').val().length < 1) {
            $('#modal-danger').modal('show');
            $('.newTipo').addClass('has-error');
            $('.newDocumentoTer').removeClass('has-error');
            $('.newTercero').removeClass('has-error');
            $('.newTelefonoTer').removeClass('has-error');
            $('.newEmailTer').removeClass('has-error');
            $('.newDireccionTer').removeClass('has-error');
            $('.newFechaNac').removeClass('has-error');
            $('.newGenero').removeClass('has-error');
        } else if ($('[name="nuevoTipoDoc"]').val().length < 1) {
            $('[name="nuevoTipoDoc"]').focus();
            $('#alertError').html('Tipo de documento vacío').show()
            $('.newTipo').addClass('has-error');
            $('.newDocumentoTer').removeClass('has-error');
            $('.newTercero').removeClass('has-error');
            $('.newTelefonoTer').removeClass('has-error');
            $('.newEmailTer').removeClass('has-error');
            $('.newDireccionTer').removeClass('has-error');
            $('.newFechaNac').removeClass('has-error');
            $('.newGenero').removeClass('has-error');
        } else if ($('[name="nuevoDocumentoId"]').val().length < 1) {
            $('[name="nuevoDocumentoId"]').focus();
            $('#alertError').html('Número de documento vacío').show()
            $('.newTipo').removeClass('has-error');
            $('.newDocumentoTer').addClass('has-error');
            $('.newTercero').removeClass('has-error');
            $('.newTelefonoTer').removeClass('has-error');
            $('.newEmailTer').removeClass('has-error');
            $('.newDireccionTer').removeClass('has-error');
            $('.newFechaNac').removeClass('has-error');
            $('.newGenero').removeClass('has-error');
        } else if ($('[name="nuevoTercero"]').val().length < 1) {
            $('[name="nuevoTercero"]').focus();
            $('#alertError').html('Nombre del usuario vacío').show()
            $('.newTipo').removeClass('has-error');
            $('.newDocumentoTer').removeClass('has-error');
            $('.newTercero').addClass('has-error');
            $('.newTelefonoTer').removeClass('has-error');
            $('.newEmailTer').removeClass('has-error');
            $('.newDireccionTer').removeClass('has-error');
            $('.newFechaNac').removeClass('has-error');
            $('.newGenero').removeClass('has-error');
        } else if ($('[name="nuevoTelefono"]').val().length < 1) {
            $('[name="nuevoTelefono"]').focus();
            $('#alertError').html('Teléfono vacío').show()
            $('.newTipo').removeClass('has-error');
            $('.newDocumentoTer').removeClass('has-error');
            $('.newTercero').removeClass('has-error');
            $('.newTelefonoTer').addClass('has-error');
            $('.newEmailTer').removeClass('has-error');
            $('.newDireccionTer').removeClass('has-error');
            $('.newFechaNac').removeClass('has-error');
            $('.newGenero').removeClass('has-error');
        } else if ($('[name="nuevoEmail"]').val().length < 1) {
            $('[name="nuevoEmail"]').focus();
            $('#alertError').html('Email vacío').show()
            $('.newTipo').removeClass('has-error');
            $('.newDocumentoTer').removeClass('has-error');
            $('.newTercero').removeClass('has-error');
            $('.newTelefonoTer').removeClass('has-error');
            $('.newEmailTer').addClass('has-error');
            $('.newDireccionTer').removeClass('has-error');
            $('.newFechaNac').removeClass('has-error');
            $('.newGenero').removeClass('has-error');
        } else if (!validateEmail($('[name="nuevoEmail"]').val())) {
            $('[name="nuevoEmail"]').focus();
            $('#alertError').html('Email inválido').show()
            $('.newTipo').removeClass('has-error');
            $('.newDocumentoTer').removeClass('has-error');
            $('.newTercero').removeClass('has-error');
            $('.newTelefonoTer').removeClass('has-error');
            $('.newEmailTer').addClass('has-error');
            $('.newDireccionTer').removeClass('has-error');
            $('.newFechaNac').removeClass('has-error');
            $('.newGenero').removeClass('has-error');
        } else if ($('[name="nuevaDireccion"]').val().length < 1) {
            $('[name="nuevaDireccion"]').focus();
            $('#alertError').html('Dirección vacía').show()
            $('.newTipo').removeClass('has-error');
            $('.newDocumentoTer').removeClass('has-error');
            $('.newTercero').removeClass('has-error');
            $('.newTelefonoTer').removeClass('has-error');
            $('.newEmailTer').removeClass('has-error');
            $('.newDireccionTer').addClass('has-error');
            $('.newFechaNac').removeClass('has-error');
            $('.newGenero').removeClass('has-error');
        } else if ($('[name="nuevaFechaNacimiento"]').val().length < 1) {
            $('[name="nuevaFechaNacimiento"]').focus();
            $('#alertError').html('Fecha nacimiento vacía').show()
            $('.newTipo').removeClass('has-error');
            $('.newDocumentoTer').removeClass('has-error');
            $('.newTercero').removeClass('has-error');
            $('.newTelefonoTer').removeClass('has-error');
            $('.newEmailTer').removeClass('has-error');
            $('.newDireccionTer').removeClass('has-error');
            $('.newFechaNac').addClass('has-error');
            $('.newGenero').removeClass('has-error');
        } else if ($('[name="nuevoGeneroTercero"]').val().length < 1) {
            $('[name="nuevoGeneroTercero"]').focus();
            $('#alertError').html('Genero vacío').show()
            $('.newTipo').removeClass('has-error');
            $('.newDocumentoTer').removeClass('has-error');
            $('.newTercero').removeClass('has-error');
            $('.newTelefonoTer').removeClass('has-error');
            $('.newEmailTer').removeClass('has-error');
            $('.newDireccionTer').removeClass('has-error');
            $('.newFechaNac').removeClass('has-error');
            $('.newGenero').addClass('has-error');
        } else {
            $('#alertError').hide()
            $(this).attr({ 'href': '#sistematab', 'data-toggle': 'tab' })
            setTimeout(function () {
                $(this).click()
            }, 100)
        }
    });
});

function coincidePassword() {
    var valor1 = pass1.val();
    var valor2 = pass2.val();
    //muestro el span
    // span.show().removeClass();
    //condiciones dentro de la función
    if (valor2.length != 0) {
        if (valor1.length == 0 || valor1 == "") {
            $('#crearTiendaBoton').attr('disabled', 'true')
            $('#alertPass').removeClass("alert-success").addClass('alert-danger');
            $('#alertPass').html(vacio).show()
            // span.text(vacio).addClass('alert alert-danger');	
        } else if (valor1.length < 5) {
            $('#crearTiendaBoton').attr('disabled', 'true')
            $('#alertPass').removeClass("alert-success").addClass('alert-danger');
            $('#alertPass').html(longitud).show()
            // span.text(longitud).addClass('alert alert-danger');
        } else if (valor1 != valor2) {
            $('#crearTiendaBoton').attr('disabled', 'true')
            $('#alertPass').removeClass("alert-success").addClass('alert-danger');
            $('#alertPass').html(negacion).show()
            // span.text(negacion).addClass('alert alert-danger');	
        } else if (valor1.length != 0 && valor1 == valor2) {
            $('#crearTiendaBoton').removeAttr('disabled')
            $('#alertPass').removeClass("alert-danger").addClass('alert-success');
            $('#alertPass').html(confirmacion).show()
            // span.text(confirmacion).removeClass("alert alert-danger").addClass('alert alert-success');
        }
    } else {
        $('#crearTiendaBoton').attr('disabled', 'true')
        $('#alertPass').removeClass("alert-success").addClass('alert-danger');
        $('#alertPass').html(vacio).show()
    }
}

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
$(".nuevaFoto").change(function () {

    var imagen = this.files[0];

    /*=============================================
        VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
        =============================================*/

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevaFoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevaFoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function (event) {

            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);

        })

    }
})

function cambiarFormato(fecha) {
    var aaaa = fecha.slice(0, 4);
    var mm = fecha.slice(5, 6);
    var dd = fecha.slice(7, 8);

    return aaaa + '-' + mm + '-' + dd;
}