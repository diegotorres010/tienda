
$(document).ready(function () {
	cargarBusquedaEmpleados();
	$('#guardarPermisos').click(guardarPermisos);
});

function guardarPermisos() {
	var listElementos = $('ul#listaPermisos').find(':checkbox:checked:enabled');
	var idUsuario = $('#busquedaEmpleado').attr('value');
	$.each(listElementos, function (key, value) {
		var idPrivilegio = $(value).attr('id');
		var datos = new FormData();
		datos.append("idEmpleado", idUsuario);
		datos.append("idPermiso", idPrivilegio);
		$.ajax({
			url: "ajax/permisos.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function (respuesta) {
				console.log(respuesta);
				var respuestaTmp = respuesta.split("|");
				if (respuestaTmp[0] != 0) {
					console.log('Ha ocurrido un error: ' + idUsuario + ' - ' + idPrivilegio);
				}
			}
		});
	});

	swal({

		type: "success",
		title: "¡Los permisos se han creado correctamente!",
		showConfirmButton: true,
		confirmButtonText: "Cerrar"

	}).then(function (result) {

		if (result.value) {

			window.location = "empleados";

		}

	});

}

function cargarBusquedaEmpleados() {
	var busquedaEmpleados = [];

	var datos = new FormData();
	datos.append("mostrarEmpleados", true);

	$.ajax({
		url: "ajax/empleados.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {
			for (var i = 0; i < respuesta.length; i++) {
				empleadosItem = {
					label: respuesta[i].idUsuarioSistema + ' - ' + respuesta[i].nombreEmpleado,
					value: respuesta[i].idUsuarioSistema
				}
				busquedaEmpleados.push(empleadosItem);
			}
			$("#busquedaEmpleado").autocomplete({
				source: busquedaEmpleados,
				select: function (e, ui) {
					$(this).val(ui.item.label).attr('value', ui.item.value)
					return false;
				}
			}).autocomplete("instance")._renderItem = function (ul, item) {
				return $("<li>")
					.append("<div>" + item.label + "</div>")
					.appendTo(ul);
			};

			cargarPrivilegios();
		}
	});
}

function cargarPrivilegios() {
	var privilegiosMain = ['1', '2', '3', '7'];
	var miembrosEmpleados = ['4', '5', '6'];
	var miembrosProveedores = ['8', '9', '10'];

	$.ajax({
		url: "ajax/privilegios.ajax.php",
		method: "POST",
		data: '',
		dataType: "json",
		success: function (respuesta) {
			respuesta.forEach(function (element) {
				privilegiosMain.forEach(function (privilegio) {
					if (element.idPrivilegio == privilegio) {
						$('#listaPermisos').append(
							'<li id="list-' + element.idPrivilegio + '" >'
							+ '<label>'
							+ '<input type="checkbox" id="' + element.idPrivilegio + '">'
							+ element.detallePrivilegio
							+ '</label>'
							+ '<ul class="sub-privilegio" style="display:none"></ul>'
							+ '</li>'
						);
					}
				});

				miembrosEmpleados.forEach(function (miembrosEmpleadosTmp) {
					if (element.idPrivilegio == miembrosEmpleadosTmp) {
						$("#list-3 .sub-privilegio").append(
							'<li>'
							+ '<label>'
							+ '<input type="checkbox" id="' + element.idPrivilegio + '" >'
							+ element.detallePrivilegio
							+ '</label>'
							+ '</li>'
						);
					}
				});

				miembrosProveedores.forEach(function (miembrosProveedoresTmp) {
					if (element.idPrivilegio == miembrosProveedoresTmp) {
						$("#list-7 .sub-privilegio").append(
							'<li>'
							+ '<label>'
							+ '<input type="checkbox" id="' + element.idPrivilegio + '" >'
							+ element.detallePrivilegio
							+ '</label>'
							+ '</li>'
						);
					}
				});
			});

			initClickCheckbox();
		}
	});
}

function initClickCheckbox() {
	$(":checkbox").change(function () {
		var listParent = $(this).closest('li');
		var subList = $(listParent).find('.sub-privilegio')
		if (subList.length > 0) {
			if ($(this).is(':checked')) {
				$(subList).show('slideDown');
				var elementos = $(subList).find(":checkbox");
				for (var i = 0; i < $(elementos).length; i++) {
					var elemento = $(elementos)[i];
					$(elemento).prop('checked', false);
				}
			} else {
				$(subList).hide('slideUp');
			}
		}
	});
}

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

$(".editarFoto").change(function () {

	var imagen = this.files[0];

	/*=============================================
		VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
		=============================================*/

	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

		$(".editarFoto").val("");

		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

	} else if (imagen["size"] > 2000000) {

		$(".editarFoto").val("");

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

			if (respuesta["foto"] != "") {
				$(".previsualizarEditar").attr("src", respuesta["foto"]);
			} else {
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

$("#nuevoEmpleado").change(function () {

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	$.ajax({
		url: "ajax/empleados.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			if (respuesta) {

				$("#nuevoEmpleado").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

				$("#nuevoEmpleado").val("");

			}

		}

	})
})