<?php 
session_start();

if (!$_SESSION["auntentificado"]) {
	header("Location: php/salir.php");
}

 ?>