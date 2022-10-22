<?php 
include_once 'conexion.php';
$room_actual = $_REQUEST["room"];
$consulta = "SELECT nombre, description, bathroom, room, person, price, image ,star FROM rooms WHERE nombre = '$room_actual'";
$ejecutar_consulta = $conexion->query($consulta);

while ($registro = $ejecutar_consulta->fetch_assoc()) {
	$select_nombre = utf8_encode($registro["nombre"]);
	$select_description = utf8_encode($registro["description"]);
	$select_bathroom = utf8_encode($registro["bathroom"]);
	$select_room = utf8_encode($registro["room"]);
	$select_person = utf8_encode($registro["person"]);
	$select_price = utf8_encode($registro["price"]);
	$select_image = utf8_encode($registro["image"]);
	$select_star = utf8_encode($registro["star"]);
};



 ?>

 <!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>Document</title>
	<link rel='stylesheet' href='../styles.css'>
	<link rel="stylesheet" href="../main.css">
	<script src="../js/main.js"></script>
	<script src="../js/locales-all.js"></script>




</head>

<body>
<section id='room-select'>
	<?php 
	echo "	
		<div class='room-target'>
		<div class='volver'><a href='../index.php'>Volver</a></div>
		 	<div class='room-target__base'>
		 		<div class='room-target__base__img'>
		 			<img src='../img/rooms/room1.jpg' >
		 		</div>
		 		<div class='room-target__base__content'>
		 			<div class='title-and-features'>
		 				<h1>$select_nombre</h1>
		 				<div class='title-and-features__base__feat'>
		 					<img src='../img/door.png'>
		 					<p>$select_room Rooms</p>
		 				</div><br>
		 				<div class='title-and-features__base__feat'>
		 					<img src='../img/bathtub.png'>
		 					<p>$select_bathroom Bathtub</p>
		 				</div><br>
		 				<div class='title-and-features__base__feat'>
		 					<img src='../img/person.png'>
		 					<p>$select_person Persons</p>
		 				</div>
		 			</div>
		 			<div class='room-target__base__paragraph'>
		 				<p>$select_description</p>
		 			</div>
		 		</div>
		 	</div>
		</div>
	";


include_once 'conexion.php';
$habitacion = "SELECT fecha_entrada, fecha_salida FROM reservation WHERE habitacion = '$room_actual'";
$ejecutar_habitacion = $conexion->query($habitacion);


// while ($reg = $ejecutar_habitacion->fetch_assoc()) {
	
// 	echo "Desde ".$reg['fecha_entrada']." hasta  ".$reg['fecha_salida']."<br>";
// }


$conexion->close();

	 ?>
</section>

<script>
		document.addEventListener('DOMContentLoaded', function() {
		  var calendarEl = document.getElementById('calendar');
		  var calendar = new FullCalendar.Calendar(calendarEl, {
		    initialView: 'dayGridMonth',
		   locale:"es",
		   events:[
		   <?php 
					$room_actual = $_GET["room"];
					include_once 'conexion3.php';

					$fechas_reservadas = array();

					$consulta_personas = "SELECT fecha_entrada,fecha_salida FROM reservation WHERE habitacion = '$room_actual'";
					$ejecutar_consulta_personas = $conectar_database->query($consulta_personas);
					while ($registro = $ejecutar_consulta_personas->fetch_assoc()) {
						$fecha_1 = $registro["fecha_entrada"];
						$fecha_2 = $registro["fecha_salida"];

						for ($i=$fecha_1; $i <= $fecha_2; $i = date("Y-m-d", strtotime($i."+ 1 days"))) { 
							array_push($fechas_reservadas, $i);
							echo "{
				   			title: 'Reservado',
				   			start:'$i',
					   		color:'red',
					   		textColor:'white'
				   		},";
						};


					};


					$conectar_database->close();
		   		;

		   		
		    ?>
		   	

		   	
		   ]
		    
		  });
		        calendar.render();
		});
	</script>

<section id="reservation">
	<form action="reservar.php" method="POST" name="reservar_frm" enctype="application/x-www-form-urlencoded">
		<?php 
			error_reporting(E_ALL ^ E_NOTICE);

			if ($_GET["mensaje"]=="reserva_exitosa") {
				echo "<h2>Reserva exitosa</h2><br><br>";
			} else if ($_GET["mensaje"]=="reserva_fallida"){
				echo "<h2>La reserva no se pudo hacer por que dentro de la fecha ingresada esta reservada</h2><br><br>";
			} else if ($_GET["mensaje"]=="reserva_fallida_persona") {
				echo "<h2>La reserva no se pudo hacer por que la cantidad de personas son demasiadas</h2><br><br>";
			}

		 ?>




		<h3>Reservar esta habitacion</h3>
		
		
		<label for="fechaida">Fecha de entrada</label>
		<input id="fechaida" type="date" name="fechaida_dat" min=<?php $hoy=date("Y-m-d");echo $hoy; ?>>
		<label for="fechavuelta">Fecha de salida</label>
		<input id="fechavuelta" type="date" name="fechavuelta_dat" min=<?php $hoy=date("Y-m-d");echo $hoy; ?>>
		<label for="personas">Cantidad de Personas</label>
		<input id="personas" type="number" name="personas_num" placeholder="Cantidad de personas">
		<input type="submit" name="enviar_btn">
		<input type="hidden" name="room_hid" value="<?php echo $room_actual ?>">
		<input type="hidden" name="numreserva_hid">
	</form>

</section>

<section id="calendario">
	<h2>Comprueba que tu fecha este disponible antes de reservar</h2>
	<div class="container_calendario">
		<div id="calendar"></div>
	</div>
</section>
	
</body>
</html>	
