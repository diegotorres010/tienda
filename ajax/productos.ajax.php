<?php

require_once "../controllers/productos.controller.php";
require_once "../models/productos.model.php";

require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.model.php";

class AjaxProductos{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCategoria;

  public function ajaxCrearCodigoProducto(){

  	$item = "idCategoria";
  	$valor = $this->idCategoria;
    $orden = "idProducto";

  	$respuesta = ControladorProductos::ctrMostrarProducto($item, $valor, $orden);

  	echo json_encode($respuesta);

  }


  public $activarProducto;
	public $activarIdProducto;

	public function ajaxActivarProducto(){

		$tabla = "productos";

		$item1 = "estado";
		$valor1 = $this->activarProducto;

		$item2 = "idProducto";
		$valor2 = $this->activarIdProducto;

		$respuesta = ModeloProductos::mdlActualizarProductoEstado($tabla, $item1, $valor1, $item2, $valor2);
  }
  
  public $validarProducto;
	public $campo;

	public function ajaxValidarProducto(){

		$item = $this->campo;
    $valor = $this->validarProducto;
    $orden = "idProducto";

		$respuesta = ControladorProductos::ctrMostrarProducto($item, $valor, $orden);

		echo json_encode($respuesta);

	}


  /*=============================================
  EDITAR PRODUCTO
  =============================================*/ 

  public $idProducto;
  public $traerProductos;
  public $nombreProducto;

  public function ajaxEditarProducto(){

    if($this->traerProductos == "ok"){

      $item = null;
      $valor = null;
      $orden = "idProducto";

      $respuesta = ControladorProductos::ctrMostrarProducto($item, $valor, $orden);

      echo json_encode($respuesta);


    }else if($this->nombreProducto != ""){

      $item = "descripcion";
      $valor = $this->nombreProducto;
      $orden = "idProducto";

      $respuesta = ControladorProductos::ctrMostrarProducto($item, $valor, $orden);

      echo json_encode($respuesta);

    }else{

      $item = "idProducto";
      $valor = $this->idProducto;
      $orden = "idProducto";

      $respuesta = ControladorProductos::ctrMostrarProducto($item, $valor, $orden);

      echo json_encode($respuesta);

    }

  }

}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/	

if(isset($_POST["idCategoria"])){

	$codigoProducto = new AjaxProductos();
	$codigoProducto -> idCategoria = $_POST["idCategoria"];
	$codigoProducto -> ajaxCrearCodigoProducto();

}
/*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idProducto"])){

  $editarProducto = new AjaxProductos();
  $editarProducto -> idProducto = $_POST["idProducto"];
  $editarProducto -> ajaxEditarProducto();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["traerProductos"])){

  $traerProductos = new AjaxProductos();
  $traerProductos -> traerProductos = $_POST["traerProductos"];
  $traerProductos -> ajaxEditarProducto();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["nombreProducto"])){

  $traerProductos = new AjaxProductos();
  $traerProductos -> nombreProducto = $_POST["nombreProducto"];
  $traerProductos -> ajaxEditarProducto();

}

if(isset($_POST["activarProducto"])){
	$activarProducto = new AjaxProductos();
	$activarProducto -> activarProducto = $_POST["activarProducto"];
	$activarProducto -> activarIdProducto = $_POST["activarIdProducto"];
	$activarProducto -> ajaxActivarProducto();
}

if(isset( $_POST["validarProducto"])){
	$valProducto = new AjaxProductos();
	$valProducto -> validarProducto = $_POST["validarProducto"];
	$valProducto -> campo = $_POST["campo"];
	$valProducto -> ajaxValidarProducto();
}
