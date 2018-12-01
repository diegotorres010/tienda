<?php

class ControladorProductos{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProducto($item, $valor, $orden){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProducto($tabla, $item, $valor, $orden);

		return $respuesta;

	}

	static public function ctrMostrarProductoDispo($item, $valor, $orden){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductoDispo($tabla, $item, $valor, $orden);

		return $respuesta;

	}

	static public function ctrListarProducto($item, $valor){

		$tabla = "productos";
		$respuesta = ModeloProductos::mdlListarProducto($tabla, $item, $valor);
		return $respuesta;
	
	}

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function ctrCrearProducto(){

		if(isset($_POST["nuevaDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoCodigo"])){

		   		/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   	$ruta = "views/img/productos/default/anonymous.png";

			   	if(isset($_FILES["nuevaImagen"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "views/img/productos/".$_POST["nuevoCodigo"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaImagen"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "productos";

				$datos = array("idCategoria" => $_POST["nuevaCategoria"],
							   "idUnidadVenta" => $_POST["nuevaMedidas"],
							   "idIva" => $_POST["nuevoImpuestos"],
							   "codigoProducto" => $_POST["nuevoCodigo"],
							   "codigoBarras" => $_POST["nuevoCodigoBarras"],
							   "descripcion" => $_POST["nuevaDescripcion"],
							   "imagen" => $ruta);

				$respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

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
									window.location = "productos";
									}
								})
					</script>';

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';
			}
		}

	}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/

	static public function ctrEditarProducto(){

		if(isset($_POST["editarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) &&
			preg_match('/^[0-9]+$/', $_POST["editarCodigo"])){

		   		/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   	$ruta = $_POST["imagenActual"];

			   	if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/productos/".$_POST["editarCodigo"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png"){

						unlink($_POST["imagenActual"]);

					}else{

						mkdir($directorio, 0755);	
					
					}
					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarImagen"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarImagen"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "productos";

				$datos = array("idProducto" => $_POST["idProducto"],
					           "idCategoria" => $_POST["editarCategoria"],
							   "idUnidadVenta" => $_POST["editarMedidas"],
							   "idIva" => $_POST["editarImpuestos"],
							   "codigoProducto" => $_POST["editarCodigo"],
							   "codigoBarras" => $_POST["editarCodigoBarras"],
							   "descripcion" => $_POST["editarDescripcion"],
							   "imagen" => $ruta);

				$respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

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
									window.location = "productos";
									}
								})
					</script>';
			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';
			}
		}

	}

	/*=============================================
	BORRAR PRODUCTO
	=============================================*/
	static public function ctrEliminarProducto(){

		if(isset($_GET["idProducto"])){

			$tabla ="productos";
			$datos = $_GET["idProducto"];

			if($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/anonymous.png"){

				unlink($_GET["imagen"]);
				rmdir('vistas/img/productos/'.$_GET["codigo"]);

			}

			$respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El producto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "productos";

								}
							})

				</script>';

			}		
		}


	}

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/

	static public function ctrMostrarSumaVentas(){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);

		return $respuesta;

	}


}