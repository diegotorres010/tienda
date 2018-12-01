<?php

require_once "../controllers/empleados.controller.php";
require_once "../models/empleados.model.php";

class AjaxEmpleados{

	/*=============================================
	EDITAR Proveedor
	=============================================*/	

	public $idUsuarioSistema;

	public function ajaxEditarEmpleado(){

		$item = "idUsuarioSistema";
		$valor = $this->idUsuarioSistema;

		$respuesta = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

		echo json_encode($respuesta);
	}

	public $activarUsuario;
	public $activarIdUsuario;

	public function ajaxActivarEmpleado(){

		$tabla = "usuariossistema";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "idUsuarioSistema";
		$valor2 = $this->activarIdUsuario;

		$respuesta = ModeloEmpleados::mdlActualizarEmpleado($tabla, $item1, $valor1, $item2, $valor2);
	}

	public $validarUsuario;

	public function ajaxValidarEmpleado(){

		$item = "nombreEmpleado";
		$valor = $this->validarUsuario;

		$respuesta = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

		echo json_encode($respuesta);

	}

}


if(isset($_POST["idUsuarioSistema"])){
	$terceros = new AjaxEmpleados();
	$terceros -> idUsuarioSistema = $_POST["idUsuarioSistema"];
	$terceros -> ajaxEditarEmpleado();
}

if(isset($_POST["activarUsuario"])){
	$activarUsuario = new AjaxEmpleados();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarIdUsuario = $_POST["activarIdUsuario"];
	$activarUsuario -> ajaxActivarEmpleado();
}

if(isset( $_POST["validarUsuario"])){

	$valUsuario = new AjaxEmpleados();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarEmpleado();

}