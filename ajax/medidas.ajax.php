<?php

require_once "../controllers/medidas.controller.php";
require_once "../models/medidas.model.php";

class AjaxMedidas{	

	public $idUnidadVenta;

	public function ajaxEditarMedida(){

		$item = "idUnidadVenta";
		$valor = $this->idUnidadVenta;
		
		$respuesta = ControladorMedidas::ctrMostrarMedida($item, $valor);
		
		echo json_encode($respuesta);

	}

	public $activarMedida;
	public $activarIdMedida;

	public function ajaxActivarMedida(){

		$tabla = "unidadesventa";

		$item1 = "estado";
		$valor1 = $this->activarMedida;

		$item2 = "idUnidadVenta";
		$valor2 = $this->activarIdMedida;

		$respuesta = ModeloMedidas::mdlActualizarMedida($tabla, $item1, $valor1, $item2, $valor2);
	}

	public $validarMedida;

	public function ajaxValidarMedida(){

		$item = "descripcion";
		$valor = $this->validarMedida;

		$respuesta = ControladorMedidas::ctrMostrarMedida($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR TERCERO
=============================================*/	

if(isset($_POST["idUnidadVenta"])){

	$medida = new AjaxMedidas();
	$medida -> idUnidadVenta = $_POST["idUnidadVenta"];
	$medida -> ajaxEditarMedida();

}

if(isset($_POST["activarMedida"])){
	$activarMedida = new AjaxMedidas();
	$activarMedida -> activarMedida = $_POST["activarMedida"];
	$activarMedida -> activarIdMedida = $_POST["activarIdMedida"];
	$activarMedida -> ajaxActivarMedida();
}

if(isset( $_POST["validarMedida"])){
	$valMedida = new AjaxMedidas();
	$valMedida -> validarMedida = $_POST["validarMedida"];
	$valMedida -> ajaxValidarMedida();
}