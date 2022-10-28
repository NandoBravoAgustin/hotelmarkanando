<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../styles.css">
</head>
<body>
	<section id="mensaje_exitoso">
		<div>
			<h1>Reserva Exitosa</h1>
			<h3>Se reservo exitosamente la habitacion</h3>
		
			<?php 
				$room_actual = $_GET["room"];
				$fecha_ida = $_GET["fecha_ida"];
				$fecha_vuelta = $_GET["fecha_vuelta"];
				$num_personas = $_GET["num_personas"];
				$price = $_GET["price"];
				$id_reserva = $_GET["id"];
				$dni = $_GET["dni"];
				$cliente = $_GET["cliente"];



			echo "<a href='../ticket/ticket.php?id=$id_reserva&room=$room_actual&fecha_ida=$fecha_ida&fecha_vuelta=$fecha_vuelta&num_personas=$num_personas&price=$price&dni=$dni&cliente=$cliente' download='doc.pdf'>Descargar Comprobante</a>"; 
			echo "<a href='detallehabitacion.php?modulo=detallehabitacion&room=$room_actual&cliente=$cliente'>Volver</a>";
			?>

			
		</div>			
	</section>			
</body>
</html>



