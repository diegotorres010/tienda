/*=============================================
EDITAR CATEGORIA
=============================================*/
$(document).ready(function () {
  validarBotonesCategorias();
  $('.sorting_1').click(function () {    
    setTimeout(function () { validarBotonesCategorias() }, 50)
  });
});

function validarBotonesCategorias() {  
  var botones = $('.btnEditarCategoria');
  for (var i = 0; i < botones.length; i++) {
    let boton = botones[i]
    if ($(boton).attr('estado') == 0) $(boton).attr('disabled', 'true')
  }
}

$(".tablas").on("click", ".btnEditarCategoria", function(){

	var idCategoria = $(this).attr("idCategoria");

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);

	$.ajax({
		url: "ajax/categorias.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarCategoria").val(respuesta["descripcion"]);
     		$("#idCategoria").val(respuesta["idCategoria"]);

     	}

	})
})

$(".tablas").on("click", ".btnActivarCategoria", function () {

	var idCategoria = $(this).attr("idCategoria");
	var estado = $(this).attr("estado");
  
	  var datos = new FormData();
	  datos.append("activarIdCategoria", idCategoria);
	  datos.append("activarCategoria", estado);	
  
	$.ajax({
  
	  url: "ajax/categorias.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (respuesta) {      
				  swal({
					  title: "La categoria ha sido actualizada",
					  type: "success",
					  confirmButtonText: "¡Cerrar!"
				  }).then(function (result) {
					  if (result.value) {
						  window.location = "categorias";
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
  
  
  $("#nuevaCategoria").change(function(){
  
	$(".alert").remove();
  
	var categoria = $(this).val();
  
	  var datos = new FormData();
	  datos.append("validarCategoria", categoria);
  
	   $.ajax({
		  url:"ajax/categorias.ajax.php",
		  method:"POST",
		  data: datos,
		  cache: false,
		  contentType: false,
		  processData: false,
		  dataType: "json",
		  success:function(respuesta){
			  
			  if(respuesta){
  
				  $("#nuevaCategoria").val('').parent().after('<div class="alert alert-warning">Esta categoría ya existe en la base de datos</div>');
  
			  }
  
		  }
  
	  })
  })

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
// $(".tablas").on("click", ".btnEliminarCategoria", function(){

// 	 var idCategoria = $(this).attr("idCategoria");
// 	 var descripcion = $(this).attr("descripcion");

// 	 swal({
// 	 	title: '¿Está seguro de borrar la categoría?',
// 	 	text: "¡Si no lo está puede cancelar la acción!",
// 	 	type: 'warning',
// 	 	showCancelButton: true,
// 	 	confirmButtonColor: '#3085d6',
// 	 	cancelButtonColor: '#d33',
// 	 	cancelButtonText: 'Cancelar',
// 	 	confirmButtonText: 'Si, borrar categoría!'
// 	 }).then(function(result){

// 	 	if(result.value){

// 	 		window.location = "index2.php?ruta=categorias&idCategoria=" + idCategoria + "&descripcion=" + descripcion;

// 	 	}

// 	 })

// })