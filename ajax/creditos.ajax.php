<?php

require_once "../controllers/creditos.controller.php";
require_once "../models/creditos.model.php";

class AjaxCreditos{

	public $idCredito;

	public function ajaxEditarCredito(){

		$item = "idCredito";
		$valor = $this->idCredito;

		$respuesta = ControladorCreditos::ctrMostrarCredito($item, $valor);

		echo json_encode($respuesta);

	}
}

if(isset($_POST["idCredito"])){

	$credito = new AjaxCreditos();
	$credito -> idCredito = $_POST["idCredito"];
	$credito -> ajaxEditarCredito();
}
