<?php

require_once "conexion.php";

class ModeloCategorias{

	static public function mdlIngresarCategoria($tabla, $datos){

		try {
			$pdo = Conexion::conectar();
		
			$sql = 'CALL agregarCategoria(:descripcion,@respuesta)';
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":descripcion",$datos,PDO::PARAM_STR);
			$stmt->execute();
			$stmt->closeCursor();

			$row = $pdo->query("SELECT @respuesta AS respuesta")->fetch(PDO::FETCH_ASSOC);
			if ($row) {			
    	        return $row['respuesta'];
			}
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
		}

		// $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion) VALUES (:descripcion)");

		// $stmt->bindParam(":descripcion", $datos, PDO::PARAM_STR);

		// if($stmt->execute()){
		// 	return "ok";
		// }else{
		// 	return "error";
		// }

		// $stmt->close();
		// $stmt = null;
	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarCategoria($tabla, $item, $valor){

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


	static public function mdlListarCategoria($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY estado DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}


	public static function mdlActualizarCategoria($tabla, $item1, $valor1, $item2, $valor2)
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
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarCategoria($tabla, $datos){

		try {

			$idCategoria = $datos['idCategoria'];  
			$descripcion = $datos['descripcion'];
	
			$pdo = Conexion::conectar();
			
			$sql = 'CALL actualizarCategoria(:idCategoria,:descripcion,@respuesta)';
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":idCategoria",$idCategoria,PDO::PARAM_INT);
			$stmt->bindParam(":descripcion",$descripcion,PDO::PARAM_STR);
			$stmt->execute();
			$stmt->closeCursor();
	
			$row = $pdo->query("SELECT @respuesta AS respuesta")->fetch(PDO::FETCH_ASSOC);
			if ($row) {			
				return $row['respuesta'];
			}
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
		}

		// $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion WHERE idCategoria = :idCategoria");

		// $stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		// $stmt -> bindParam(":idCategoria", $datos["idCategoria"], PDO::PARAM_INT);

		// if($stmt->execute()){

		// 	return "ok";

		// }else{

		// 	return "error";
		
		// }

		// $stmt->close();
		// $stmt = null;

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	// static public function mdlBorrarCategoria($tabla, $datos){

	// 	$estado = 0;
	// 	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion, estado = :estado WHERE idCategoria = :idCategoria");

	// 	$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
	// 	$stmt -> bindParam(":estado", $estado, PDO::PARAM_STR);
	// 	$stmt -> bindParam(":idCategoria", $datos["idCategoria"], PDO::PARAM_INT);

	// 	if($stmt->execute()){

	// 		return "ok";

	// 	}else{

	// 		return "error";
		
	// 	}

	// 	$stmt->close();
	// 	$stmt = null;

	// }

}

