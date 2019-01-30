<?php
require_once "../controllers/permisos.controller.php";
require_once "../models/permisos.model.php";

class AjaxPermisos{
    public $idEmpleado;
    public $idPermiso;

    public function ajaxRegistrarPermisos(){
        $empleado = $this->idEmpleado;
        $permiso = $this->idPermiso;
        
        $respuesta = ControladorPermisos::ctrRegistrarPermisos($empleado,$permiso);
        return $respuesta;
        // echo 'Prueba';
    }

    public $idTipo;

	public function ajaxTraerTipo(){

		$item = "idTipo";
		$valor = $this->idTipo;

        $respuesta = ControladorPermisos::ctrMostrarTipos($item, $valor);

		echo json_encode($respuesta);

    }
    
    // public $idTipo2;

	// public function ajaxLeerPermisos(){

	// 	$item = "idTipo2";
	// 	$valor = $this->idTipo2;

	// 	$respuesta = ControladorPermisos::ctrMostrarPermisos($item, $valor);

	// 	echo json_encode($respuesta);

	// }
}

if(isset($_POST["idEmpleado"])){
	$permiso = new AjaxPermisos();
    $permiso -> idEmpleado = $_POST["idEmpleado"];
    $permiso -> idPermiso = $_POST["idPermiso"];
	$permiso -> ajaxRegistrarPermisos();
}

if(isset($_POST["idTipo"])){
	$tipoP = new AjaxPermisos();
    $tipoP -> idTipo = $_POST["idTipo"];
	$tipoP -> ajaxTraerTipo();
}

// if(isset($_POST["idTipo2"])){
// 	$permisoP = new AjaxPermisos();
//     $permisoP -> idTipo = $_POST["idTipo"];
// 	$permisoP -> ajaxLeerPermisos();
// }