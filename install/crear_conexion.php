<!DOCTYPE html>
<html>
<?php
    require_once "cabeza.php";
?>

<body style="background: #e0e0e0;">
<div class="wrapper">
<div class="content">
<center>
<?php
	error_reporting(0);
	$host = $_POST["nuevoHost"]; 
	$db = $_POST["nuevoDB"];
	$root = $_POST["nuevoUsuarioDB"]; 
	$pass = $_POST["nuevaPasswordDB"];
    $data= "../models/conexion.php";
	$valores=
        '<?php
        class Conexion{
            static public function conectar(){
                $link = new PDO("mysql:host='.$host.';dbname='.$db.'",
                                "'.$root.'",
                                "'.$pass.'");
                $link->exec("set names utf8");        
                return $link;        
            }        
        }';

	if(!file_put_contents($data, $valores)){
       echo 'No se ha podido crear el archivo de conexión';
    }else{
        include("../controllers/instalador.controller.php");
    
        $crearTienda = new ControladorTiendas();
        $crearTienda -> ctrCrearTienda();

        $crearTiendaTercero = new ControladorTiendas();
        $crearTiendaTercero -> ctrCrearTiendaTercero();

        $crearTiendaUsuario = new ControladorTiendas();
        $crearTiendaUsuario -> ctrCrearTiendaUsuario();

?>

	<h2>Ha terminado la configuración!</h2>
    <h4>Si presenta errores por favor siga las instrucciones o haga clic en "Reintentar".</h4>
    <h4>De lo contrario dar clic en "Continuar" para dar inicio al sistema.</h4>
    <br>
    <a href="reintentar.php"><input class="btn btn-danger btn-lg" value="Reintentar"/></a>
    <a href="../index2.php"><input class="btn btn-primary btn-lg" value="Continuar"/></a>
<?php
    }
?>
</center>
</div>
</div>
</body>
</html>