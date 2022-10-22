<?php 
	include_once 'conexion.php';

	$consulta = "SELECT nombre,password FROM admin";
	$ejecutar_consulta = $conexion->query($consulta);
	$registro = $ejecutar_consulta->fetch_assoc();
	$user = $registro["nombre"];
	$password = $registro["password"];

	if ($_POST["user_txt"] == $user && $_POST["password_txt"]== $password) {
		session_start();

		// declaro mis variables de sesion
		$_SESSION["auntentificado"] = true;
		$_SESSION["usuario"] = $_POST["user_txt"];
		header("Location: ../admin.php");
	} else {
		header("Location: ../index.php?op=login&error-login=si");
	}







 ?>