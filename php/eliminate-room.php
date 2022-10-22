<?php 
$room = $_POST["room_sel"];
include ("conexion2.php");
$consulta = "DELETE FROM rooms WHERE nombre='$room'";

$ejecutar_consulta = $conectar->query($consulta);

$conectar->close();
header("Location: ../admin.php?op=eliminate-room")
 ?>