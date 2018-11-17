<?php

require_once "conexion.php";

class ModeloEmpleados
{

    public static function mdlMostrarEmpleados($tabla, $item, $valor)
    {

        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

    public static function mdlListarEmpleados()
    {
        $stmt = Conexion::conectar()->prepare("SELECT terceros.nombre,
		terceros.telefono,    
		empleados.cod_empleado AS codigoEmpleado,
		empleados.estado AS estadoEmpleado,
		empleados.fecha_ultimo_ingreso AS ultimoIngreso,
		empleados.foto AS avatar,
		empleados.id_empleado 
		FROM terceros
		INNER JOIN empleados ON terceros.id_tercero = empleados.id_tercero");
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    REGISTRO DE EMPLEADO
    =============================================*/

    public static function mdlIngresarEmpleado($tabla, $datos)
    {
		$stmt2 = Conexion::conectar()->prepare("SELECT id_tercero FROM terceros WHERE 1 ORDER BY id_tercero DESC LIMIT 1");
        $stmt2->execute();
		
	//	return $stmt2->fetchAll();

		return $stmt2->fetchAll();
			
        /*$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cod_empleado, password, foto) VALUES (:nombre, :password, :foto)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		
        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }*/

        $stmt2->close();

        $stmt2 = null;

    }

    /*=============================================
    EDITAR EMPLEADO
    =============================================*/

    public static function mdlEditarEmpleado($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE empleado = :empleado");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":empleado", $datos["empleado"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    ACTUALIZAR EMPLEADO
    =============================================*/

    public static function mdlActualizarEmpleado($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    BORRAR USUARIO
    =============================================*/

    public static function mdlBorrarUsuario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

}
