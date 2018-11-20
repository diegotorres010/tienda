<?php
$install = 'models/conexion.php';
if (!file_exists($install)) {
	echo "<center><h2>Debes realizar la instalación!</h2></center>";
	echo '<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=install">';
	
}else{
    echo "error";
}
/*elseif(isset($_SESSION['user'])) {
	$buscar = @mysql_query("SELECT * FROM soft_bans WHERE username ='".$_SESSION['user']."'");
	$ban = mysql_fetch_array($buscar);
	if( $ban['ban'] == '1'){
	require("inc/config.php");
require("inc/conexion_mysql.php");	
include("inc/query.php");
session_start();
		include("inc/contenido/ban.html");
	}else{
	require("inc/config.php");
require("inc/conexion_mysql.php");	
include("inc/query.php");
session_start();
	include("./temas/$tema/index.php");
	}
}
else{
require("inc/config.php");
require("inc/conexion_mysql.php");	
include("inc/query.php");
session_start();
	include("./temas/$tema/index.php");
}*/
?>