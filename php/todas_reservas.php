<?php 
$room_actual = $_GET["room_hid"];
include_once 'conexion3.php';

$fechas_reservadas = array();

$consulta_personas = "SELECT fecha_entrada,fecha_salida FROM reservation WHERE habitacion = '$room_actual'";
$ejecutar_consulta_personas = $conectar_database->query($consulta_personas);
while ($registro = $ejecutar_consulta_personas->fetch_assoc()) {
	$fecha_1 = $registro["fecha_entrada"];
	$fecha_2 = $registro["fecha_salida"];

	for ($i=$fecha_1; $i <= $fecha_2; $i = date("Y-m-d", strtotime($i."+ 1 days"))) { 
		array_push($fechas_reservadas, $i);
		
	};


};


$conectar_database->close();

 ?>