<?php

require_once "conexion.php";

class ModeloPermisos
{
    public static function mdlRegistrarPermisos($tabla, $idEmpleado, $idPermiso)
    {
        try {
            $pdo = Conexion::conectar();
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idUsuarioSistema, idPrivilegio, fechaAsignacion)
                                               VALUES (:idUsuario, :privilegio , NOW())");

            $stmt->bindParam(":idUsuario", $idEmpleado, PDO::PARAM_STR);
            $stmt->bindParam(":privilegio", $idPermiso, PDO::PARAM_STR);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }

            $stmt->close();
            $stmt = null;
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }
    }

    static public function mdlMostrarTipos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }

    static public function mdlMostrarPermisos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }
    
    static public function mdlListarPermiso($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idTipo");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}
}
