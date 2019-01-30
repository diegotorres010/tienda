<?php

class ControladorPermisos
{
    static public function ctrRegistrarPermisos($empleado,$permiso)
    {
        $tabla = "permisousuarios";
        $idEmpleado = $empleado;
        $idPermiso = $permiso;

        $respuesta = ModeloPermisos::mdlRegistrarPermisos($tabla, $idEmpleado, $idPermiso);
        
        if ($respuesta) {
            return '0|Permiso ingresado correctamente';
        }else{
            return '-1|Error';
        }

    }

    static public function ctrMostrarTipos($item, $valor){

		$tabla = "tipopermisos";

		$respuesta = ModeloPermisos::mdlMostrarTipos($tabla, $item, $valor);

		return $respuesta;
	
    }

    static public function ctrMostrarPermisos($item, $valor){

		$tabla = "permisousuarios";

		$respuesta = ModeloPermisos::mdlMostrarPermisos($tabla, $item, $valor);

		return $respuesta;
	
    }
    
    static public function ctrListarPermiso($item, $valor){

		$tabla = "tipopermisos";
		$respuesta = ModeloPermisos::mdlListarPermiso($tabla, $item, $valor);
		return $respuesta;
	
	}
}
