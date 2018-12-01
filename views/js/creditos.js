
$(".tablas").on("click", ".btnEditarCredito", function(){

	var idCredito = $(this).attr("idCredito");

	var datos = new FormData();
	datos.append("idCredito", idCredito);

	$.ajax({
			url: "ajax/creditos.ajax.php",
			method: "POST",
      data: datos,
      cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

					var datosCliente = new FormData();
					datosCliente.append("idUsuarioSel", respuesta["idUsuario"]);

					$.ajax({

						url: "ajax/clientes.ajax.php",
						method: "POST",
						data: datosCliente,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function (respuesta) {

							$("#editarClienteCre").val(respuesta["idUsuario"]);
              				$("#editarClienteCre").html(respuesta["descripcion"]);

						}

					})

			$("#idCredito").val(respuesta["idCredito"]);
     		$("#editarCredito").val(respuesta["valorMaximo"]);
     		$("#editarDiasPlazo").val(respuesta["diasPlazo"]);

     	}

	})
})