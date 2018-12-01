<?php

require_once "../controllers/productos.controller.php";
require_once "../models/productos.model.php";


class TablaProductosVentas{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

	public function mostrarTablaProductosVentas(){

		$item = "estado";
    	$valor = null;
    	$orden = "idProducto";

  		$productos = ControladorProductos::ctrMostrarProductoDispo($item, $valor, $orden);
 		
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

		  	//$imagen = "<img src='".$productos[$i]["imagen"]."' width='40px'>";

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

		  	$botones =  "<div class='btn-group'><button class='btn btn-primary agregarProducto recuperarBoton' idProducto='".$productos[$i]["idProducto"]."'>Agregar</button></div>"; 

		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$productos[$i]["codigoProducto"].'",
				  "'.$productos[$i]["codigoBarras"].'",
				  "'.$productos[$i]["descripcion"].'",
				  "<td></td>",
				  "<td></td>",
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
$activarProductosVentas = new TablaProductosVentas();
$activarProductosVentas -> mostrarTablaProductosVentas();

