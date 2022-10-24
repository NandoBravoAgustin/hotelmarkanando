<?php 
$room_actual = $_POST["room_hid"];
$fecha_ida = $_POST["fechaida_dat"];
$fecha_vuelta = $_POST["fechavuelta_dat"];
$num_personas = $_POST["personas_num"];
$numero_reserva = $_POST["numreserva_hid"];
$fechas_reservadas = array();

// Fechas a reservar
include_once 'conexion2.php';
$consulta = "INSERT INTO reservation (habitacion, fecha_entrada, fecha_salida, cantidad_personas,id) VALUES ('$room_actual','$fecha_ida','$fecha_vuelta','$num_personas','1')";
$ejecutar_consulta = $conectar->query(utf8_encode($consulta));
$conectar->close();
header("Location: https://hotelmarkanando.herokuapp.com/php/detallehabitacion.php?reserva=exitosa&modulo=detallehabitacion&room=$room_actual&mensaje=reserva_exitosa");




 ?>
 <script>
 	console.log("prueba")
 </script>
