<?php

require_once "conexion.php";

class ModeloProductos{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarProducto($tabla, $item, $valor, $orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY idProducto DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarProductoDispo($tabla, $item, $valor, $orden){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '1' ORDER BY $orden");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}


	static public function mdlListarProducto($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY estado DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}


	public static function mdlActualizarProductoEstado($tabla, $item1, $valor1, $item2, $valor2)
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
	REGISTRO DE PRODUCTO
	=============================================*/
	static public function mdlIngresarProducto($tabla, $datos){

		try {
			$pdo = Conexion::conectar();
		
			$sql = 'CALL agregarProducto(:idCategoria,:idUnidadVenta,:codigoProducto,:descripcion,:codigoBarras,:idIva,:imagen,@respuesta)';
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":idCategoria", $datos["idCategoria"], PDO::PARAM_STR);
			$stmt->bindParam(":idUnidadVenta", $datos["idUnidadVenta"], PDO::PARAM_STR);
			$stmt->bindParam(":codigoProducto", $datos["codigoProducto"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":codigoBarras", $datos["codigoBarras"], PDO::PARAM_STR);
			$stmt->bindParam(":idIva", $datos["idIva"], PDO::PARAM_STR);
			$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
			$stmt->execute();
			$stmt->closeCursor();

			$row = $pdo->query("SELECT @respuesta AS respuesta")->fetch(PDO::FETCH_ASSOC);
			if ($row) {			
				return $row['respuesta'];
			}
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
		}

		// $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idCategoria, idUnidadVenta, idIva, codigoProducto, codigoBarras, descripcion, imagen) 
		//                                        VALUES (:idCategoria, :idUnidadVenta, :idIva, :codigoProducto, :codigoBarras, :descripcion, :imagen)");

		// $stmt->bindParam(":idCategoria", $datos["idCategoria"], PDO::PARAM_INT);
		// $stmt->bindParam(":idUnidadVenta", $datos["idUnidadVenta"], PDO::PARAM_INT);
		// $stmt->bindParam(":idIva", $datos["idIva"], PDO::PARAM_INT);
		// $stmt->bindParam(":codigoProducto", $datos["codigoProducto"], PDO::PARAM_STR);
		// $stmt->bindParam(":codigoBarras", $datos["codigoBarras"], PDO::PARAM_STR);
		// $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		// $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);

		// if($stmt->execute()){

		// 	return "ok";

		// }else{

		// 	return "error";
		
		// }

		// $stmt->close();
		// $stmt = null;

	}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/
	static public function mdlEditarProducto($tabla, $datos){

		try {
			$pdo = Conexion::conectar();
		
			$sql = 'CALL actualizarProducto(:idProducto,:idCategoria,:idUnidadVenta,:codigoProducto,:descripcion,:codigoBarras,:idIva,:imagen,@respuesta)';
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":idProducto", $datos["idProducto"], PDO::PARAM_INT);
			$stmt->bindParam(":idCategoria", $datos["idCategoria"], PDO::PARAM_INT);
			$stmt->bindParam(":idUnidadVenta", $datos["idUnidadVenta"], PDO::PARAM_INT);
			$stmt->bindParam(":codigoProducto", $datos["codigoProducto"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":codigoBarras", $datos["codigoBarras"], PDO::PARAM_STR);
			$stmt->bindParam(":idIva", $datos["idIva"], PDO::PARAM_STR);
			$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
			$stmt->execute();
			$stmt->closeCursor();

			$row = $pdo->query("SELECT @respuesta AS respuesta")->fetch(PDO::FETCH_ASSOC);
			if ($row) {			
				return $row['respuesta'];
			}
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
		}

		// $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria = :id_categoria, descripcion = :descripcion, imagen = :imagen, stock = :stock, precio_compra = :precio_compra, precio_venta = :precio_venta WHERE codigo = :codigo");

		// $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
		// $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		// $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		// $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		// $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		// $stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
		// $stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);

		// if($stmt->execute()){

		// 	return "ok";

		// }else{

		// 	return "error";
		
		// }

		// $stmt->close();
		// $stmt = null;

	}

	/*=============================================
	BORRAR PRODUCTO
	=============================================*/

	static public function mdlEliminarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR PRODUCTO
	=============================================*/

	static public function mdlActualizarProducto($tabla, $item1, $valor1, $valor){

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

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/	

	static public function mdlMostrarSumaVentas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}


}