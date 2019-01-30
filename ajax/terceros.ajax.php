<?php

require_once "../controllers/terceros.controller.php";
require_once "../models/terceros.model.php";

class AjaxTerceros{

	/*=============================================
	EDITAR TERCERO
	=============================================*/	

	public $idUsuario;

	public function ajaxEditarTercero(){

		$item = "idUsuario";
		$valor = $this->idUsuario;

		$respuesta = ControladorTerceros::ctrMostrarTercero($item, $valor);

		echo json_encode($respuesta);
	}

	public function ajaxMostrarTercero(){
		$respuesta = ControladorTerceros::ctrMostrarTercero(null,null);
		echo json_encode($respuesta);
	}

	public $activarUsuario;
	public $activarIdUsuario;

	public function ajaxActivarTercero(){

		$tabla = "usuarios";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "idUsuario";
		$valor2 = $this->activarIdUsuario;

		$respuesta = ModeloTerceros::mdlActualizarTercero($tabla, $item1, $valor1, $item2, $valor2);
	}

	public $validarDocTercero;
	public $campoT;

	public $validarTipoTercero;
	public $campoTer;

	public function ajaxValidarTercero(){

		$tabla = "usuarios";
		$item1 = $this->campoT;
		$item2 = $this->campoTer;
		$valor1 = $this->validarDocTercero;
		$valor2 = $this->validarTipoTercero;

		$respuesta = ModeloTerceros::mdlValidarTercero($tabla, $item1, $item2, $valor1, $valor2);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR TERCERO
=============================================*/	

if(isset($_POST["mostrarTerceros"])){
	$tercero = new AjaxTerceros();	
	$tercero -> ajaxMostrarTercero();
}

if(isset($_POST["idUsuario"])){
	$tercero = new AjaxTerceros();
	$tercero -> idUsuario = $_POST["idUsuario"];
	$tercero -> ajaxEditarTercero();
}

if(isset($_POST["activarUsuario"])){
	$activarUsuario = new AjaxTerceros();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarIdUsuario = $_POST["activarIdUsuario"];
	$activarUsuario -> ajaxActivarTercero();
}

if(isset( $_POST["validarDocTercero"]) &&
   isset( $_POST["validarTipoTercero"])){
	$valTercero = new AjaxTerceros();
	$valTercero -> validarDocTercero = $_POST["validarDocTercero"];
	$valTercero -> validarTipoTercero = $_POST["validarTipoTercero"];
	$valTercero -> campoT = $_POST["campoT"];
	$valTercero -> campoTer = $_POST["campoTer"];
	$valTercero -> ajaxValidarTercero();
}