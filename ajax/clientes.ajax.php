<?php

require_once "../controllers/clientes.controller.php";
require_once "../models/clientes.model.php";

class AjaxClientes{

	public $idUsuario;

	public function ajaxEditarCliente(){

		$item = "idUsuario";
		$valor = $this->idUsuario;

		$respuesta = ControladorClientes::ctrMostrarCliente($item, $valor);

		echo json_encode($respuesta);
	}

	public $idUsuarioSel;

	public function ajaxEditarClienteSel(){

		$item = "idUsuario";
		$valor = $this->idUsuarioSel;

		$respuesta = ControladorClientes::ctrMostrarCliente($item, $valor);

		echo json_encode($respuesta);
	}

	public $activarUsuario;
	public $activarIdUsuario;

	public function ajaxActivarCliente(){

		$tabla = "usuarios";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "idUsuario";
		$valor2 = $this->activarIdUsuario;

		$respuesta = ModeloClientes::mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2);
	}

}

/*=============================================
EDITAR TERCERO
=============================================*/	

if(isset($_POST["idUsuario"])){
	$tercero = new AjaxClientes();
	$tercero -> idUsuario = $_POST["idUsuario"];
	$tercero -> ajaxEditarCliente();
}

if(isset($_POST["activarUsuario"])){
	$activarUsuario = new AjaxClientes();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarIdUsuario = $_POST["activarIdUsuario"];
	$activarUsuario -> ajaxActivarCliente();
}

if(isset($_POST["idUsuarioSel"])){
	$terceroSel = new AjaxClientes();
	$terceroSel -> idUsuarioSel = $_POST["idUsuarioSel"];
	$terceroSel -> ajaxEditarClienteSel();
}