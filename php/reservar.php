
<?php 
$room_actual = $_POST["room_hid"];
$fecha_ida = $_POST["fechaida_dat"];
$fecha_vuelta = $_POST["fechavuelta_dat"];
$num_personas = $_POST["personas_num"];
$numero_reserva = $_POST["numreserva_hid"];
$fechas_reservadas = array();
$price = $_POST["price_hid"];
$cliente = $_POST["nombre_txt"];
$dni = $_POST["dni_txt"];


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
	$dias = count($fechas_reservadas);
	$total = $dias * $price;


$consulta_persona = "SELECT person FROM rooms WHERE nombre = '$room_actual'";
$ejecutar_consulta_persona = $conexion->query($consulta_persona);
$registro_personas = $ejecutar_consulta_persona->fetch_assoc();
$max_personas = $registro_personas["person"];
$conexion->close();

// reservar
if (array_intersect($intervalo_fechas, $fechas_reservadas) ) {
	
	header("Location: reserva_fallida.php?room=$room_actual");			

} else if ($max_personas >= $num_personas){
	include_once 'conexion2.php';
		
		$consulta = "INSERT INTO reservation (habitacion, fecha_entrada, fecha_salida, cantidad_personas,id) VALUES ('$room_actual','$fecha_ida','$fecha_vuelta','$num_personas',null)";
		
		$ejecutar_consulta = $conectar->query(utf8_encode($consulta));
		$conectar->close();
	include_once 'conexion3.php';	
		$id_consulta_reserva = "SELECT id FROM reservation WHERE fecha_entrada = '$fecha_ida'";
		$ejecutar_id_consulta_reserva = $conectar_database->query($id_consulta_reserva);
		$reg_id_reserva = $ejecutar_id_consulta_reserva->fetch_assoc();
		$id_reserva = $reg_id_reserva['id'];


		header("Location: reserva_exitosa.php?id=$id_reserva&room=$room_actual&fecha_ida=$fecha_ida&fecha_vuelta=$fecha_vuelta&num_personas=$num_personas&price=$price&cliente=$cliente&dni=$dni&total=$total&dias=$dias");
	$conectar_database->close();

} else {
	header("Location: reserva_fallida_personas.php?room=$room_actual");
}
;




 ?>

