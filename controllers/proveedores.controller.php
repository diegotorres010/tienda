<?php

class ControladorProveedores{

	/*=============================================
	CREAR TERCEROS
	=============================================*/

	static public function ctrCrearProveedor(){

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
							   "tipoUsuario"=>"2",
							   "genero"=>$_POST["nuevoGeneroTercero"]);

			   	$respuesta = ModeloProveedores::mdlCrearProveedor($tabla, $datos);

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
									window.location = "proveedores";
									}
								})
					</script>';

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El proveedor no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "proveedores";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function ctrMostrarProveedor($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloProveedores::mdlMostrarProveedor($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrListarProveedor($item, $valor){

		$tabla = "usuarios";
		$respuesta = ModeloProveedores::mdlListarProveedor($tabla, $item, $valor);
		return $respuesta;
	
	}

	/*=============================================
	EDITAR TERCERO
	=============================================*/

	static public function ctrEditarProveedor(){

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
							   "tipoUsuario"=>"2",
							   "genero"=>$_POST["editarGeneroTercero"]);

			   	$respuesta = ModeloProveedores::mdlEditarProveedor($tabla, $datos);

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
									window.location = "proveedores";
									}
								})
					</script>';

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El proveedor no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "proveedores";

							}
						})

			  	</script>';



			}

		}

	}

}

