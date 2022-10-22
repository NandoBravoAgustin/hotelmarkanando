<?php 
$room_actual = $_POST["room_hid"];
$fecha_ida = $_POST["fechaida_dat"];
$fecha_vuelta = $_POST["fechavuelta_dat"];
$num_personas = $_POST["personas_num"];
$numero_reserva = $_POST["numreserva_hid"];
$fechas_reservadas = array();



// Fechas a reservar
$intervalo_fechas = array();
for ($i=$fecha_ida; $i <= $fecha_vuelta; $i = date("Y-m-d", strtotime($i."+ 1 days"))) { 
	array_push($intervalo_fechas, $i);
};


// Fechas Reservadas anteriormente
include_once 'conexion.php';
$consulta = "SELECT fecha_entrada,fecha_salida FROM reservation WHERE habitacion = '$room_actual'";
$ejecutar_consulta = $conexion->query($consulta);
while ($registro = $ejecutar_consulta->fetch_assoc()) {
	$fecha_1 = $registro["fecha_entrada"];
	$fecha_2 = $registro["fecha_salida"];

	for ($i=$fecha_1; $i <= $fecha_2; $i = date("Y-m-d", strtotime($i."+ 1 days"))) { 
		array_push($fechas_reservadas, $i);	
	};
};


$consulta_persona = "SELECT person FROM rooms WHERE nombre = '$room_actual'";
$ejecutar_consulta_persona = $conexion->query($consulta_persona);
$registro_personas = $ejecutar_consulta_persona->fetch_assoc();
$max_personas = $registro_personas["person"];
$conexion->close();
// reservar
if (array_intersect($intervalo_fechas, $fechas_reservadas) ) {
	echo "la fecha <b>($fecha_ida entre $fecha_vuelta)</b> no esta disponible por que esta reservada MAKINOLA<br>";

	header("Location: detallehabitacion.php?modulo=detallehabitacion&room=$room_actual&mensaje=reserva_fallida");

} else if ($max_personas >= $num_personas){
	include_once 'conexion2.php';
		$consulta = "INSERT INTO reservation (habitacion, fecha_entrada, fecha_salida, cantidad_personas,id) VALUES ('$room_actual','$fecha_ida','$fecha_vuelta','$num_personas','')";
		$ejecutar_consulta = $conectar->query(utf8_encode($consulta));
		$conectar->close();
		header("Location: detallehabitacion.php?modulo=detallehabitacion&room=$room_actual&mensaje=reserva_exitosa");

} else {
	header("Location: detallehabitacion.php?modulo=detallehabitacion&room=$room_actual&mensaje=reserva_fallida_persona");
}
;

	// foreach ($fechas_reservadas as $key => $value) {
	// 	echo $key." : ".$value."<br>";
	// };


	


//esto es para demostrar qu si se pudo crear el array




 ?>