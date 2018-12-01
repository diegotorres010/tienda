<?php

require_once "conexion.php";

class ModeloImpuestos{

	static public function mdlIngresarImpuesto($tabla, $datos){

		try {
			$porcentaje = $datos['porcentaje']; 
			$descripcion = $datos['descripcion'];

			$pdo = Conexion::conectar();
		
			$sql = 'CALL agregarIva(:porcentaje,:descripcion,@respuesta)';
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":porcentaje",$porcentaje,PDO::PARAM_STR);
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
	}


	//SELECT * FROM $tabla WHERE estado = 1

	/*=============================================
	MOSTRAR IMPUESTOS
	=============================================*/

	static public function mdlMostrarImpuesto($tabla, $item, $valor){

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

	static public function mdlListarImpuesto($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY estado DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarImpuesto($tabla, $datos){

		try {

			$idIva = $datos['idIva']; 
			$porcentaje = $datos['porcentaje']; 
			$descripcion = $datos['descripcion'];
	
			$pdo = Conexion::conectar();
			
			$sql = 'CALL actualizarIva(:idIva,:descripcion,:porcentaje,@respuesta)';
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":idIva",$idIva,PDO::PARAM_INT);
			$stmt->bindParam(":descripcion",$descripcion,PDO::PARAM_STR);
			$stmt->bindParam(":porcentaje",$porcentaje,PDO::PARAM_STR);
			$stmt->execute();
			$stmt->closeCursor();
	
			$row = $pdo->query("SELECT @respuesta AS respuesta")->fetch(PDO::FETCH_ASSOC);
			if ($row) {			
				return $row['respuesta'];
			}
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
		}



			// $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion, porcentaje = :porcentaje WHERE idIva = :idIva");

			// $stmt -> bindParam(":porcentaje", $datos["porcentaje"], PDO::PARAM_STR);
			// $stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			// $stmt -> bindParam(":idIva", $datos["idIva"], PDO::PARAM_INT);

			// if($stmt->execute()){

			// 	return "ok";

			// }else{

			// 	return "error";
			
			// }

			// $stmt->close();
			// $stmt = null;

	}


	public static function mdlActualizarImpuesto($tabla, $item1, $valor1, $item2, $valor2)
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

	// static public function mdlBorrarImpuesto($tabla, $datos){

	// 	$estado = 0;
	// 	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion, porcentaje = :porcentaje, estado = :estado WHERE idIva = :idIva");

	// 	$stmt -> bindParam(":porcentaje", $datos["porcentaje"], PDO::PARAM_STR);
	// 	$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
	// 	$stmt -> bindParam(":estado", $estado, PDO::PARAM_STR);
	// 	$stmt -> bindParam(":idIva", $datos["idIva"], PDO::PARAM_INT);

	// 	if($stmt->execute()){

	// 		return "ok";

	// 	}else{

	// 		return "error";
		
	// 	}

	// 	$stmt->close();
	// 	$stmt = null;

	// }

}

