<?php

class ControladorMedidas{

	/*=============================================
	CREAR IMPUESTOS
	=============================================*/

	static public function ctrCrearMedida(){

		if(isset($_POST["nuevaMedida"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaMedida"])){

				$tabla = "unidadesventa";

				$datos = $_POST["nuevaMedida"];

				$respuesta = ModeloMedidas::mdlIngresarMedida($tabla, $datos);

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
									window.location = "medidas";
									}
								})
					</script>';
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡La unidad de medida no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "medidas";
							}
						})
			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarMedida($item, $valor){

		$tabla = "unidadesventa";

		$respuesta = ModeloMedidas::mdlMostrarMedida($tabla, $item, $valor);

		return $respuesta;
	
	}

	static public function ctrListarMedida($item, $valor){

		$tabla = "unidadesventa";
		$respuesta = ModeloMedidas::mdlListarMedida($tabla, $item, $valor);
		return $respuesta;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarMedida(){

		if(isset($_POST["editarMedida"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ% ]+$/', $_POST["editarMedida"])){

				$tabla = "unidadesventa";

				$datos = $_POST["editarMedida"];
				$datos = array("descripcion"=>$_POST["editarMedida"],
							   "idUnidadVenta"=>$_POST["idUnidadVenta"]);

				$respuesta = ModeloMedidas::mdlEditarMedida($tabla, $datos);

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
									window.location = "medidas";
									}
								})
					</script>';

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La unidad de medida no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "medidas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	// static public function ctrBorrarMedida(){
					
	// 	if(isset($_GET["idUnidadVenta"])){

	// 		$tabla ="unidadesventa";
	// 		$datos = array("descripcion"=>$_GET["descripcion"],
	// 					   "idUnidadVenta"=>$_GET["idUnidadVenta"]);

	// 		$respuesta = ModeloMedidas::mdlBorrarMedida($tabla, $datos);

	// 		if($respuesta == "ok"){

	// 			echo'<script>

	// 				swal({
	// 					  type: "success",
	// 					  title: "La unidad de medida ha sido borrada correctamente",
	// 					  showConfirmButton: true,
	// 					  confirmButtonText: "Cerrar"
	// 					  }).then(function(result){
	// 								if (result.value) {

	// 								window.location = "medidas";

	// 								}
	// 							})

	// 				</script>';
	// 		}
	// 	}
		
	// }
}
