<?php

class ControladorCreditos{

	static public function ctrIngresarCredito(){

		if(isset($_POST["nuevoCredito"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoCredito"])){

				$tabla = "credito";

				$datos = array("idUsuario"=>$_POST["nuevoClienteCre"],
					   		   "valorMaximo"=>$_POST["nuevoCredito"],
							   "diasPlazo"=>$_POST["nuevoDiasPlazo"]);

				$respuesta = ModeloCreditos::mdlIngresarCredito($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El crédito ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "creditos";

									}
								})

					</script>';

				}else{
					echo'<script>

					swal({
						  type: "error",
						  title: "Error el crédito no ha sido guardado",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "creditos";

									}
								})

					</script>';
				}
			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El crédito no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "creditos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarCredito($item, $valor){

		$tabla = "credito";

		$respuesta = ModeloCreditos::mdlMostrarCredito($tabla, $item, $valor);

		return $respuesta;
	
	}

	static public function ctrListarCredito(){

		$tabla = "credito";
		$respuesta = ModeloCreditos::mdlListarCredito($tabla);
		return $respuesta;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarCredito(){

		if(isset($_POST["editarCredito"])){

			if(preg_match('/^[0-9]+$/', $_POST["editarCredito"])){

				$tabla = "credito";

				$datos = array("idCredito"=>$_POST["idCredito"],
					   		   "valorMaximo"=>$_POST["editarCredito"],
							   "diasPlazo"=>$_POST["editarDiasPlazo"]);

				var_dump($datos);

				$respuesta = ModeloCreditos::mdlEditarCredito($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El crédito ha sido actualizado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "creditos";

									}
								})

					</script>';

				}else{
					echo'<script>

					swal({
						  type: "error",
						  title: "Error el crédito no ha sido actualizado",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "creditos";

									}
								})

					</script>';
				}
			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El crédito no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "credito";

							}
						})

			  	</script>';

			}

		}

	}

}
