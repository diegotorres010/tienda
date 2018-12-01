<?php

class ControladorPermisos
{
    static public function ctrRegistrarPermisos($empleado,$permiso)
    {
        $tabla = "permisousuarios";
        $idEmpleado = $empleado;
        $idPermiso = $permiso;

        $respuesta = ModeloPermisos::mdlRegistrarPermisos($tabla, $idEmpleado, $idPermiso);
        
        return '0|Permiso ingresado correctamente';
        if ($respuesta) {
            return '0|Permiso ingresado correctamente';
        }else{
            return '-1|Error';
        }

    }
}
