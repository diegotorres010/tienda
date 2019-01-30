<?php

require_once "../models/tiendas.model.php";
require_once "../models/terceros.model.php";
require_once "../models/usuarios.model.php";

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

				$respuesta = ModeloTiendas::mdlIngresarTienda($tabla, $datos);

			   	if($respuesta == "ok"){
					echo'<div class="callout callout-success">
							<h4>Tienda</h4>	
							<p>La tienda ha sido guardado correctamente</p>
						</div>';
				}

			}else{
				echo'<div class="callout callout-danger">
                		<h4>Tienda</h4>
                		<p>¡Los campos de tienda no fueron creados porque no pueden ir vacíos o tenían caracteres especiales! <br> Vuelva a intentarlo de volver a presentarse el error contactese con SITIB.</p>
              		 </div>';
			}

		}

	}

	static public function ctrCrearTiendaTercero(){

		if(isset($_POST["nuevoTercero"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTercero"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoDocumentoId"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"])){

				$item = "idTienda";
				$valor = null;	 
				$tabla = "tienda";

				$tienda = ModeloTiendas::mdlTraerTienda($tabla, $item, $valor);

			   	$tabla = "usuarios";

			   	$datos = array("tipoDocumento"=>$_POST["nuevoTipoDoc"],
					   		   "documento"=>$_POST["nuevoDocumentoId"],
							   "nombre"=>$_POST["nuevoTercero"],
							   "telefono"=>$_POST["nuevoTelefono"],
					           "email"=>$_POST["nuevoEmail"],
					           "direccion"=>$_POST["nuevaDireccion"],
					           "fechaNacimiento"=>$_POST["nuevaFechaNacimiento"],
							   "tipoUsuario"=>"3",
							   "genero"=>$_POST["nuevoGeneroTercero"]);

			   	$respuesta = ModeloTerceros::mdlIngresarTercero($tabla, $datos, $tienda);

			   	if($respuesta == "ok"){

					echo'<div class="callout callout-success">
							<h4>Persona</h4>	
							<p>La persona ha sido guardado correctamente</p>
				   		 </div>';
				}

			}else{

				echo'<div class="callout callout-danger">
						<h4>Persona</h4>
						<p>¡Los campos de persona no fueron creados porque no pueden ir vacíos o tenían caracteres especiales! <br> Vuelva a intentarlo de volver a presentarse el error contactese con SITIB.</p>
			   		 </div>';
			}

		}

	}

	static public function ctrCrearTiendaUsuario(){

		if(isset($_POST["nuevoEmpleado"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoEmpleado"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

				$ruta = "";

				if(isset($_FILES["nuevaFoto"]["tmp_name"])){
					
					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

				// mostrar directorio actual echo getcwd() . "\n";
				// guardo el directorio actual
				
					$oldPath = getcwd();
				// regreso de directorio para ingresar a vistas img empleados
					chdir('../');				
					
					$directorio = "views/img/empleados/".$_POST["nuevoEmpleado"];

					// error_reporting(0);

					// if(!mkdir($directorio, 0777)) {
					// 	echo '<div class="callout callout-danger">
                	// 			<h4>Imagen del usuario</h4>
                	// 			<p>Error al crear la carpeta con la imagen del usuario.</p>
              		//  		  </div>';
					// }

					mkdir($directorio, 0755);


					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/empleados/".$_POST["nuevoEmpleado"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaFoto"]["type"] == "image/png"){

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/empleados/".$_POST["nuevoEmpleado"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}
					chdir($oldPath);

				}

				$item = "idUsuario";
				$valor = null;	 
				$tabla = "usuarios";

				$usuario = ModeloUsuarios::mdlTraerUsuario($tabla, $item, $valor);

				$tabla = "usuariossistema";

				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array("usuario" => $_POST["nuevoEmpleado"],
							   "idTipo" => "1",
					           "password" => $encriptar,
							   "foto"=>$ruta);

				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos, $usuario);

				if($respuesta == "ok"){

					echo '<div class="callout callout-success">
							<h4>Usuario del sistema</h4>	
							<p>¡El usuario ha sido guardado correctamente!</p>
						  </div>';
				}	


			}else{

				echo '<div class="callout callout-danger">
						<h4>Usuario del sistema</h4>
						<p>¡Los campos de usuario del sistema no fueron creados porque no pueden ir vacíos o tenían caracteres especiales! <br> Vuelva a intentarlo de volver a presentarse el error contactese con SITIB.</p>
					  </div>';
			}	

		}

	}

	static public function ctrTraerTienda($item, $valor){

		$tabla = "tienda";

		$respuesta = ModeloTiendas::mdlTraerTienda($tabla, $item, $valor);

		return $respuesta;
	}

	static public function ctrMostrarTienda($item, $valor){

		$tabla = "tienda";

		$respuesta = ModeloTiendas::MdlMostrarTienda($tabla, $item, $valor);

		return $respuesta;
	}

	static public function ctrEditarTienda(){

		if(isset($_POST["editarTiendaNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTiendaNombre"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarTiendaDireccion"]) &&
			   preg_match('/^[()\-0-9 ]+$/', $_POST["editarTiendaTelefono"]) && 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTiendaPropietario"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarTiendaEmail"])){

			   	$tabla = "tienda";

			   	$datos = array("idTienda"=>$_POST["idTienda"],
					           "nombreTienda"=>$_POST["editarTiendaNombre"],
							   "direccion"=>$_POST["editarTiendaDireccion"],
							   "telefono"=>$_POST["editarTiendaTelefono"],
							   "email"=>$_POST["editarTiendaEmail"],
							   "propietario"=>$_POST["editarTiendaPropietario"]);

				$respuesta = ModeloTiendas::mdlEditarTienda($tabla, $datos);
				
				if($respuesta == "ok"){
					echo'<script>

						swal({
							type: "success",
							title: "¡La tienda se ha actualizado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
								if (result.value) {

								window.location = "inicio";

								}
							})

					</script>';
			   }else{
				echo'<script>

						swal({
							type: "error",
							title: "¡Error la tienda no se pudo actualizar!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
								if (result.value) {

								window.location = "inicio";

								}
							})

					</script>';
			   }

			}else{
				echo'<script>

					swal({
						  type: "error",
						  title: "¡La tienda no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "inicio";

							}
						})

			  	</script>';
			}

		}

	}

}

