<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../styles.css">
</head>
<body>
	<section id="mensaje_fallido">
		<div class="mensaje">
			<h1>Reserva Fallida</h1>
			<h3>No se pudo reservar esta habitacion por que la fecha ingresada esta reservada</h3>
		
			<?php 
				$room_actual = $_GET["room"];
				



			 
			echo "<div><a href='detallehabitacion.php?modulo=detallehabitacion&room=$room_actual'>Volver</a></div>";
			?>

			
		</div>			
	</section>			
</body>
</html>


