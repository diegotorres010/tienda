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
        echo $respuesta;
        // echo 'Prueba';
    }
}

if(isset($_POST["idEmpleado"])){
	$permiso = new AjaxPermisos();
    $permiso -> idEmpleado = $_POST["idEmpleado"];
    $permiso -> idPermiso = $_POST["idPermiso"];
	$permiso -> ajaxRegistrarPermisos();
}