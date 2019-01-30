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

    static public function mdlListarEmpTerceros($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '3' ORDER BY estado DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

    public static function mdlListarEmpleados()
    {
        $stmt = Conexion::conectar()->prepare("SELECT usuarios.descripcion,
		usuarios.telefono,    
		usuariossistema.nombreEmpleado AS codigoEmpleado,
		usuariossistema.estado AS estado,
		usuariossistema.fecha_ultimo_ingreso AS ultimoIngreso,
		usuariossistema.foto AS avatar,
		usuariossistema.idUsuarioSistema 
		FROM usuarios
		INNER JOIN usuariossistema ON usuarios.idUsuario = usuariossistema.idUsuario ORDER BY estado DESC");
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
        try {
			$pdo = Conexion::conectar();
		
			$sql = 'CALL agregarUsuarioSistema(:nombreEmpleado,:contrasena,:foto,:idUsuario,:idTipo,@respuesta)';
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":nombreEmpleado", $datos["nombreEmpleado"], PDO::PARAM_STR);
			$stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
            $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
            $stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);
            $stmt->bindParam(":idTipo", $datos["idTipo"], PDO::PARAM_INT);
			
			$stmt->execute();
			$stmt->closeCursor();

			$row = $pdo->query("SELECT @respuesta AS respuesta")->fetch(PDO::FETCH_ASSOC);
			if ($row) {			
				return $row['respuesta'];
			}
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
        }
    }

    /*=============================================
    EDITAR EMPLEADO
    =============================================*/

    public static function mdlEditarEmpleado($tabla, $datos)
    {

        try {
			$pdo = Conexion::conectar();
		
			$sql = 'CALL actualizarUsuarioSistema(:idUsuarioSistema,:idTipo,:nombreEmpleado,:contrasena,:foto,@respuesta)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idUsuarioSistema", $datos["idUsuarioSistema"], PDO::PARAM_INT);
            $stmt->bindParam(":idTipo", $datos["idTipo"], PDO::PARAM_INT);
			$stmt->bindParam(":nombreEmpleado", $datos["nombreEmpleado"], PDO::PARAM_STR);
			$stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
            $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
			
			$stmt->execute();
			$stmt->closeCursor();

			$row = $pdo->query("SELECT @respuesta AS respuesta")->fetch(PDO::FETCH_ASSOC);
			if ($row) {			
				return $row['respuesta'];
			}
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
        }
        
        // $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE empleado = :empleado");

        // $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        // $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        // $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        // $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        // $stmt->bindParam(":empleado", $datos["empleado"], PDO::PARAM_STR);

        // if ($stmt->execute()) {

        //     return "ok";

        // } else {

        //     return "error";

        // }

        // $stmt->close();

        // $stmt = null;

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
}