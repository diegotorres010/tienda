<?php

require_once "conexion.php";

class ModeloMedidas{

	static public function mdlIngresarMedida($tabla, $datos){
		
		try {
			$pdo = Conexion::conectar();
		
			$sql = 'CALL agregarMedida(:descripcion,@respuesta)';
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
	MOSTRAR IMPUESTOS
	=============================================*/

	static public function mdlMostrarMedida($tabla, $item, $valor){

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


	static public function mdlListarMedida($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY estado DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarMedida($tabla, $datos){

		try {

			$idUnidadVenta = $datos['idUnidadVenta'];  
			$descripcion = $datos['descripcion'];
	
			$pdo = Conexion::conectar();
			
			$sql = 'CALL actualizarMedida(:idUnidadVenta,:descripcion,@respuesta)';
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":idUnidadVenta",$idUnidadVenta,PDO::PARAM_INT);
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

		// $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion WHERE idUnidadVenta = :idUnidadVenta");

		// $stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		// $stmt -> bindParam(":idUnidadVenta", $datos["idUnidadVenta"], PDO::PARAM_INT);

		// if($stmt->execute()){

		// 	return "ok";

		// }else{

		// 	return "error";
		
		// }

		// $stmt->close();
		// $stmt = null;

	}


	public static function mdlActualizarMedida($tabla, $item1, $valor1, $item2, $valor2)
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
	BORRAR CATEGORIA
	=============================================*/

	// static public function mdlBorrarMedida($tabla, $datos){

	// 	$estado = 0;
	// 	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion, estado = :estado WHERE idUnidadVenta = :idUnidadVenta");

	// 	$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
	// 	$stmt -> bindParam(":estado", $estado, PDO::PARAM_STR);
	// 	$stmt -> bindParam(":idUnidadVenta", $datos["idUnidadVenta"], PDO::PARAM_INT);

	// 	if($stmt->execute()){

	// 		return "ok";

	// 	}else{

	// 		return "error";
		
	// 	}

	// 	$stmt->close();
	// 	$stmt = null;

	// }

}

