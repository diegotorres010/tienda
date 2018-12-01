<?php

require_once "conexion.php";

class ModeloCreditos{

	static public function mdlIngresarCredito($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idUsuario,valorMaximo,diasPlazo) VALUES (:idUsuario,:valorMaximo,:diasPlazo)");

		$stmt->bindParam(":idUsuario",$datos['idUsuario'],PDO::PARAM_INT);
		$stmt->bindParam(":valorMaximo",$datos['valorMaximo'],PDO::PARAM_STR);
		$stmt->bindParam(":diasPlazo",$datos['diasPlazo'],PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	static public function mdlMostrarCredito($tabla, $item, $valor){

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


	static public function mdlListarCredito($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT usuarios.descripcion,
		                                              usuarios.telefono,
													  $tabla.valorMaximo,
													  $tabla.diasPlazo,
													  $tabla.idCredito 
		                                       FROM usuarios INNER JOIN $tabla ON usuarios.idUsuario = $tabla.idUsuario");
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
		$stmt = null;
		////

		// $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY estado DESC");

		// $stmt -> execute();

		// return $stmt -> fetchAll();

		// $stmt -> close();

		// $stmt = null;

	}


	public static function mdlActualizarCredito($tabla, $item1, $valor1, $item2, $valor2)
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


	static public function mdlEditarCredito($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET valorMaximo = :valorMaximo, diasPlazo = :diasPlazo WHERE idCredito = :idCredito");

		$stmt->bindParam(":idCredito",$datos['idCredito'],PDO::PARAM_INT);
		$stmt->bindParam(":valorMaximo",$datos['valorMaximo'],PDO::PARAM_STR);
		$stmt->bindParam(":diasPlazo",$datos['diasPlazo'],PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

		// try {

		// 	$idCategoria = $datos['idCategoria'];  
		// 	$descripcion = $datos['descripcion'];
	
		// 	$pdo = Conexion::conectar();
			
		// 	$sql = 'CALL actualizarCategoria(:idCategoria,:descripcion,@respuesta)';
		// 	$stmt = $pdo->prepare($sql);
		// 	$stmt->bindParam(":idCategoria",$idCategoria,PDO::PARAM_INT);
		// 	$stmt->bindParam(":descripcion",$descripcion,PDO::PARAM_STR);
		// 	$stmt->execute();
		// 	$stmt->closeCursor();
	
		// 	$row = $pdo->query("SELECT @respuesta AS respuesta")->fetch(PDO::FETCH_ASSOC);
		// 	if ($row) {			
		// 		return $row['respuesta'];
		// 	}
		// } catch (PDOException $e) {
		// 	die("Error occurred:" . $e->getMessage());
		// }

	}

}

