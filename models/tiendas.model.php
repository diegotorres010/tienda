<?php

require_once "conexion.php";

class ModeloTiendas{

	/*=============================================
	CREAR TERCERO
	=============================================*/

	static public function mdlIngresarTienda($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreTienda, direccion, telefono, propietario, email) 
											   VALUES (:nombreTienda, :direccion , :telefono, :propietario, :email)");
		
		$stmt->bindParam(":nombreTienda", $datos["nombreTienda"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":propietario", $datos["propietario"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR TIENDAS
	=============================================*/

	static public function mdlMostrarTienda($tabla, $item, $valor){

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

	static public function mdlTraerTienda($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER by $item DESC LIMIT 1");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR TERCERO
	=============================================*/

	static public function mdlEditarTienda($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreTienda = :nombreTienda, direccion = :direccion, telefono = :telefono, email = :email, propietario = :propietario WHERE idTienda = :idTienda");

		echo"hola3";
		echo $datos["telefono"];
		$stmt->bindParam(":idTienda", $datos["idTienda"], PDO::PARAM_INT);
		$stmt->bindParam(":nombreTienda", $datos["nombreTienda"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":propietario", $datos["propietario"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR TERCERO
	=============================================*/

	static public function mdlEliminarTercero($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idTercero = :idTercero");

		$stmt -> bindParam(":idTercero", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR CLIENTE
	=============================================*/

	static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}