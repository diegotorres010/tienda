<?php

require_once "../controllers/productos.controller.php";
require_once "../models/productos.model.php";

require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.model.php";

require_once "../controllers/medidas.controller.php";
require_once "../models/medidas.model.php";

require_once "../controllers/impuestos.controller.php";
require_once "../models/impuestos.model.php";


class TablaProductos{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

	public function mostrarTablaProductos(){

		$item = null;
    	$valor = null;
		$orden = "idProducto";

  		$productos = ControladorProductos::ctrListarProducto($item, $valor, $orden);	

  		if(count($productos) == 0){

  			echo '{"data": []}';

		  	return;
  		}
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($productos); $i++){

		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/ 

		  	$imagen = "<img src='".$productos[$i]["imagen"]."' width='40px'>";

		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/ 

		  	$item = "idCategoria";
		  	$valor = $productos[$i]["idCategoria"];

			$categorias = ControladorCategorias::ctrMostrarCategoria($item, $valor);
			  
			$item = "idUnidadVenta";
		  	$valor = $productos[$i]["idUnidadVenta"];

			$medidas = ControladorMedidas::ctrMostrarMedida($item, $valor);
			  
            $item = "idIva";
		  	$valor = $productos[$i]["idIva"];

		  	$impuestos = ControladorImpuestos::ctrMostrarImpuesto($item, $valor);

		  	/*=============================================
 	 		STOCK
  			=============================================*/ 

  			// if($productos[$i]["stock"] <= 10){

  			// 	$stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";

  			// }else if($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <= 15){

  			// 	$stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";

  			// }else{

  			// 	$stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";

  			// }

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

  			//if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Especial"){

				if ($productos[$i]["estado"] != 0) {
					$estados = "<td><button class='btn btn-success btn-xs btnActivarProducto' idProducto='".$productos[$i]["idProducto"]."' estado='0'>Activado</button></td>";
				  } else {
					$estados = "<td><button class='btn btn-danger btn-xs btnActivarProducto' idProducto='" . $productos[$i]["idProducto"] . "' estado='1'>Desactivado</button></td>";
				}

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["idProducto"]."' estado='".$productos[$i]["estado"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button></div>"; 

  			//}else{

  			//	 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["idProducto"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>"; 

  			//}

		 
		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$imagen.'",
				  "'.$productos[$i]["codigoProducto"].'",
				  "'.$productos[$i]["codigoBarras"].'",
			      "'.$productos[$i]["descripcion"].'",
				  "'.$categorias["descripcion"].'",
				  "'.$medidas["descripcion"].'",
				  "'.$impuestos["porcentaje"].' %",
				  "<td></td>",
				  "<td></td>",
				  "'.$estados.'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	}



}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();

