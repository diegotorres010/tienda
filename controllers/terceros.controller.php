<?php

class ControladorTerceros{

	/*=============================================
	CREAR TERCEROS
	=============================================*/

	static public function ctrCrearTercero(){

		if(isset($_POST["nuevoTercero"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTercero"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoDocumentoId"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"])){

			   	$tabla = "usuarios";

			   	$datos = array("tipoDocumento"=>$_POST["nuevoTipoDoc"],
					   		   "documento"=>$_POST["nuevoDocumentoId"],
							   "descripcion"=>$_POST["nuevoTercero"],
							   "telefono"=>$_POST["nuevoTelefono"],
					           "email"=>$_POST["nuevoEmail"],
					           "direccion"=>$_POST["nuevaDireccion"],
					           "fechaNacimiento"=>$_POST["nuevaFechaNacimiento"],
							   "tipoUsuario"=>$_POST["nuevoTipoTercero"],
							   "genero"=>$_POST["nuevoGeneroTercero"]);

			   	$respuesta = ModeloTerceros::mdlCrearTercero($tabla, $datos);

			   	$respuestTmp = explode("|",$respuesta);
				
				 if($respuestTmp[0] == "1"){
					$tipoAlerta ="error";
				}else{
					$tipoAlerta ="success";
				}
					echo'<script>
					swal({
						  type: "'.$tipoAlerta.'",
						  title: "'.$respuestTmp[1].'",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									window.location = "terceros";
									}
								})
					</script>';

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
	MOSTRAR USUARIOS
	=============================================*/

	static public function ctrMostrarTercero($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloTerceros::mdlMostrarTercero($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrListarTercero($item, $valor){

		$tabla = "usuarios";
		$respuesta = ModeloTerceros::mdlListarTercero($tabla, $item, $valor);
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

			   	$tabla = "usuarios";

				$datos = array("idUsuario"=>$_POST["idTercero"],
							   "tipoDocumento"=>$_POST["editarTipoDoc"],
				   			   "documento"=>$_POST["editarDocumentoId"],
							   "descripcion"=>$_POST["editarTercero"],
							   "telefono"=>$_POST["editarTelefono"],
							   "email"=>$_POST["editarEmail"],
							   "direccion"=>$_POST["editarDireccion"],
							   "fechaNacimiento"=>$_POST["editarFechaNacimiento"],
							   "tipoUsuario"=>$_POST["editarTipoTercero"],
							   "genero"=>$_POST["editarGeneroTercero"]);

			   	$respuesta = ModeloTerceros::mdlEditarTercero($tabla, $datos);

			   	$respuestTmp = explode("|",$respuesta);
				
				 if($respuestTmp[0] == "1"){
					$tipoAlerta ="error";
				}else{
					$tipoAlerta ="success";
				}
					echo'<script>
					swal({
						  type: "'.$tipoAlerta.'",
						  title: "'.$respuestTmp[1].'",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									window.location = "terceros";
									}
								})
					</script>';

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

}

