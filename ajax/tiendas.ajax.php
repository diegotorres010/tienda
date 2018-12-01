<?php

require_once "../controllers/tiendas.controller.php";
require_once "../models/tiendas.model.php";

class AjaxTiendas{

	public $idTienda;

	public function ajaxEditarTienda(){

		$item = "idTienda";
		$valor = $this->idTienda;

		$respuesta = ControladorTiendas::ctrMostrarTienda($item, $valor);

		echo json_encode($respuesta);

	}
}

if(isset($_POST["idTienda"])){

	$tienda = new AjaxTiendas();
	$tienda -> idTienda = $_POST["idTienda"];
	$tienda -> ajaxEditarTienda();
}
