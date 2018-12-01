<?php

require_once "../controllers/impuestos.controller.php";
require_once "../models/impuestos.model.php";

class AjaxImpuestos{

	/*=============================================
	EDITAR TERCERO
	=============================================*/	

	public $idIva;

	public function ajaxEditarImpuesto(){

		$item = "idIva";
		$valor = $this->idIva;
		$respuesta = ControladorImpuestos::ctrMostrarImpuesto($item, $valor);
		
		echo json_encode($respuesta);

	}

	public $activarImpuesto;
	public $activarIdIva;

	public function ajaxActivarImpuesto(){

		$tabla = "iva";

		$item1 = "estado";
		$valor1 = $this->activarImpuesto;

		$item2 = "idIva";
		$valor2 = $this->activarIdIva;

		$respuesta = ModeloImpuestos::mdlActualizarImpuesto($tabla, $item1, $valor1, $item2, $valor2);
	}

	public $validarImpuesto;
	public $campo;

	public function ajaxValidarImpuesto(){

		// $item = "descripcion";
		$item = $this->campo;
		$valor = $this->validarImpuesto;

		$respuesta = ControladorImpuestos::ctrMostrarImpuesto($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR TERCERO
=============================================*/	

if(isset($_POST["idIva"])){
	$impuesto = new AjaxImpuestos();
	$impuesto -> idIva = $_POST["idIva"];
	$impuesto -> ajaxEditarImpuesto();
}

/*=============================================
ACTIVAR EMPLEADO
=============================================*/	

if(isset($_POST["activarImpuesto"])){
	$activarImpuesto = new AjaxImpuestos();
	$activarImpuesto -> activarImpuesto = $_POST["activarImpuesto"];
	$activarImpuesto -> activarIdIva = $_POST["activarIdIva"];
	$activarImpuesto -> ajaxActivarImpuesto();

}

if(isset( $_POST["validarImpuesto"])){
	$valImpuesto = new AjaxImpuestos();
	$valImpuesto -> validarImpuesto = $_POST["validarImpuesto"];
	$valImpuesto -> campo = $_POST["campo"];
	$valImpuesto -> ajaxValidarImpuesto();
}