<?php

require_once "conexion.php";

class ModeloClientes{

	static public function mdlCrearCliente($tabla, $datos){

		try {
			$pdo = Conexion::conectar();
		
			$sql = 'CALL agregarUsuario(:tipoUsuario,:tipoDocumento,:documento,:descripcion,:direccion,:email,:fechaNacimiento,:telefono,:genero, @respuesta)';
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":tipoUsuario", $datos["tipoUsuario"], PDO::PARAM_STR);
			$stmt->bindParam(":tipoDocumento", $datos["tipoDocumento"], PDO::PARAM_STR);
			$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
			$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
			$stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);
			$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
			
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

	static public function mdlIngresarCliente($tabla, $datos, $tienda){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipoDocumento, documento, descripcion, direccion, email, fechaNacimiento, telefono, genero, tipoUsuario, idTienda) 
											   VALUES (:tipoDocumento, :documento , :nombre, :direccion, :email, :fechaNacimiento, :telefono, :genero, :tipoUsuario, :idTienda)");
		
		$stmt->bindParam(":tipoDocumento", $datos["tipoDocumento"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoUsuario", $datos["tipoUsuario"], PDO::PARAM_STR);
		$stmt->bindParam(":idTienda", $tienda["idTienda"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	static public function mdlMostrarCliente($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlListarCliente($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '1' ORDER BY estado DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	public static function mdlSelectCliente($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT descripcion AS nombre, documento AS numeroDoc,
		                                              idUsuario AS idUsuario FROM $tabla WHERE estado = '1'");
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
        $stmt = null;
    }

	static public function mdlValidarCliente($tabla, $item1, $item2, $valor1, $valor2){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1 AND $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}


	static public function mdlEditarCliente($tabla, $datos){

		try {
			$pdo = Conexion::conectar();
		
			$sql = 'CALL actualizarUsuario(:idUsuario,:tipoUsuario,:tipoDocumento,:documento,:descripcion,:direccion,:email,:fechaNacimiento,:telefono,:genero, @respuesta)';
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);
			$stmt->bindParam(":tipoUsuario", $datos["tipoUsuario"], PDO::PARAM_STR);
			$stmt->bindParam(":tipoDocumento", $datos["tipoDocumento"], PDO::PARAM_STR);
			$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
			$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
			$stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);
			$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
			
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


	public static function mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2)
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