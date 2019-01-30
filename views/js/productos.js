/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/

// $.ajax({

// 	url: "ajax/datatable-productos.ajax.php",
// 	success: function (respuesta) {

// 		console.log("respuesta", respuesta);

// 	}

// })

// var listarProductos = $("#listarProductos").val();

$('.tablaProductos').DataTable({
	"ajax": "ajax/datatable-productos.ajax.php",
	"initComplete": function () { validarBotonesProductos(); initBotones(); },
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "Buscar:",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

});


function initBotones() {
	$('.sorting_1').click(function () {
		setTimeout(function () { validarBotonesProductos() }, 50)
	});
}

function validarBotonesProductos() {	
	var botones = $('.btnEditarProducto');
	for (var i = 0; i < botones.length; i++) {
		let boton = botones[i]
		if ($(boton).attr('estado') == 0) $(boton).attr('disabled', 'true')
	}
}

$(".tablaProductos").on("click", ".btnActivarProducto", function () {

	var idProducto = $(this).attr("idProducto");
	var estado = $(this).attr("estado");

	var datos = new FormData();
	datos.append("activarIdProducto", idProducto);
	datos.append("activarProducto", estado);

	$.ajax({

		url: "ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function (respuesta) {
			swal({
				title: "El producto ha sido actualizado",
				type: "success",
				confirmButtonText: "¡Cerrar!"
			}).then(function (result) {
				if (result.value) {
					window.location = "productos";
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

/*=============================================
CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO
=============================================*/
$("#nuevaCategoria").change(function () {

	var idCategoria = $(this).val();

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);

	$.ajax({

		url: "ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			if (!respuesta) {

				var nuevoCodigo = idCategoria + "01";
				$("#nuevoCodigo").val(nuevoCodigo);

			} else {

				var nuevoCodigo = Number(respuesta["codigoProducto"]) + 1;
				$("#nuevoCodigo").val(nuevoCodigo);

			}

		}

	})

})

/*=============================================
AGREGANDO PRECIO DE VENTA
=============================================*/
$("#nuevoPrecioCompra, #editarPrecioCompra").change(function () {

	if ($(".porcentaje").prop("checked")) {

		var valorPorcentaje = $(".nuevoPorcentaje").val();

		var porcentaje = Number(($("#nuevoPrecioCompra").val() * valorPorcentaje / 100)) + Number($("#nuevoPrecioCompra").val());

		var editarPorcentaje = Number(($("#editarPrecioCompra").val() * valorPorcentaje / 100)) + Number($("#editarPrecioCompra").val());

		$("#nuevoPrecioVenta").val(porcentaje);
		$("#nuevoPrecioVenta").prop("readonly", true);

		$("#editarPrecioVenta").val(editarPorcentaje);
		$("#editarPrecioVenta").prop("readonly", true);

	}

})

/*=============================================
CAMBIO DE PORCENTAJE
=============================================*/
$(".nuevoPorcentaje").change(function () {

	if ($(".porcentaje").prop("checked")) {

		var valorPorcentaje = $(this).val();

		var porcentaje = Number(($("#nuevoPrecioCompra").val() * valorPorcentaje / 100)) + Number($("#nuevoPrecioCompra").val());

		var editarPorcentaje = Number(($("#editarPrecioCompra").val() * valorPorcentaje / 100)) + Number($("#editarPrecioCompra").val());

		$("#nuevoPrecioVenta").val(porcentaje);
		$("#nuevoPrecioVenta").prop("readonly", true);

		$("#editarPrecioVenta").val(editarPorcentaje);
		$("#editarPrecioVenta").prop("readonly", true);

	}

})

$(".porcentaje").on("ifUnchecked", function () {

	$("#nuevoPrecioVenta").prop("readonly", false);
	$("#editarPrecioVenta").prop("readonly", false);

})

$(".porcentaje").on("ifChecked", function () {

	$("#nuevoPrecioVenta").prop("readonly", true);
	$("#editarPrecioVenta").prop("readonly", true);

})

/*=============================================
SUBIENDO LA FOTO DEL PRODUCTO
=============================================*/

$(".nuevaImagen").change(function () {

	var imagen = this.files[0];

	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

		$(".nuevaImagen").val("");

		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

	} else if (imagen["size"] > 2000000) {

		$(".nuevaImagen").val("");

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

$(".editarImagen").change(function () {

	var imagen = this.files[0];

	/*=============================================
		VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
		=============================================*/

	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

		$(".editarImagen").val("");

		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

	} else if (imagen["size"] > 2000000) {

		$(".editarImagen").val("");

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

/*=============================================
EDITAR PRODUCTO
=============================================*/

$(".tablaProductos tbody").on("click", "button.btnEditarProducto", function () {

	var idProducto = $(this).attr("idProducto");

	var datos = new FormData();
	datos.append("idProducto", idProducto);

	$.ajax({

		url: "ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			var datosCategoria = new FormData();
			datosCategoria.append("idCategoria", respuesta["idCategoria"]);

			$.ajax({

				url: "ajax/categorias.ajax.php",
				method: "POST",
				data: datosCategoria,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function (respuesta) {

					$('select[name="editarCategoria"] > option[value="' + respuesta["idCategoria"] + '"]').attr('selected', true);
					$('select[name="editarCategoria"]').val(respuesta["idCategoria"]).trigger('change');

				}

			})

			var datosMedida = new FormData();
			datosMedida.append("idUnidadVenta", respuesta["idUnidadVenta"]);

			$.ajax({

				url: "ajax/medidas.ajax.php",
				method: "POST",
				data: datosMedida,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function (respuesta) {

					$('select[name="editarMedidas"] > option[value="' + respuesta["idUnidadVenta"] + '"]').attr('selected', true);
					$('select[name="editarMedidas"]').val(respuesta["idUnidadVenta"]).trigger('change');

				}

			})

			var datosImpuesto = new FormData();
			datosImpuesto.append("idIva", respuesta["idIva"]);

			$.ajax({

				url: "ajax/impuestos.ajax.php",
				method: "POST",
				data: datosImpuesto,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function (respuesta) {

					$('select[name="editarImpuestos"] > option[value="' + respuesta["idIva"] + '"]').attr('selected', true);
					$('select[name="editarImpuestos"]').val(respuesta["idIva"]).trigger('change');

				}

			})

			$("#idProducto").val(respuesta["idProducto"]);

			$("#editarCodigo").val(respuesta["codigoProducto"]);

			$("#editarCodigoBarras").val(respuesta["codigoBarras"]);

			$("#editarDescripcion").val(respuesta["descripcion"]);

			$("#imagenActual").val(respuesta["imagen"]);			

			if (respuesta["imagen"] != "") {
				$(".previsualizarEditar").attr("src", respuesta["imagen"]);
			} else {
				$(".previsualizarEditar").attr("src", "views/img/productos/default/anonymous.png");
			}

		}

	})

})

$("#nuevoCodigo").change(function () { validarProductos(this, 'codigoProducto') });
$("#nuevoCodigoBarras").change(function () { validarProductos(this, 'codigoBarras') });

function validarProductos(control, codigo) {
	$(".alert").remove();

	var producto = $(control).val();
	var datos = new FormData();
	datos.append("validarProducto", producto);
	datos.append("campo", codigo);
	console.log(producto);

	$.ajax({
		url: "ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {
			if (respuesta) {
				$(control).val('').parent().after('<div class="alert alert-warning">Este codigo ya existe en la base de datos</div>');
			}

		}

	})
}

