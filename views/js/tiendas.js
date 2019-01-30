$(document).ready(function(){
	var idTienda = $(this).attr("idTienda");
	console.log(idTienda);

	var datos = new FormData();
	datos.append("idTienda", idTienda);

	$.ajax({

		url: "ajax/tiendas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$('select[name="editarTiendaPropietario"] > option[value="' + respuesta["propietario"] + '"]').attr('selected', true);
			$('select[name="editarTiendaPropietario"]').val(respuesta["propietario"]).trigger('change');

		}

	})
});