
$(document).ready(function(){
	console.log("hola11");
	$(".btnEditarTienda").click(evento);
});
function evento() {

	console.log("hola");
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
			console.log(respuesta);

			$("#idTienda").val(respuesta["idTienda"]);
			$("#editarTiendaNombre").val(respuesta["nombreTienda"]);

			$("#editarTiendaDireccion").val(respuesta["direccion"]);

			$("#editarTiendaTelefono").val(respuesta["telefono"]);

			$("#editarTiendaPropietario").val(respuesta["propietario"]);
			$("#editarTiendaEmail").val(respuesta["email"]);

		}

	})

};