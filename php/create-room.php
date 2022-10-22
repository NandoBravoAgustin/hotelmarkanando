<?php 
$nombre = $_POST["nombre_txt"];
$description = $_POST["description_txt"];
$baños = $_POST["baños_num"];
$habitacion = $_POST["habitacion_num"];
$personas = $_POST["personas_num"];
$precio = $_POST["precio_num"];
$estrellas = $_POST["estrellas_num"];
$imagen = $_POST["imagen_fls"];


	




include ("conexion.php");
$consulta = "SELECT * FROM rooms WHERE room = '$nombre'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows;

if ($num_regs == 0) {
	$consulta = "INSERT INTO rooms (nombre, description, bathroom, room, person, price, image, star) VALUES ('$nombre','$description','$baños','$habitacion','$personas','$precio','$imagen','$estrellas')";
	$ejecutar_consulta = $conexion->query(utf8_encode($consulta));
	if ($ejecutar_consulta) $mensaje = "Se creo la habitacion '$nombre'";
	else $mensaje = "No se pudo crear la habitacion";
} else $mensaje = "La habitacion '$nombre' ya existe";

$conexion->close();
header("Location: ../admin.php?op=create-room#create-room&mensaje=$mensaje")
 ?>