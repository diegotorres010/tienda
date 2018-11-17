<?php

require_once "../controllers/terceros.controller.php";
require_once "../models/terceros.model.php";

class AjaxTerceros{

	/*=============================================
	EDITAR TERCERO
	=============================================*/	

	public $idTercero;

	public function ajaxEditarTercero(){

		$item = "idTercero";
		$valor = $this->idTercero;

		$respuesta = ControladorTerceros::ctrMostrarTercero($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR TERCERO
=============================================*/	

if(isset($_POST["idTercero"])){

	$tercero = new AjaxTerceros();
	$tercero -> idTercero = $_POST["idTercero"];
	$tercero -> ajaxEditarTercero();

}