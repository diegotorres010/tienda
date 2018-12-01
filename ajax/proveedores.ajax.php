<?php

require_once "../controllers/proveedores.controller.php";
require_once "../models/proveedores.model.php";

class AjaxProveedores{

	/*=============================================
	EDITAR Proveedor
	=============================================*/	

	public $idUsuario;

	public function ajaxEditarProveedor(){

		$item = "idUsuario";
		$valor = $this->idUsuario;

		$respuesta = ControladorProveedores::ctrMostrarProveedor($item, $valor);

		echo json_encode($respuesta);
	}

	public $activarUsuario;
	public $activarIdUsuario;

	public function ajaxActivarProveedor(){

		$tabla = "usuarios";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "idUsuario";
		$valor2 = $this->activarIdUsuario;

		$respuesta = ModeloProveedores::mdlActualizarProveedor($tabla, $item1, $valor1, $item2, $valor2);
	}

}


if(isset($_POST["idUsuario"])){
	$tercero = new AjaxProveedores();
	$tercero -> idUsuario = $_POST["idUsuario"];
	$tercero -> ajaxEditarProveedor();
}

if(isset($_POST["activarUsuario"])){
	$activarUsuario = new AjaxProveedores();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarIdUsuario = $_POST["activarIdUsuario"];
	$activarUsuario -> ajaxActivarProveedor();
}