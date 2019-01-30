-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2019 a las 00:48:09
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarCategoria` (IN `ID_CAT` INT(11), IN `DESCRIP` VARCHAR(60), OUT `respuesta` VARCHAR(100))  BEGIN

DECLARE CONSULTA INT unsigned DEFAULT 0;

SELECT COUNT(idCategoria) INTO CONSULTA FROM categorias WHERE idCategoria != ID_CAT AND descripcion = DESCRIP;

IF (CONSULTA > 0) THEN
	SET respuesta = "1|La descripcion ya existe";
ELSE 
    UPDATE categorias SET descripcion = DESCRIP WHERE IdCategoria = ID_CAT;
    	
    SET respuesta = "0|Actualizado correctamente";
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarContrasena` (IN `updatePassword` VARCHAR(255), IN `doc` VARCHAR(15))  UPDATE usuariossistema
SET contrasena = updatePassword
WHERE idUsuario = (SELECT idUsuario FROM usuarios WHERE documento = doc)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarIva` (IN `ID_IVA` TINYINT(4), IN `DESCRIP` VARCHAR(60), IN `PORCT` VARCHAR(15), OUT `respuesta` VARCHAR(100))  BEGIN

DECLARE CONSULTA INT unsigned DEFAULT 0;

SELECT COUNT(idIva) INTO CONSULTA FROM iva WHERE idIva != ID_IVA AND descripcion = DESCRIP;

IF (CONSULTA > 0) THEN
	SET respuesta = "1|La descripcion ya existe";
ELSE 
	SELECT COUNT(idIva) INTO CONSULTA FROM iva WHERE idIva != ID_IVA AND porcentaje = PORCT;
    IF (CONSULTA > 0) THEN
		SET respuesta = "1|El porcentaje ya existe";
    ELSE
    	UPDATE iva SET descripcion = DESCRIP, porcentaje = PORCT WHERE idIva = ID_IVA;
    	
        SET respuesta = "0|Actualizado correctamente";
    END IF;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarMarca` (IN `ID_MARCA` INT, IN `NUEVADESCRIPCION` VARCHAR(60))  UPDATE marcas set descripcion = LCASE(NUEVADESCRIPCION) WHERE idMarca = ID_MARCA$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarMedida` (IN `ID_VEN` INT(11), IN `DESCRIP` VARCHAR(60), OUT `respuesta` VARCHAR(100))  BEGIN

DECLARE CONSULTA INT unsigned DEFAULT 0;

SELECT COUNT(idUnidadVenta) INTO CONSULTA FROM unidadesventa WHERE idUnidadVenta != ID_VEN AND descripcion = DESCRIP;

IF (CONSULTA > 0) THEN
	SET respuesta = "1|La descripcion ya existe";
ELSE 
    UPDATE unidadesventa SET descripcion = DESCRIP WHERE idUnidadVenta = ID_VEN;
    	
    SET respuesta = "0|Actualizado correctamente";
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarProducto` (IN `ID_PROD` INT(11), IN `ID_CAT` INT(11), IN `ID_VENT` INT(11), IN `COD_PROD` VARCHAR(20), IN `DESCRIP` VARCHAR(60), IN `COD_BAR` VARCHAR(20), IN `ID_IVA` TINYINT(4), IN `IMAG` VARCHAR(200), OUT `respuesta` VARCHAR(100))  BEGIN

DECLARE CONSULTA INT unsigned DEFAULT 0;

SELECT COUNT(idProducto) INTO CONSULTA FROM productos WHERE idProducto != ID_PROD AND codigoProducto = COD_PROD;

IF (CONSULTA > 0) THEN
    SET respuesta = "1|El código del producto ya existe";
ELSE
	SELECT COUNT(idProducto) INTO CONSULTA FROM productos WHERE idProducto != ID_PROD AND codigoBarras = COD_BAR;
    IF (CONSULTA > 0) THEN
        SET respuesta = "1|El código de barras del producto ya existe";
	ELSE
    	UPDATE productos SET IdCategoria = ID_CAT, idUnidadVenta = ID_VENT, codigoProducto = COD_PROD, descripcion = DESCRIP, codigoBarras = COD_BAR, idIva = ID_IVA, imagen = IMAG WHERE idProducto = ID_PROD;
    	
        SET respuesta = "0|Producto actualizado correctamente";
    END IF;	
END IF;

END$$

CREATE DEFINER=`javier`@`%` PROCEDURE `actualizarUnidad` (IN `ID_UNIDAD` INT, IN `DESCRIP` VARCHAR(15))  UPDATE unidadesventa
SET unidadesventa.descripcion = DESCRIP
WHERE unidadesventa.idUnidadVenta = ID_UNIDAD$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarUsuario` (IN `ID_USU` TINYINT(4), IN `TIPOUSUARIO` TINYINT(4), IN `TIPODOC` TINYINT(4), IN `DOCUM` VARCHAR(15), IN `DESCRIPC` VARCHAR(60), IN `DIRECC` VARCHAR(60), IN `EMAI` VARCHAR(60), IN `FECNAC` DATE, IN `TELEF` VARCHAR(20), IN `GENER` TINYINT(4), OUT `respuesta` VARCHAR(100))  BEGIN

DECLARE CONSULTA INT unsigned DEFAULT 0;

SELECT COUNT(idUsuario) INTO CONSULTA FROM usuarios WHERE idUsuario != ID_USU AND usuarios.tipoDocumento = TIPODOC AND usuarios.documento = DOCUM;

IF (CONSULTA > 0) THEN
	SET respuesta = '1|Ya existe un usuario con el mismo número y tipo de documento';
ELSE
    UPDATE usuarios SET tipoUsuario = TIPOUSUARIO, tipoDocumento = TIPODOC, documento = DOCUM, descripcion = DESCRIPC, direccion = DIRECC, email = EMAI,fechaNacimiento = FECNAC,telefono = TELEF, genero = GENER WHERE idUsuario = ID_USU;
    	
	SET respuesta = "0|Usuario actualizado correctamente";
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarUsuarioSistema` (IN `IDUSUSI` INT(11), IN `IDTIP` INT(11), IN `NOMB` VARCHAR(60), IN `PASS` VARCHAR(255), IN `PICT` VARCHAR(200), OUT `respuesta` VARCHAR(100))  BEGIN

DECLARE CONSULTA INT unsigned DEFAULT 0;

SELECT COUNT(idUsuarioSistema) INTO CONSULTA FROM usuariossistema WHERE idUsuarioSistema != IDUSUSI AND nombreEmpleado = NOMB;

IF (CONSULTA > 0) THEN
    SET respuesta = "1|El nombre de usuario ya existe";
ELSE
	UPDATE usuariossistema SET nombreEmpleado = NOMB, idTipo = IDTIP, contrasena = PASS, foto = PICT WHERE idUsuarioSistema = IDUSUSI;
    	
	SET respuesta = "0|Actualizado correctamente";	
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarCategoria` (IN `DESCRIP` VARCHAR(60), OUT `respuesta` VARCHAR(100))  BEGIN

DECLARE CONSULTA INT unsigned DEFAULT 0;

SELECT COUNT(idCategoria) INTO CONSULTA FROM categorias WHERE descripcion = DESCRIP;

IF (CONSULTA > 0) THEN
    SET respuesta = "1|La descripción ya existe";
ELSE
    INSERT INTO categorias VALUES(NULL,DESCRIP,1);
    	
    SET respuesta = "0|Ingresado correctamente";
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarIva` (IN `DESCRIP` VARCHAR(60), IN `PORCE` VARCHAR(15), OUT `respuesta` VARCHAR(100))  BEGIN

DECLARE CONSULTA INT unsigned DEFAULT 0;

SELECT COUNT(idIva) INTO CONSULTA FROM iva WHERE porcentaje = LCASE(PORCE);

IF (CONSULTA > 0) THEN
    SET respuesta = "1|El porcentaje ya existe";
ELSE
	SELECT COUNT(idIva) INTO CONSULTA FROM iva WHERE descripcion = LCASE(DESCRIP);
    IF (CONSULTA > 0) THEN
        SET respuesta = "1|La descripcion ya existe";
	ELSE
    	INSERT INTO iva VALUES(NULL,DESCRIP,PORCE,1);
    	
        SET respuesta = "0|Ingresado correctamente";
    END IF;	
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarMarca` (IN `NOMBRE_MARCA` VARCHAR(60))  BEGIN

DECLARE CONSULTA INT unsigned DEFAULT 0;

SELECT COUNT(idMarca) INTO CONSULTA FROM marcas WHERE descripcion = LCASE(NOMBRE_MARCA);

IF(CONSULTA > 0) THEN
	SELECT '1|Ya existe' AS respuesta;
ELSE  
	INSERT INTO marcas(descripcion) VALUES (LCASE(NOMBRE_MARCA));
    SELECT '0|Marca ingresada correctamente' AS respuesta;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarMedida` (IN `DESCRIP` VARCHAR(60), OUT `respuesta` VARCHAR(100))  BEGIN

DECLARE CONSULTA INT unsigned DEFAULT 0;

SELECT COUNT(idUnidadVenta) INTO CONSULTA FROM unidadesventa WHERE descripcion = DESCRIP;

IF (CONSULTA > 0) THEN
    SET respuesta = "1|La descripción ya existe";
ELSE
    INSERT INTO unidadesventa VALUES(NULL,DESCRIP,1);
    	
    SET respuesta = "0|Ingresado correctamente";
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarProducto` (IN `ID_CAT` INT(11), IN `ID_VENT` INT(11), IN `COD_PROD` VARCHAR(20), IN `DESCRIP` VARCHAR(60), IN `COD_BAR` VARCHAR(20), IN `ID_IVA` TINYINT(4), IN `IMAG` VARCHAR(200), OUT `respuesta` VARCHAR(100))  BEGIN

DECLARE CONSULTA INT unsigned DEFAULT 0;

SELECT COUNT(idProducto) INTO CONSULTA FROM productos WHERE codigoProducto = COD_PROD;

IF (CONSULTA > 0) THEN
    SET respuesta = "1|El código del producto ya existe";
ELSE
	SELECT COUNT(idProducto) INTO CONSULTA FROM productos WHERE codigoBarras = COD_BAR;
    IF (CONSULTA > 0) THEN
        SET respuesta = "1|El código de barras del producto ya existe";
	ELSE
    	INSERT INTO productos(IdCategoria, idUnidadVenta, codigoProducto, descripcion, codigoBarras, idIva, imagen, estado) VALUES(ID_CAT,ID_VENT,COD_PROD,DESCRIP,COD_BAR,ID_IVA,IMAG,1);
    	
        SET respuesta = "0|Ingresado correctamente";
    END IF;	
END IF;

END$$

CREATE DEFINER=`javier`@`%` PROCEDURE `agregarUnidad` (IN `DESCRIP` VARCHAR(15))  INSERT INTO unidadesventa(unidadesventa.descripcion) VALUES(DESCRIP)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarUsuario` (IN `TIPOUSUARIO` TINYINT(4), IN `TIPODOC` TINYINT(4), IN `DOCUM` VARCHAR(15), IN `DESCRIPC` VARCHAR(60), IN `DIRECC` VARCHAR(60), IN `EMAI` VARCHAR(60), IN `FECNAC` DATE, IN `TELEF` VARCHAR(20), IN `GENER` TINYINT(4), OUT `respuesta` VARCHAR(100))  BEGIN

DECLARE AUX INT unsigned DEFAULT 0;
DECLARE AUX2 INT unsigned DEFAULT 0;

SELECT COUNT(idUsuario) INTO AUX2 FROM usuarios WHERE usuarios.tipoDocumento = TIPODOC AND usuarios.documento = DOCUM;

IF(AUX2 > 0) THEN
	SET respuesta = '1|Ya existe un usuario con el mismo número y tipo de documento';
ELSE
	INSERT INTO usuarios(tipoUsuario,tipoDocumento,documento,descripcion,direccion,email,fechaNacimiento,telefono,genero,idTienda,estado) VALUES (TIPOUSUARIO,TIPODOC,DOCUM,DESCRIPC,DIRECC,EMAI,FECNAC,TELEF,GENER,'1','1');

SET respuesta = '0|Usuario creado exitosamente';

END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarUsuarioSistema` (IN `NOMB` VARCHAR(60), IN `PASS` VARCHAR(255), IN `PICT` VARCHAR(200), IN `IDUSU` INT(11), IN `IDTIPO` INT(11), OUT `respuesta` VARCHAR(100))  BEGIN

DECLARE CONSULTA INT unsigned DEFAULT 0;

SELECT COUNT(idUsuarioSistema) INTO CONSULTA FROM usuariossistema WHERE nombreEmpleado = NOMB;

IF (CONSULTA > 0) THEN
    SET respuesta = "1|El nombre de usuario ya existe";
ELSE
    INSERT INTO usuariossistema(nombreEmpleado,contrasena,foto,idUsuario,idTipo) VALUES(NOMB,PASS,PICT,IDUSU,IDTIPO);
    	
	SET respuesta = "0|Ingresado correctamente";	
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarCategorias` (IN `NOMBRE_CATEGORIA` VARCHAR(60))  BEGIN

DECLARE CONSULTA INT unsigned DEFAULT 0;
DECLARE CONSULTA2 INT unsigned DEFAULT 0;

IF(NOMBRE_CATEGORIA = '*') THEN

	SELECT temp2.idCategoria,
    temp2.descripcion,
    temp.descripcion AS 'Pertenece a'
	FROM categorias AS temp2
	INNER JOIN categorias 
    AS temp ON temp2.idPertenece = temp.idCategoria;
    
ELSE
SELECT COUNT(idCategoria) INTO CONSULTA2 FROM categorias WHERE descripcion = LCASE(NOMBRE_CATEGORIA);

IF(CONSULTA2 = 1) THEN

SELECT idCategoria INTO CONSULTA FROM categorias WHERE descripcion = LCASE(NOMBRE_CATEGORIA);

SELECT temp2.idCategoria,temp2.descripcion,temp.descripcion 
AS 'Pertenece a' FROM categorias AS temp2 INNER JOIN categorias 
AS temp ON temp2.idPertenece = temp.idCategoria WHERE temp2.descripcion = LCASE(NOMBRE_CATEGORIA);

SELECT idCategoria,descripcion FROM categorias WHERE idPertenece = CONSULTA;

ELSE
	SELECT "1|No existe la categoria";
END IF;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarMarcas` (IN `NOMBRE_MARCA` VARCHAR(60))  BEGIN

IF(NOMBRE_MARCA = '*') THEN
	SELECT * FROM marcas WHERE 1;
ELSE  
	SELECT * FROM marcas WHERE descripcion = LCASE(NOMBRE_MARCA);
END IF;

END$$

CREATE DEFINER=`javier`@`%` PROCEDURE `consultarProductoItemFactura` (IN `ID_PRODUCTO` INT)  SELECT productos.*, productos.codigoProducto, stockproductos.precio 
FROM productos INNER JOIN stockproductos 
ON productos.idProducto = stockproductos.idProducto 
AND stockproductos.estado = 1 
AND productos.idProducto = ID_PRODUCTO$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearFacturaEntrada` (IN `IDPROVEEDOR` INT, IN `IDSISTEMA` INT, IN `IDASESOR` INT, IN `TIPO` TINYINT, IN `TOTAL` FLOAT, IN `OBSERVACIONESIN` TEXT, IN `METODOPAGO` INT, IN `TIPODEPAGO` TINYINT, IN `PLAZOPAGO` DATE)  BEGIN

DECLARE CONSULTA INT unsigned DEFAULT 0;

IF(TIPODEPAGO = '2') THEN
	INSERT INTO facturasentrada 	  VALUE(NULL,IDPROVEEDOR,IDSISTEMA,IDASESOR,TIPO,TOTAL,OBSERVACIONESIN,2,NOW(),METODOPAGO,TIPODEPAGO);
    
    SELECT MAX(idFactura) INTO CONSULTA FROM facturasentrada;
    INSERT INTO plazospagoentradas VALUES (NULL,CONSULTA,PLAZOPAGO);
ELSE

	INSERT INTO facturasentrada 	  VALUE(NULL,IDPROVEEDOR,IDSISTEMA,IDASESOR,TIPO,TOTAL,OBSERVACIONESIN,1,NOW(),METODOPAGO,TIPODEPAGO);

END IF;

SELECT '0|Factura ingresada correctamente' AS respuesta;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearFacturaSalida` (IN `IDCLIENTE` INT(12), IN `IDSISTEMA` INT, IN `IDASESOR` INT, IN `IDMETODOPAGO` TINYINT, IN `IDPREFIJO` INT, IN `TOTAL` FLOAT, IN `OBSERVACIONES` TEXT, IN `TIPOPAGO` TINYINT, IN `PLAZOPAGO` DATE)  BEGIN

DECLARE CONSULTA INT unsigned DEFAULT 0;

IF(TIPOPAGO = '2') THEN

	INSERT INTO facturassalida VALUES (NULL,IDCLIENTE,IDSISTEMA,IDASESOR,TIPOPAGO,IDMETODOPAGO,IDPREFIJO,NOW(),TOTAL,OBSERVACIONES,2);

	SELECT MAX(idFactura) INTO CONSULTA FROM facturassalida;
    INSERT INTO plazospagosalidas VALUES (NULL,CONSULTA,PLAZOPAGO);
ELSE

	INSERT INTO facturassalida VALUES (NULL,IDCLIENTE,IDSISTEMA,IDASESOR,TIPOPAGO,IDMETODOPAGO,IDPREFIJO,NOW(),TOTAL,OBSERVACIONES,1);

END IF;

SELECT '0|Factura ingresada correctamente' AS respuesta;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `movimientoEntrada` (IN `PRODUCTO` INT, IN `CANTIDAD` INT, IN `VALOR` FLOAT, IN `RENTABI` INT, IN `DESCU` FLOAT)  BEGIN

DECLARE FACTURA INT unsigned DEFAULT 0;
DECLARE PORCIVA INT unsigned DEFAULT 0;
DECLARE CANTACTUAL INT unsigned DEFAULT 0;
DECLARE CANTNUEVA INT unsigned DEFAULT 0;

SELECT MAX(idFactura) INTO FACTURA FROM facturasentrada;
SELECT iva INTO PORCIVA FROM productos WHERE idProducto = 1;
SELECT cantidadStock INTO CANTACTUAL FROM stockproductos WHERE idProducto = PRODUCTO AND estado = 1; 

SELECT CANTACTUAL + CANTIDAD INTO CANTNUEVA;

INSERT INTO movimientosentrada VALUES(NULL,FACTURA,1,PRODUCTO,CANTIDAD,VALOR,PORCIVA,RENTABI,DESCU,NOW());

UPDATE stockproductos 
SET estado = 0
WHERE idProducto = PRODUCTO AND estado = 1;

INSERT INTO stockproductos VALUES(NULL,FACTURA,PRODUCTO,CANTNUEVA,NOW(),1,1,VALOR,RENTABI);

SELECT "0|Entrada ingresada correctamente";

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `movimientoSalida` (IN `FACTURA` INT, IN `PRODUCTO` INT, IN `CANTIDAD` INT, IN `PRECIO` FLOAT, IN `DESCUENTO` FLOAT)  BEGIN

DECLARE STOCK INT unsigned DEFAULT 0;
DECLARE IVAARTC INT unsigned DEFAULT 0;
DECLARE IDSTOCK INT unsigned DEFAULT 0;
DECLARE NUEVACANTIDAD INT unsigned DEFAULT 0;
DECLARE RENTABILIDADES INT unsigned DEFAULT 0;
DECLARE NUEVOPRECIO INT unsigned DEFAULT 0;

SELECT cantidadStock INTO STOCK
FROM stockproductos 
WHERE idProducto = PRODUCTO and estado = 1;

IF(STOCK < CANTIDAD) THEN
	SELECT "1|Cantidad insuficiente" AS Respuesta;
ELSE

	SELECT STOCK - CANTIDAD INTO NUEVACANTIDAD;
    SELECT PRECIO / CANTIDAD INTO NUEVOPRECIO;

	SELECT iva INTO IVAARTC
	FROM productos 
	WHERE idProducto = PRODUCTO;

	SELECT idStockProducto INTO IDSTOCK
	FROM stockproductos 
	WHERE idProducto = PRODUCTO and estado = 1;
	
	SELECT rentabilidad INTO RENTABILIDADES
	FROM stockproductos
	WHERE idProducto = PRODUCTO and estado = 1;

    UPDATE stockproductos 
    SET estado = 0
    WHERE idStockProducto = IDSTOCK;
	
	INSERT INTO movimientosalidas VALUES(NULL,FACTURA,1,PRODUCTO,CANTIDAD,PRECIO,IVAARTC,RENTABILIDADES,DESCUENTO,NOW());
    
    INSERT INTO stockproductos 
    VALUES (NULL,FACTURA,PRODUCTO,NUEVACANTIDAD,NOW(),2,1,NUEVOPRECIO,RENTABILIDADES);
    
    
    SELECT "0|Movimiento ingresado correctamente" AS Respuesta;
END IF;


END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonosentrada`
--

CREATE TABLE `abonosentrada` (
  `idComprobanteEgreso` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `idUsuarioSistena` int(11) NOT NULL,
  `valor` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonossalida`
--

CREATE TABLE `abonossalida` (
  `idComprobanteIngreso` int(11) NOT NULL,
  `idFactura` int(11) DEFAULT NULL,
  `idUsuarioSistena` int(11) DEFAULT NULL,
  `idUsuarioAsesor` int(11) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `descripcion` varchar(60) COLLATE utf8_bin NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0- Inactivo 1- Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `descripcion`, `estado`) VALUES
(1, 'BEBIDAS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturasentrada`
--

CREATE TABLE `facturasentrada` (
  `idFactura` int(11) NOT NULL,
  `idUsuarioProveedor` int(11) NOT NULL,
  `idUsuarioSistema` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `tipoEntrada` tinyint(4) NOT NULL COMMENT '1- Compras 2- Devolución',
  `valorTotal` float NOT NULL,
  `tipoPago` tinyint(4) NOT NULL COMMENT '1- Contado 2- Crédito',
  `observaciones` text COLLATE utf8_bin NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(4) NOT NULL COMMENT '1- Cancelada / Pagada 2- Pendiente por pagar 3- Anulada 4- Editada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturassalida`
--

CREATE TABLE `facturassalida` (
  `idFactura` int(11) NOT NULL,
  `idUsuarioCliente` int(11) NOT NULL,
  `isUsuarioSistema` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `valorTotal` float NOT NULL,
  `tipoPago` tinyint(4) NOT NULL COMMENT '1-Contado 2- Crédito',
  `Observaciones` text COLLATE utf8_bin NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(4) NOT NULL COMMENT '1- Cancelada / Pagada 2 - Pendiente por pagar 3- Anulada 4- Editada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE `iva` (
  `idIva` tinyint(4) NOT NULL,
  `descripcion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `porcentaje` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0- Inactivo 1- Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`idIva`, `descripcion`, `porcentaje`, `estado`) VALUES
(1, 'Excepto de IVA', '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientosalidas`
--

CREATE TABLE `movimientosalidas` (
  `idMovimientoProducto` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idIva` tinyint(11) NOT NULL,
  `tipoMovimiento` tinyint(4) NOT NULL COMMENT '1- Venta',
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `rentabilidad` int(11) NOT NULL,
  `descuento` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientosentrada`
--

CREATE TABLE `movimientosentrada` (
  `idMovimientoProducto` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idIva` tinyint(4) NOT NULL,
  `tipoMovimiento` tinyint(4) NOT NULL COMMENT '1- Compras 2- Devolución',
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `rentabilidad` int(11) NOT NULL,
  `descuento` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisousuarios`
--

CREATE TABLE `permisousuarios` (
  `idPermisoUsuario` int(11) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `idPrivilegio` int(11) NOT NULL,
  `fechaAsignacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `permisousuarios`
--

INSERT INTO `permisousuarios` (`idPermisoUsuario`, `idTipo`, `idPrivilegio`, `fechaAsignacion`) VALUES
(1, 1, 1, '2019-01-20 02:33:10'),
(2, 1, 2, '2019-01-20 02:33:10'),
(3, 1, 3, '2019-01-20 02:33:10'),
(4, 1, 4, '2019-01-20 02:33:10'),
(5, 1, 5, '2019-01-20 02:33:10'),
(6, 1, 6, '2019-01-20 02:33:10'),
(7, 1, 7, '2019-01-20 02:33:10'),
(8, 1, 8, '2019-01-20 02:33:10'),
(9, 1, 9, '2019-01-20 02:33:10'),
(10, 1, 10, '2019-01-20 02:33:10'),
(11, 1, 11, '2019-01-20 02:33:10'),
(12, 1, 12, '2019-01-20 02:33:10'),
(13, 1, 13, '2019-01-20 02:33:10'),
(14, 1, 14, '2019-01-20 02:33:10'),
(15, 1, 15, '2019-01-20 02:33:10'),
(16, 1, 16, '2019-01-20 02:33:10'),
(17, 1, 17, '2019-01-20 02:33:10'),
(18, 1, 18, '2019-01-20 02:33:10'),
(19, 1, 19, '2019-01-20 02:33:10'),
(20, 1, 20, '2019-01-20 02:33:10'),
(21, 1, 21, '2019-01-20 02:33:10'),
(22, 1, 22, '2019-01-20 02:33:10'),
(23, 1, 23, '2019-01-20 02:33:10'),
(24, 1, 24, '2019-01-20 02:33:10'),
(25, 1, 25, '2019-01-20 02:33:10'),
(26, 1, 26, '2019-01-20 02:33:10'),
(27, 1, 27, '2019-01-20 02:33:10'),
(28, 1, 28, '2019-01-20 02:33:10'),
(29, 1, 29, '2019-01-20 02:33:10'),
(30, 1, 30, '2019-01-20 02:33:10'),
(31, 1, 31, '2019-01-20 02:33:10'),
(32, 1, 32, '2019-01-20 02:33:10'),
(33, 1, 33, '2019-01-20 02:33:10'),
(34, 1, 34, '2019-01-20 02:33:10'),
(35, 1, 35, '2019-01-20 02:33:10'),
(36, 1, 36, '2019-01-20 02:33:10'),
(37, 1, 37, '2019-01-20 02:33:10'),
(38, 1, 38, '2019-01-20 02:33:10'),
(39, 1, 39, '2019-01-20 02:33:10'),
(40, 1, 40, '2019-01-20 02:33:10'),
(41, 1, 41, '2019-01-20 02:33:10'),
(42, 1, 42, '2019-01-20 02:33:10'),
(43, 1, 43, '2019-01-20 02:33:10'),
(44, 1, 44, '2019-01-20 02:33:10'),
(45, 1, 45, '2019-01-20 02:33:10'),
(46, 1, 46, '2019-01-20 02:33:10'),
(47, 1, 47, '2019-01-20 02:33:10'),
(48, 1, 48, '2019-01-20 02:33:10'),
(49, 1, 49, '2019-01-20 02:33:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plazospagoentradas`
--

CREATE TABLE `plazospagoentradas` (
  `idPlazoPago` tinyint(4) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plazospagosalidas`
--

CREATE TABLE `plazospagosalidas` (
  `idPlazoPago` tinyint(4) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `idPrivilegio` int(11) NOT NULL,
  `detallePrivilegio` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`idPrivilegio`, `detallePrivilegio`) VALUES
(1, 'Inicio'),
(2, 'Contactos'),
(3, 'Proveedores'),
(4, 'Agregar proveedores'),
(5, 'Activar proveedores'),
(6, 'Editar proveedores'),
(7, 'Clientes'),
(8, 'Agregar clientes'),
(9, 'Activar clientes'),
(10, 'Editar clientes'),
(11, 'Terceros'),
(12, 'Agregar terceros'),
(13, 'Activar terceros'),
(14, 'Editar terceros'),
(15, 'Categorias'),
(16, 'Agregar categorias'),
(17, 'Activar categorias'),
(18, 'Editar categorias'),
(19, 'Productos'),
(20, 'Agregar productos'),
(21, 'Activar productos'),
(22, 'Editar productos'),
(23, 'Crear entradas'),
(24, 'Crear ventas'),
(25, 'Control'),
(26, 'Control entradas'),
(27, 'Control ventas'),
(28, 'Estado de productos'),
(29, 'Deudores'),
(30, 'Deudas por pagar'),
(31, 'Informes'),
(32, 'Configuracion'),
(33, 'Perfil de la tienda'),
(34, 'Impuestos'),
(35, 'Agregar impuestos'),
(36, 'Activar impuestos'),
(37, 'Editar impuestos'),
(38, 'Medidas'),
(39, 'Agregar medidas'),
(40, 'Activar medidas'),
(41, 'Editar medidas'),
(42, 'Administrar accesos'),
(43, 'Permisos'),
(44, 'Agregar permisos'),
(45, 'Editar permisos'),
(46, 'Empleados'),
(47, 'Agregar empleados'),
(48, 'Activar empleados'),
(49, 'Editar empleados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idUnidadVenta` int(11) NOT NULL,
  `idIva` tinyint(4) NOT NULL,
  `codigoProducto` varchar(20) COLLATE utf8_bin NOT NULL,
  `codigoBarras` varchar(20) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(60) COLLATE utf8_bin NOT NULL,
  `imagen` varchar(200) COLLATE utf8_bin NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0- Inactivo 1- Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `idCategoria`, `idUnidadVenta`, `idIva`, `codigoProducto`, `codigoBarras`, `descripcion`, `imagen`, `estado`) VALUES
(1, 1, 1, 1, '101', '7702004007643', 'Pepsi cola', 'views/img/productos/101/790.jpg', 1),
(2, 1, 1, 1, '102', '15151515', '7up', 'views/img/productos/102/453.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockproductos`
--

CREATE TABLE `stockproductos` (
  `idStockProducto` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `tipoMovimiento` tinyint(4) NOT NULL COMMENT '1- Entrada 2- Salida',
  `cantidadStock` int(11) NOT NULL,
  `precio` float NOT NULL,
  `rentabilidad` int(11) NOT NULL,
  `fechaStock` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(4) NOT NULL COMMENT '0- Inactivo 1- Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `idTienda` int(11) NOT NULL,
  `nombreTienda` varchar(200) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(200) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(14) COLLATE utf8_bin NOT NULL,
  `propietario` varchar(120) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `fecharRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`idTienda`, `nombreTienda`, `direccion`, `telefono`, `propietario`, `email`, `fecharRegistro`) VALUES
(1, 'Tienda de prueba', 'Calle 27 sur 50-05', '(320) 121-2020', 'Pepito Perez', 'pepito@got.co', '2019-01-20 02:43:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopermisos`
--

CREATE TABLE `tipopermisos` (
  `idTipo` int(11) NOT NULL,
  `nombreTipo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipopermisos`
--

INSERT INTO `tipopermisos` (`idTipo`, `nombreTipo`, `fechaCreacion`) VALUES
(1, 'Administrador', '2019-01-20 02:09:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadesventa`
--

CREATE TABLE `unidadesventa` (
  `idUnidadVenta` int(11) NOT NULL,
  `descripcion` varchar(60) COLLATE utf8_bin NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0- Inactivo 1- Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `unidadesventa`
--

INSERT INTO `unidadesventa` (`idUnidadVenta`, `descripcion`, `estado`) VALUES
(1, 'BOTELLA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `idTienda` int(11) NOT NULL,
  `tipoUsuario` tinyint(4) NOT NULL COMMENT '1- Cliente 2- Proveedor 3- Empleado',
  `tipoDocumento` tinyint(4) NOT NULL COMMENT '1- CC 2- NIT 3- TI 4- PA',
  `documento` varchar(15) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(60) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(20) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(60) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `genero` tinyint(4) NOT NULL COMMENT '1- Masculino 2- Femenino 3- Indefinido ',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0- Inactivo 1- Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `idTienda`, `tipoUsuario`, `tipoDocumento`, `documento`, `descripcion`, `telefono`, `direccion`, `email`, `fechaNacimiento`, `genero`, `fechaRegistro`, `estado`) VALUES
(1, 1, 3, 1, '123456', 'Pepito Perez', '(320) 121-2121', 'Calle 27 sur 50-05', 'pepito@got.co', '1990-02-02', 1, '2019-01-20 02:43:40', 1),
(2, 1, 2, 1, '12345', 'Coca cola', '(320) 201-2154', 'calle 50 sur 50-50', 'coca@coca.com', '1990-12-12', 3, '2019-01-20 03:10:07', 1),
(3, 1, 1, 1, '1234', 'Pablo Suarez', '(324) 515-1101', 'carrera 50 N 30-06', 'pablo@hotm.com', '1990-12-12', 1, '2019-01-20 03:11:45', 1),
(4, 1, 3, 1, '12348', 'Hija empleada', '(321) 514-2451', 'calle 32 50-30', 'hija@homti.com', '1993-01-01', 2, '2019-01-20 03:13:46', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariossistema`
--

CREATE TABLE `usuariossistema` (
  `idUsuarioSistema` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `nombreEmpleado` varchar(60) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_bin NOT NULL,
  `foto` varchar(200) COLLATE utf8_bin NOT NULL,
  `fecha_ultimo_ingreso` datetime NOT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT '0- Inactivo 1- Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuariossistema`
--

INSERT INTO `usuariossistema` (`idUsuarioSistema`, `idUsuario`, `idTipo`, `nombreEmpleado`, `contrasena`, `foto`, `fecha_ultimo_ingreso`, `fechacreacion`, `estado`) VALUES
(1, 1, 1, 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'views/img/empleados/admin/462.jpg', '2019-01-30 14:35:36', '2019-01-20 02:43:40', 1),
(2, 4, 1, 'prueba', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'views/img/empleados/prueba1/865.png', '0000-00-00 00:00:00', '2019-01-20 22:16:45', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonosentrada`
--
ALTER TABLE `abonosentrada`
  ADD PRIMARY KEY (`idComprobanteEgreso`),
  ADD KEY `idFactura_index` (`idFactura`),
  ADD KEY `idUsuarioSistena` (`idUsuarioSistena`);

--
-- Indices de la tabla `abonossalida`
--
ALTER TABLE `abonossalida`
  ADD PRIMARY KEY (`idComprobanteIngreso`),
  ADD KEY `idFactura_index` (`idFactura`),
  ADD KEY `idUsuarioSistena` (`idUsuarioSistena`),
  ADD KEY `idUsuarioAsesor` (`idUsuarioAsesor`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `facturasentrada`
--
ALTER TABLE `facturasentrada`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `idUsuarioProveedor_index` (`idUsuarioProveedor`),
  ADD KEY `idUsuarioSistema_index` (`idUsuarioSistema`);

--
-- Indices de la tabla `facturassalida`
--
ALTER TABLE `facturassalida`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `idUsuariocliente_index` (`idUsuarioCliente`),
  ADD KEY `idUsuarioSistema_index` (`isUsuarioSistema`);

--
-- Indices de la tabla `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`idIva`);

--
-- Indices de la tabla `movimientosalidas`
--
ALTER TABLE `movimientosalidas`
  ADD PRIMARY KEY (`idMovimientoProducto`),
  ADD KEY `idFactura` (`idFactura`),
  ADD KEY `movimientoSalida` (`idProducto`),
  ADD KEY `idIva` (`idIva`);

--
-- Indices de la tabla `movimientosentrada`
--
ALTER TABLE `movimientosentrada`
  ADD PRIMARY KEY (`idMovimientoProducto`),
  ADD KEY `idFactura` (`idFactura`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idIva` (`idIva`);

--
-- Indices de la tabla `permisousuarios`
--
ALTER TABLE `permisousuarios`
  ADD PRIMARY KEY (`idPermisoUsuario`),
  ADD KEY `idPrivilegio_index` (`idPrivilegio`),
  ADD KEY `idUsuarioSistema_index` (`idTipo`);

--
-- Indices de la tabla `plazospagoentradas`
--
ALTER TABLE `plazospagoentradas`
  ADD PRIMARY KEY (`idPlazoPago`),
  ADD KEY `formapago1` (`idFactura`);

--
-- Indices de la tabla `plazospagosalidas`
--
ALTER TABLE `plazospagosalidas`
  ADD PRIMARY KEY (`idPlazoPago`),
  ADD KEY `plazoSalida` (`idFactura`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`idPrivilegio`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idCategoria_index` (`idCategoria`),
  ADD KEY `idUnidadVenta_index` (`idUnidadVenta`),
  ADD KEY `iva` (`idIva`);

--
-- Indices de la tabla `stockproductos`
--
ALTER TABLE `stockproductos`
  ADD PRIMARY KEY (`idStockProducto`),
  ADD KEY `stock` (`idProducto`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`idTienda`);

--
-- Indices de la tabla `tipopermisos`
--
ALTER TABLE `tipopermisos`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `unidadesventa`
--
ALTER TABLE `unidadesventa`
  ADD PRIMARY KEY (`idUnidadVenta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idTienda` (`idTienda`);

--
-- Indices de la tabla `usuariossistema`
--
ALTER TABLE `usuariossistema`
  ADD PRIMARY KEY (`idUsuarioSistema`),
  ADD KEY `idUsuario_index` (`idUsuario`),
  ADD KEY `TipoPermiso1` (`idTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonosentrada`
--
ALTER TABLE `abonosentrada`
  MODIFY `idComprobanteEgreso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `abonossalida`
--
ALTER TABLE `abonossalida`
  MODIFY `idComprobanteIngreso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `facturasentrada`
--
ALTER TABLE `facturasentrada`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturassalida`
--
ALTER TABLE `facturassalida`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `idIva` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `movimientosalidas`
--
ALTER TABLE `movimientosalidas`
  MODIFY `idMovimientoProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimientosentrada`
--
ALTER TABLE `movimientosentrada`
  MODIFY `idMovimientoProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisousuarios`
--
ALTER TABLE `permisousuarios`
  MODIFY `idPermisoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `plazospagoentradas`
--
ALTER TABLE `plazospagoentradas`
  MODIFY `idPlazoPago` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plazospagosalidas`
--
ALTER TABLE `plazospagosalidas`
  MODIFY `idPlazoPago` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `idPrivilegio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `stockproductos`
--
ALTER TABLE `stockproductos`
  MODIFY `idStockProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `idTienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipopermisos`
--
ALTER TABLE `tipopermisos`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `unidadesventa`
--
ALTER TABLE `unidadesventa`
  MODIFY `idUnidadVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuariossistema`
--
ALTER TABLE `usuariossistema`
  MODIFY `idUsuarioSistema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abonosentrada`
--
ALTER TABLE `abonosentrada`
  ADD CONSTRAINT `relacion1` FOREIGN KEY (`idFactura`) REFERENCES `facturasentrada` (`idFactura`) ON UPDATE CASCADE,
  ADD CONSTRAINT `relacion2` FOREIGN KEY (`idUsuarioSistena`) REFERENCES `usuarios` (`idUsuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `abonossalida`
--
ALTER TABLE `abonossalida`
  ADD CONSTRAINT `abonossalida_ibfk_1` FOREIGN KEY (`idUsuarioSistena`) REFERENCES `usuarios` (`idUsuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comprobanteingreso1` FOREIGN KEY (`idFactura`) REFERENCES `facturassalida` (`idFactura`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comprobanteingreso2` FOREIGN KEY (`idUsuarioAsesor`) REFERENCES `usuarios` (`idUsuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturasentrada`
--
ALTER TABLE `facturasentrada`
  ADD CONSTRAINT `facturasentrada1` FOREIGN KEY (`idUsuarioProveedor`) REFERENCES `usuarios` (`idUsuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `facturasentrada2` FOREIGN KEY (`idUsuarioSistema`) REFERENCES `usuarios` (`idUsuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturassalida`
--
ALTER TABLE `facturassalida`
  ADD CONSTRAINT `facturassalida1` FOREIGN KEY (`idUsuarioCliente`) REFERENCES `usuarios` (`idUsuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `facturassalida2` FOREIGN KEY (`isUsuarioSistema`) REFERENCES `usuarios` (`idUsuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimientosalidas`
--
ALTER TABLE `movimientosalidas`
  ADD CONSTRAINT `movimientoSalida1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientoSalida2` FOREIGN KEY (`idFactura`) REFERENCES `facturassalida` (`idFactura`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientoSalida3` FOREIGN KEY (`idIva`) REFERENCES `iva` (`idIva`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimientosentrada`
--
ALTER TABLE `movimientosentrada`
  ADD CONSTRAINT `movimientoEntrada1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientoEntrada2` FOREIGN KEY (`idFactura`) REFERENCES `facturasentrada` (`idFactura`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientoEntrada3` FOREIGN KEY (`idIva`) REFERENCES `iva` (`idIva`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisousuarios`
--
ALTER TABLE `permisousuarios`
  ADD CONSTRAINT `permisoUsuarios1` FOREIGN KEY (`idPrivilegio`) REFERENCES `privilegios` (`idPrivilegio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `permisoUsuarios2` FOREIGN KEY (`idTipo`) REFERENCES `tipopermisos` (`idTipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `plazospagoentradas`
--
ALTER TABLE `plazospagoentradas`
  ADD CONSTRAINT `plazospagoentradas` FOREIGN KEY (`idFactura`) REFERENCES `facturasentrada` (`idFactura`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `plazospagosalidas`
--
ALTER TABLE `plazospagosalidas`
  ADD CONSTRAINT `plazospagosalidas` FOREIGN KEY (`idFactura`) REFERENCES `facturassalida` (`idFactura`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos2` FOREIGN KEY (`idUnidadVenta`) REFERENCES `unidadesventa` (`idUnidadVenta`),
  ADD CONSTRAINT `productos3` FOREIGN KEY (`idIva`) REFERENCES `iva` (`idIva`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `stockproductos`
--
ALTER TABLE `stockproductos`
  ADD CONSTRAINT `stockRestric` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios` FOREIGN KEY (`idTienda`) REFERENCES `tienda` (`idTienda`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariossistema`
--
ALTER TABLE `usuariossistema`
  ADD CONSTRAINT `TipoPermiso1` FOREIGN KEY (`idTipo`) REFERENCES `tipopermisos` (`idTipo`),
  ADD CONSTRAINT `usuariossistema1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
