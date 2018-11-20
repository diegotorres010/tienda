<?php

class ControladorTiendas{

	/*=============================================
	CREAR TIENDAS
	=============================================*/

	static public function ctrCrearTienda(){

		if(isset($_POST["nuevaTiendaNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaTiendaNombre"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaTiendaDireccion"]) &&
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevaTiendaTelefono"]) && 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaTiendaPropietario"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevaTiendaEmail"])){

			   	$tabla = "tienda";

			   	$datos = array("nombreTienda"=>$_POST["nuevaTiendaNombre"],
							   "direccion"=>$_POST["nuevaTiendaDireccion"],
							   "telefono"=>$_POST["nuevaTiendaTelefono"],
							   "email"=>$_POST["nuevaTiendaEmail"],
							   "propietario"=>$_POST["nuevaTiendaPropietario"]);

			//   	$respuesta = ModeloTiendas::mdlIngresarTienda($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La tienda ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "terceros";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "terceros";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR TERCEROS
	=============================================*/

	static public function ctrMostrarTercero($item, $valor){

		$tabla = "terceros";

		$respuesta = ModeloTerceros::mdlMostrarTercero($tabla, $item, $valor);

	//	var_dump($respuesta);
		return $respuesta;

	}

	/*=============================================
	EDITAR TERCERO
	=============================================*/

	static public function ctrEditarTercero(){

		if(isset($_POST["editarTercero"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTercero"]) &&
     		   preg_match('/^[0-9]+$/', $_POST["editarDocumentoId"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"])){

			   	$tabla = "terceros";

				$datos = array("idTercero"=>$_POST["idTercero"],
							   "tipoDoc"=>$_POST["editarTipoDoc"],
				   			   "documentoId"=>$_POST["editarDocumentoId"],
							   "nombre"=>$_POST["editarTercero"],
							   "telefono"=>$_POST["editarTelefono"],
							   "email"=>$_POST["editarEmail"],
							   "direccion"=>$_POST["editarDireccion"],
							   "fechaNacimiento"=>$_POST["editarFechaNacimiento"],
							   "tipoTercero"=>$_POST["editarTipoTercero"],
							   "genero"=>$_POST["editarGeneroTercero"]);

			   	$respuesta = ModeloTerceros::mdlEditarTercero($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "terceros";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "terceros";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR TERCERO
	=============================================*/

	static public function ctrEliminarTercero(){

		if(isset($_GET["idTercero"])){

			$tabla ="terceros";
			$datos = $_GET["idTercero"];

			$respuesta = ModeloTerceros::mdlEliminarTercero($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "terceros";

								}
							})

				</script>';

			}		

		}

	}

}
