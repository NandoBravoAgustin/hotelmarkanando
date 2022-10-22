<?php 

include ("php/conexion2.php");
$consulta = "SELECT * FROM rooms ORDER BY nombre";
$ejecutar_consulta = $conectar->query($consulta);

while ($registro = $ejecutar_consulta->fetch_assoc()) {
	$select_room = utf8_encode($registro["nombre"]);
		echo "<option value='$select_room'>$select_room</option>";
};
$conectar->close();

 ?>