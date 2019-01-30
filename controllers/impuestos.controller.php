<?php

class ControladorImpuestos
{

    /*=============================================
    CREAR IMPUESTOS
    =============================================*/

    public static function ctrCrearImpuesto()
    {

        if (isset($_POST["nuevoImpuesto"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ% ]+$/', $_POST["nuevoImpuesto"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoPorcentaje"])) {

                $tabla = "iva";

                $datos = array("porcentaje" => $_POST["nuevoPorcentaje"],
                               "descripcion" => $_POST["nuevoImpuesto"]);

                $respuesta = ModeloImpuestos::mdlIngresarImpuesto($tabla, $datos);
                $respuestTmp = explode("|", $respuesta);

                if ($respuestTmp[0] == "1") {
                    $tipoAlerta = "error";
                } else {
                    $tipoAlerta = "success";
                }
                echo '<script>
					swal({
						  type: "' . $tipoAlerta . '",
						  title: "' . $respuestTmp[1] . '",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									window.location = "impuestos";
									}
								})
					</script>';
            } else {
                echo '<script>
					swal({
						  type: "error",
						  title: "¡El impuesto no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "impuestos";
							}
						})
			  	</script>';
            }
        }
    }

    /*=============================================
    MOSTRAR CATEGORIAS
    =============================================*/

    public static function ctrMostrarImpuesto($item, $valor)
    {

        $tabla = "iva";

        $respuesta = ModeloImpuestos::mdlMostrarImpuesto($tabla, $item, $valor);

        return $respuesta;

    }

    public static function ctrListarImpuesto($item, $valor)
    {

        $tabla = "iva";
        $respuesta = ModeloImpuestos::mdlListarImpuesto($tabla, $item, $valor);
        return $respuesta;

    }

    /*=============================================
    EDITAR CATEGORIA
    =============================================*/

    public static function ctrEditarImpuesto()
    {

        if (isset($_POST["editarImpuesto"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ% ]+$/', $_POST["editarImpuesto"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarPorcentaje"])) {

                $tabla = "iva";

                $datos = array("descripcion" => $_POST["editarImpuesto"],
                    "porcentaje" => $_POST["editarPorcentaje"],
                    "idIva" => $_POST["idIva"]);

                $respuesta = ModeloImpuestos::mdlEditarImpuesto($tabla, $datos);

                $respuestTmp = explode("|", $respuesta);

                if ($respuestTmp[0] == "1") {
                    $tipoAlerta = "error";
                } else {
                    $tipoAlerta = "success";
                }
                echo '<script>
					swal({
						  type: "' . $tipoAlerta . '",
						  title: "' . $respuestTmp[1] . '",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									window.location = "impuestos";
									}
								})
					</script>';

                // if($respuesta == "ok"){

                //     echo'<script>

                //     swal({
                //           type: "success",
                //           title: "El impuesto ha sido cambiado correctamente",
                //           showConfirmButton: true,
                //           confirmButtonText: "Cerrar"
                //           }).then(function(result){
                //                     if (result.value) {

                //                     window.location = "impuestos";

                //                     }
                //                 })

                //     </script>';

                // }

            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El impuesto no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "impuestos";

							}
						})

			  	</script>';

            }

        }

    }

    /*=============================================
    BORRAR CATEGORIA
    =============================================*/

    // static public function ctrBorrarImpuesto(){

    //     if(isset($_GET["idIva"])){

    //         $tabla ="iva";
    //         $datos = array("descripcion"=>$_GET["descripcion"],
    //                        "porcentaje"=>$_GET["porcentaje"],
    //                        "idIva"=>$_GET["idIva"]);

    //         $respuesta = ModeloImpuestos::mdlBorrarImpuesto($tabla, $datos);

    //         if($respuesta == "ok"){

    //             echo'<script>

    //                 swal({
    //                       type: "success",
    //                       title: "El impuesto ha sido borrado correctamente",
    //                       showConfirmButton: true,
    //                       confirmButtonText: "Cerrar"
    //                       }).then(function(result){
    //                                 if (result.value) {

    //                                 window.location = "impuestos";

    //                                 }
    //                             })

    //                 </script>';
    //         }
    //     }

    // }
}
