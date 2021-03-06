<?php

require_once "controllers/plantilla.controller.php";
require_once "controllers/tiendas.controller.php";
require_once "controllers/terceros.controller.php";
require_once "controllers/empleados.controller.php";
require_once "controllers/usuarios.controller.php";
require_once "controllers/proveedores.controller.php";
require_once "controllers/clientes.controller.php";
require_once "controllers/medidas.controller.php";
require_once "controllers/categorias.controller.php";
require_once "controllers/productos.controller.php";
require_once "controllers/impuestos.controller.php";
require_once "controllers/creditos.controller.php";
require_once "controllers/ventas.controller.php";
require_once "controllers/privilegios.controller.php";
require_once "controllers/permisos.controller.php";

require_once "models/tiendas.model.php";
require_once "models/terceros.model.php";
require_once "models/empleados.model.php";
require_once "models/usuarios.model.php";
require_once "models/proveedores.model.php";
require_once "models/clientes.model.php";
require_once "models/medidas.model.php";
require_once "models/categorias.model.php";
require_once "models/productos.model.php";
require_once "models/impuestos.model.php";
require_once "models/creditos.model.php";
require_once "models/ventas.model.php";
require_once "models/privilegios.model.php";
require_once "models/permisos.model.php";

$plantilla = new ControllerPlantilla();
$plantilla -> ctrPlantilla();