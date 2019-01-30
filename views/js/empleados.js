
$(document).ready(function () {
	// cargarBusquedaEmpleados();
	$('#guardarPermisos').click(guardarPermisos);
});

function guardarPermisos() {
	var listElementos = $('ul#listaPermisos').find(':checkbox:checked:enabled');
	var idUsuario = $('#idUsuarioP').attr('value');
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
				} else {
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
			}
		});
	});

}

// function cargarBusquedaEmpleados() {
// 	var busquedaEmpleados = [];

// 	var datos = new FormData();
// 	datos.append("mostrarEmpleados", true);

// 	$.ajax({
// 		url: "ajax/empleados.ajax.php",
// 		method: "POST",
// 		data: datos,
// 		cache: false,
// 		contentType: false,
// 		processData: false,
// 		dataType: "json",
// 		success: function (respuesta) {
// 			for (var i = 0; i < respuesta.length; i++) {
// 				empleadosItem = {
// 					label: respuesta[i].idUsuarioSistema + ' - ' + respuesta[i].nombreEmpleado,
// 					value: respuesta[i].idUsuarioSistema
// 				}
// 				busquedaEmpleados.push(empleadosItem);
// 			}
// 			$("#busquedaEmpleado").autocomplete({
// 				source: busquedaEmpleados,
// 				select: function (e, ui) {
// 					$(this).val(ui.item.label).attr('value', ui.item.value)
// 					return false;
// 				}
// 			}).autocomplete("instance")._renderItem = function (ul, item) {
// 				return $("<li>")
// 					.append("<div>" + item.label + "</div>")
// 					.appendTo(ul);
// 			};

// 			cargarPrivilegios();
// 		}
// 	});
// }

function cargarPrivilegios(claseP) {
	var privilegiosMain = ['1', '2', '3', '7', '11', '12', '13', '17', '21', '25', '29', '30', '31', '32', '33', '37', '38'];
	var miembrosEmpleados = ['4', '5', '6'];
	var miembrosProveedores = ['8', '9', '10'];
	var miembrosTerceros = ['14', '15', '16'];
	var miembrosImpuestos = ['18', '19', '20'];
	var miembrosMedidas = ['22', '23', '24'];
	var miembrosCategorias = ['26', '27', '28'];
	var miembrosControl = ['34', '35', '36'];

	$.ajax({
		url: "ajax/privilegios.ajax.php",
		method: "POST",
		data: '',
		dataType: "json",
		success: function (respuesta) {
			$('#listaPermisos').html('');
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

				miembrosTerceros.forEach(function (miembrosTercerosTmp) {
					if (element.idPrivilegio == miembrosTercerosTmp) {
						$("#list-13 .sub-privilegio").append(
							'<li>'
							+ '<label>'
							+ '<input type="checkbox" id="' + element.idPrivilegio + '" >'
							+ element.detallePrivilegio
							+ '</label>'
							+ '</li>'
						);
					}
				});

				miembrosImpuestos.forEach(function (miembrosImpuestosTmp) {
					if (element.idPrivilegio == miembrosImpuestosTmp) {
						$("#list-17 .sub-privilegio").append(
							'<li>'
							+ '<label>'
							+ '<input type="checkbox" id="' + element.idPrivilegio + '" >'
							+ element.detallePrivilegio
							+ '</label>'
							+ '</li>'
						);
					}
				});

				miembrosMedidas.forEach(function (miembrosMedidasTmp) {
					if (element.idPrivilegio == miembrosMedidasTmp) {
						$("#list-21 .sub-privilegio").append(
							'<li>'
							+ '<label>'
							+ '<input type="checkbox" id="' + element.idPrivilegio + '" >'
							+ element.detallePrivilegio
							+ '</label>'
							+ '</li>'
						);
					}
				});

				miembrosCategorias.forEach(function (miembrosCategoriasTmp) {
					if (element.idPrivilegio == miembrosCategoriasTmp) {
						$("#list-25 .sub-privilegio").append(
							'<li>'
							+ '<label>'
							+ '<input type="checkbox" id="' + element.idPrivilegio + '" >'
							+ element.detallePrivilegio
							+ '</label>'
							+ '</li>'
						);
					}
				});

				miembrosControl.forEach(function (miembrosControlTmp) {
					if (element.idPrivilegio == miembrosControlTmp) {
						$("#list-33 .sub-privilegio").append(
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
	validarBotonesEmpleados('.btnEditarEmpleado');
	validarBotonesEmpleados('.btnAgregar');
	$('.sorting_1').click(function () {
		setTimeout(function () { validarBotonesEmpleados('.btnEditarEmpleado') }, 50)
		setTimeout(function () { validarBotonesEmpleados('.btnAgregar') }, 50)
	});

	$('.btnAgregar').click(function () {
		$('#PermisosBoton').removeClass('guardarModificar');
		$('#PermisosBoton').addClass('guardarActual');
	})

	$('.btnModificar').click(function () {
		$('#PermisosBoton').removeClass('guardarActual');
		$('#PermisosBoton').addClass('guardarModificar');
	})
});

function validarBotonesEmpleados(botonedit) {
	var botones = $(botonedit);
	for (var i = 0; i < botones.length; i++) {
		console.log(botones[i])
		let boton = botones[i]
		if ($(boton).attr('estado') == 0) $(boton).attr('disabled', 'true')
	}
}

$(".tablas").on("click", ".btnEditarEmpleado", function () {

	var idUsuarioSistema = $(this).attr("idUsuarioSistema");

	var datos = new FormData();
	datos.append("idUsuarioSistema", idUsuarioSistema);

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
			$("#idTipo").val(respuesta["idTipo"]);
			$("#editarNombre").val(respuesta["nombreEmpleado"]);
			$("#fotoActual").val(respuesta["foto"]);
			$("#passwordActual").val(respuesta["password"]);

			if (respuesta["foto"] != "") {
				$(".previsualizarEditar").attr("src", respuesta["foto"]);
			} else {
				$(".previsualizarEditar").attr("src", "views/img/empleados/default/anonymous.png");
			}
		}
	})

})

$(".tablas").on("click", ".btnPermisosEmpleado", function () {

	var idTipo = $(this).attr("idTipo");

	var datos = new FormData();
	datos.append("idTipo", idTipo);
	var claseP = $(this).attr("class").split(' ');

	$.ajax({
		url: "ajax/permisos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {
			console.log(respuesta);
			console.log(respuesta[0]['idTipo']);
			$("#nombreTipo").val(respuesta["nombreTipo"]);
			$("#idTipo").val(respuesta["idTipo"]);

	 		cargarPrivilegios(claseP[3]);

	 		var datosPrivilegio = new FormData();
	 		datosPrivilegio.append("idUsuarioPermiso", respuesta["idTipo"]);

	 		 console.log(respuesta["idTipo"]);

			$.ajax({
				url: "ajax/permisos.ajax.php",
				method: "POST",
				data: datosPrivilegio,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function (respuesta) {
					console.log(respuesta);
					$("#nombreEmpleadoP").val(respuesta["nombreEmpleado"]);

					var listadoCheck = $('#listaPermisos :checkbox');

					$.each(listadoCheck, function (index, value) {
						var idCheck = $(value).attr("id");
						for (var i = 0; i < respuesta.length; i++) {
							var idPermiso = respuesta[i].idPrivilegio;
							if (idCheck == idPermiso){
								$(this).attr('checked', true);
							}
						}
					})


				}
			})
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

$("#nuevoTerEmpleado").change(function () {

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarTerEmpleado", usuario);

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

				$('select[name="nuevoTerEmpleado"]').val("").trigger('change');

				$("#nuevoTerEmpleado").parent().after('<div class="alert alert-warning">Este tercero ya existe en la base de datos</div>');

			}

		}

	})
})