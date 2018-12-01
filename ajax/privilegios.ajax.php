<?php
// echo 'Prueba';

require_once "../controllers/privilegios.controller.php";
require_once "../models/privilegios.model.php";

class AjaxPrivilegios
{
    public function ajaxMostrarPrivilegios()
    {
        $respuesta = ControladorPrivilegios::ctrMostrarPrivilegios();
        echo json_encode($respuesta);
    }
}


$privilegios = new AjaxPrivilegios();
$privilegios->ajaxMostrarPrivilegios();