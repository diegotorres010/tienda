<?php

require_once "../controllers/empleados.controller.php";
require_once "../models/empleados.model.php";

class AjaxEmpleados{

	/*=============================================
	EDITAR EMPLEADOS
	=============================================*/	

	public $idEmpleado;

	public function ajaxEditarEmpleado(){

		$item = "id";
		$valor = $this->idEmpleado;

		$respuesta = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR EMPLEADOS
	=============================================*/	

	public $activarEmpleado;
	public $activarId;


	public function ajaxActivarEmpleado(){

		$tabla = "empleados";

		$item1 = "estado";
		$valor1 = $this->activarEmpleado;

		$item2 = "id_empleado";
		$valor2 = $this->activarId;

		$respuesta = ModeloEmpleados::mdlActualizarEmpleado($tabla, $item1, $valor1, $item2, $valor2);
		echo $respuesta;
	}

	/*=============================================
	VALIDAR NO REPETIR EMPLEADOS
	=============================================*/	

	public $validarEmpleado;

	public function ajaxValidarEmpleado(){

		$item = "empleado";
		$valor = $this->validarEmpleado;

		$respuesta = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR EMPLEADOS
=============================================*/
if(isset($_POST["idEmpleado"])){	
	$editar = new AjaxEmpleados();
	$editar -> idEmpleado = $_POST["idEmpleado"];
	$editar -> ajaxEditarEmpleado();

}

/*=============================================
ACTIVAR EMPLEADO
=============================================*/	

if(isset($_POST["activarEmpleado"])){
	$activarEmpleado = new AjaxEmpleados();
	$activarEmpleado -> activarEmpleado = $_POST["activarEmpleado"];
	$activarEmpleado -> activarId = $_POST["activarId"];
	$activarEmpleado -> ajaxActivarEmpleado();

}

/*=============================================
VALIDAR NO REPETIR EMPLEADO
=============================================*/

if(isset( $_POST["validarEmpleado"])){

	$valEmpleado = new AjaxEmpleados();
	$valEmpleado -> validarEmpleado = $_POST["validarEmpleado"];
	$valEmpleado -> ajaxValidarEmpleado();

}