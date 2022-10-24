
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

echo "room actual : ".$room_actual."<br>"."fecha ida : ".$fecha_ida."<br>"."fecha vuelta : ".$fecha_vuelta."<br>"."num personas : ".$num_personas."<br>"."num reserva : ".$numero_reserva."<br>"."fechas reservadas : <br>".$fechas_reservadas;

 ?>
