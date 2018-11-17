<?php

require_once "conexion.php";

class ModeloTerceros{

	/*=============================================
	CREAR TERCERO
	=============================================*/

	static public function mdlIngresarTercero($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipoDocumento, documento, nombre, telefono, email, direccion, fechaNacimiento, tipoTercero, genero) 
											   VALUES (:tipoDoc, :documentoId , :nombre, :telefono, :email, :direccion, :fechaNacimiento, :tipoTercero, :genero)");
		
		$stmt->bindParam(":tipoDoc", $datos["tipoDoc"], PDO::PARAM_STR);
		$stmt->bindParam(":documentoId", $datos["documentoId"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoTercero", $datos["tipoTercero"], PDO::PARAM_STR);
		$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR TERCEROS
	=============================================*/

	static public function mdlMostrarTercero($tabla, $item, $valor){

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

	/*=============================================
	EDITAR TERCERO
	=============================================*/

	static public function mdlEditarTercero($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipoDocumento = :tipoDocumento, documento = :documento, nombre = :nombre, telefono = :telefono, email = :email, direccion = :direccion, fechaNacimiento = :fechaNacimiento, tipoTercero = :tipoTercero, genero = :genero WHERE idTercero = :idTercero");

		$stmt->bindParam(":idTercero", $datos["idTercero"], PDO::PARAM_INT);
		$stmt->bindParam(":tipoDocumento", $datos["tipoDoc"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documentoId"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoTercero", $datos["tipoTercero"], PDO::PARAM_STR);
		$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);

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