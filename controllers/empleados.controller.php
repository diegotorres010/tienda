<?php

class ControladorEmpleados{

	static public function ctrIngresoEmpleado(){

		if(isset($_POST["ingEmpleado"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingEmpleado"])){

				$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuariossistema";
				$item = "nombreEmpleado";
				$valor = $_POST["ingEmpleado"];

				$respuesta = ModeloEmpleados::MdlMostrarEmpleados($tabla, $item, $valor);

				if($respuesta["nombreEmpleado"] == $_POST["ingEmpleado"] && $respuesta["contrasena"] == $encriptar){

					if($respuesta["estado"] == 1){

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["idUsuarioSistema"] = $respuesta["idUsuarioSistema"];
						
						$_SESSION["nombreEmpleado"] = $respuesta["nombreEmpleado"];
						$_SESSION["idUsuario"] = $respuesta["idUsuario"];
						$_SESSION["foto"] = $respuesta["foto"];
						
						/*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Bogota');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$item1 = "fecha_ultimo_ingreso";
						$valor1 = $fechaActual;

						$item2 = "idUsuarioSistema";
						$valor2 = $respuesta["idUsuarioSistema"];

						$ultimoLogin = ModeloEmpleados::mdlActualizarEmpleado($tabla, $item1, $valor1, $item2, $valor2);

						if($ultimoLogin == "ok"){

							echo '<script>

								window.location = "inicio";

							</script>';

						}				
						
					}else{

						echo '<br>
							<div class="alert alert-danger">El usuario aún no está activado</div>';

					}		

				}else{

					echo '<br><div class="alert alert-danger">Usuario o contraseña incorrectos, vuelve a intentarlo</div>';

				}

			}	

		}

	}


	static public function ctrCrearEmpleado(){

		if(isset($_POST["nuevoEmpleado"])){			

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoEmpleado"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

			   	/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";

				if(isset($_FILES["nuevaFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "views/img/empleados/".$_POST["nuevoEmpleado"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/empleados/".$_POST["nuevoEmpleado"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/empleados/".$_POST["nuevoEmpleado"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				// $tabla = "terceros";
							   
				// $datosTercero = array("tipoDocumento"=>$_POST["nuevoTipoDoc"],
				// 			  		  "documento"=>$_POST["nuevoDocumentoId"],
				// 			   		  "descripcion"=>$_POST["nuevoTercero"],
				// 				      "telefono"=>$_POST["nuevoTelefono"],
				// 			   		  "email"=>$_POST["nuevoEmail"],
				// 			   		  "direccion"=>$_POST["nuevaDireccion"],
				// 			  		  "fechaNacimiento"=>$_POST["nuevaFechaNacimiento"],
				// 			  		  "tipoUsuario"=>"3",
				// 			 		  "genero"=>$_POST["nuevoGeneroTercero"]);

				// $respuesta = ModeloTerceros::mdlCrearTercero($tabla, $datosTercero);

				// $respuestTmp = explode("|",$respuesta);
				
				//  if($respuestTmp[0] == "1"){
				// 	$tipoAlerta ="error";
				// 	echo'<script>
				// 	swal({
				// 		  type: "'.$tipoAlerta.'",
				// 		  title: "'.$respuestTmp[1].'",
				// 		  showConfirmButton: true,
				// 		  confirmButtonText: "Cerrar"
				// 		  }).then(function(result){
				// 					if (result.value) {
				// 					window.location = "empleados";
				// 					}
				// 				})
				// 	</script>';
				// }
				
				// $tabla = "usuarios";
				// $item = "idUsuario";
				// $valor = null;
				
				// $terceros = ModeloTerceros::mdlTraerTercero($tabla, $item, $valor);

				$tabla = "usuariossistema";

				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array("nombreEmpleado" => $_POST["nuevoEmpleado"],
								"contrasena" => $encriptar,
								"foto"=>$ruta,
								"idUsuario"=>$_POST["nuevoTerEmpleado"],
							    "idTipo" => $_POST["nuevoTipoP"]);

				$respuesta = ModeloEmpleados::mdlIngresarEmpleado($tabla, $datos);

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
									window.location = "empleados";
									}
								})
					</script>';
		}else{
	
			echo '<script>

				swal({

					type: "error",
					title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"

				}).then(function(result){

					if(result.value){
					
						window.location = "empleados";

					}

				});
			

			</script>';
				
				//echo '<script>alert("Jhohan: '. $respuesta . ' ")</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarEmpleados($item, $valor){

		$tabla = "usuariossistema";

		$respuesta = ModeloEmpleados::MdlMostrarEmpleados($tabla, $item, $valor);

		return $respuesta;
	}

	static public function ctrListarEmpTerceros($item, $valor){

		$tabla = "usuarios";
		$respuesta = ModeloEmpleados::mdlListarEmpTerceros($tabla, $item, $valor);
	 	return $respuesta;
	
	}

	static public function ctrListarEmpleados(){	
		$respuesta = ModeloEmpleados::mdlListarEmpleados();
		return $respuesta;
	}

	/*=============================================
	EDITAR EMPLEADO
	=============================================*/

	static public function ctrEditarEmpleado(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL EMPLEADO
					=============================================*/

					$directorio = "views/img/empleados/".$_POST["editarEmpleado"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/empleados/".$_POST["editarEmpleado"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/empleados/".$_POST["editarEmpleado"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "usuariossistema";

				if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{

						echo'<script>

								swal({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result) {
										if (result.value) {

										window.location = "empleados";

										}
									})

						  	</script>';

					}

				}else{

					$encriptar = $_POST["passwordActual"];

				}

				$datos = array("idUsuarioSistema" => $_POST["idUsuarioSistema"],
							   "idTipo" => $_POST["editarTipo"],
					           "nombreEmpleado" => $_POST["editarNombre"],
							   "contrasena" => $encriptar,
							   "foto" => $ruta);

				$respuesta = ModeloEmpleados::mdlEditarEmpleado($tabla, $datos);

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
									window.location = "empleados";
									}
								})
					</script>';


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "empleados";

							}
						})

			  	</script>';

			}

		}

	}

}
	


