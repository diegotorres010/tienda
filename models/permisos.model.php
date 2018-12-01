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
}
