<?php

class ControladorPrivilegios{
    static public function ctrMostrarPrivilegios(){
        $tabla = "privilegios";
        $respuesta = ModeloPrivilegios::MdlMostrarPrivilegios($tabla);
        return $respuesta;
    }
}