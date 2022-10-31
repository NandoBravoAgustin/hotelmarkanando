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
	<script src="../fullcalendar/lib/main.js"></script>
	<script src="../fullcalendar/lib/locales-all.js"></script>




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
		 				<h3>$select_price$ / por Noche</h3>
		 			</div>
		 		</div>
		 	</div>
		</div>
	";


include_once 'conexion.php';
$habitacion = "SELECT fecha_entrada, fecha_salida FROM reservation WHERE habitacion = '$room_actual'";
$ejecutar_habitacion = $conexion->query($habitacion);





$conexion->close();

	 ?>
	 
</section>

<script>
		document.addEventListener('DOMContentLoaded', function() {
		  var calendarEl = document.getElementById('calendar');
		  var calendar = new FullCalendar.Calendar(calendarEl, {
		    initialView: 'dayGridMonth',
		   locale:"en",
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
					   		textColor:'white',
					   		
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
	<form action="disponibilidad.php" method="POST" name="reservar_frm" enctype="application/x-www-form-urlencoded">
		




		<h3>Reservar esta habitacion</h3>
		<label for="nombre">Tu Nombre</label>
		<input type="text" name="nombre_txt" maxlength="25"  required placeholder="Escribe tu nombre" accesskey="b" id="nombre" pattern="[a-Z]{25}">
		<label for="dni">Tu DNI</label>
		<input id="dni" name="dni_txt" maxlength="8" type="text" pattern="[0-9]{8}" required title="Debes poner 8 numeros" placeholder="Escribe tu DNI" min="5000000">
		<p id="mensajeInputDni"></p>
		<label for="fechaida">Fecha de entrada</label>
		<input id="fechaida" type="date" name="fechaida_dat" min=<?php $hoy=date("Y-m-d");echo $hoy; ?> required >
		<label for="fechavuelta">Fecha de salida</label>
		<input id="fechavuelta" type="date" name="fechavuelta_dat" min="" required disabled>
		<label for="personas">Cantidad de Personas</label>
		<input id="personas" max=20 type="number" name="personas_num" placeholder="Cantidad de personas" min="1">
		<p id="mensajeInputPersonas"></p>
		<input type="submit" name="enviar_btn">
		<input type="hidden" name="room_hid" value="<?php echo $room_actual ?>">
		<input type="hidden" name="numreserva_hid">
		<input type="hidden" name="price_hid" value="<?php echo $select_price?>">
		<p id="total"></p>
	</form>

</section>

<section id="calendario">
	<h2>Comprueba que tu fecha este disponible antes de reservar</h2>
	<div class="container_calendario">
		<div translate="no" id="calendar"></div>
	</div>
</section>

<script>
//fechas
const fechaInput = document.getElementById("fechaida");
const fechaInput2 = document.getElementById("fechavuelta");


fechaInput.onchange = function () {
	const fechaMin = fechaInput.value;
	fechaInput2.setAttribute('min',`${fechaInput.value}`);
	fechaInput2.removeAttribute('disabled');	
}
fechaInput2.onchange = function () {

	const stringFecha = JSON.stringify(fechaInput.value);
	const nuevaFecha = stringFecha.slice(1,-1);
	const arrFecha = nuevaFecha.split('-');
	const año = parseInt(arrFecha[0]);
	const mes = parseInt(arrFecha[1]);
	const dia = parseInt(arrFecha[2]);
	const fecha1 = new Date(año, mes - 1, dia);




	// convertir el valor de input a formato Date();fecha2
	const stringFecha2 = JSON.stringify(fechaInput2.value);
	const nuevaFecha2 = stringFecha2.slice(1,-1);
	const arrFecha2 = nuevaFecha2.split('-');
	// console.log(arrFecha2)
	
	const año2 = parseInt(arrFecha2[0]);
	const mes2 = parseInt(arrFecha2[1]);
	const dia2 = parseInt(arrFecha2[2]);

	const fecha2 = new Date(año2, mes2 - 1, dia2);
	
	// RESTAR FECHA
	function calcularDiferenciaDias(fecha1, fecha2) {
		let diferencia = (fecha2 - fecha1) / (1000 * 60 * 60 * 24);
		return Math.floor(diferencia);
	};
	// console.log(calcularDiferenciaDias(fecha1, fecha2));
	const totalDias = calcularDiferenciaDias(fecha1, fecha2) + 1;
	const totalPagar = totalDias * <?php echo $select_price; ?>;
	console.log(totalPagar);

	const totalSpan = document.querySelector('#reservation #total');
	totalSpan.innerHTML = `Total a Pagar :<span>${totalPagar}$ USD</span>`;

	
	
}
</script>									
<script>
	const inputPersonas = document.getElementById('personas');
	const inputDni = document.getElementById('dni');

	inputPersonas.onchange = function () {
			const mensajePersonas = document.getElementById('mensajeInputPersonas');
		if (!(inputPersonas.value <= 20)) {
			mensajePersonas.innerHTML = `No puede ser mas de 20 personas`;	
		} 
		else if(inputPersonas.value < 1){
			mensajePersonas.innerHTML = `No puede ser menor a 1`;
		}
		else{
			mensajePersonas.innerHTML = ``;
		}
	}
	inputDni.onchange = function () {
		const mensajeDni = document.getElementById('mensajeInputDni');
		if (inputDni.value < 5000000){
			mensajeDni.innerHTML = `El dni no puede ser menor a 5.000.000`;
		}
		else {
			mensajeDni.innerHTML = ``;
		}
	}


</script>
	
</body>
</html>
