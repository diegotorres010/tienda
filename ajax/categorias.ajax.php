<?php

require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.model.php";

class AjaxCategorias{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idCategoria;

	public function ajaxEditarCategoria(){

		$item = "idCategoria";
		$valor = $this->idCategoria;

		$respuesta = ControladorCategorias::ctrMostrarCategoria($item, $valor);

		echo json_encode($respuesta);

	}

	public $activarCategoria;
	public $activarIdCategoria;

	public function ajaxActivarCategoria(){

		$tabla = "categorias";

		$item1 = "estado";
		$valor1 = $this->activarCategoria;

		$item2 = "idCategoria";
		$valor2 = $this->activarIdCategoria;

		$respuesta = ModeloCategorias::mdlActualizarCategoria($tabla, $item1, $valor1, $item2, $valor2);
	}

	public $validarCategoria;

	public function ajaxValidarCategoria(){

		$item = "descripcion";
		$valor = $this->validarCategoria;

		$respuesta = ControladorCategorias::ctrMostrarCategoria($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idCategoria"])){

	$categoria = new AjaxCategorias();
	$categoria -> idCategoria = $_POST["idCategoria"];
	$categoria -> ajaxEditarCategoria();
}

if(isset($_POST["activarCategoria"])){
	$activarCategoria = new AjaxCategorias();
	$activarCategoria -> activarCategoria = $_POST["activarCategoria"];
	$activarCategoria -> activarIdCategoria = $_POST["activarIdCategoria"];
	$activarCategoria -> ajaxActivarCategoria();

}

if(isset( $_POST["validarCategoria"])){
	$valCategoria = new AjaxCategorias();
	$valCategoria -> validarCategoria = $_POST["validarCategoria"];
	$valCategoria -> ajaxValidarCategoria();
}
