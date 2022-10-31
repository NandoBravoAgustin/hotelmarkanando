
<?php 

	
	$room = $_GET["room"];
	$fecha_ida = $_GET["fecha_ida"];
	$fecha_vuelta = $_GET["fecha_vuelta"];
	$num_personas = $_GET["num_personas"];
	$price = $_GET["price"];
	$cliente = $_GET["cliente"];
	$dni = $_GET["dni"];
	$total = $_GET["total"];
	$dias = $_GET["dias"];
	include_once 'conexion2.php';
		
		$consulta = "INSERT INTO reservation (habitacion, fecha_entrada, fecha_salida, cantidad_personas,id) VALUES ('$room','$fecha_ida','$fecha_vuelta','$num_personas',null)";
		
		$ejecutar_consulta = $conectar->query(utf8_encode($consulta));
		$conectar->close();
	include_once 'conexion3.php';	
		$id_consulta_reserva = "SELECT id FROM reservation WHERE fecha_entrada = '$fecha_ida'";
		$ejecutar_id_consulta_reserva = $conectar_database->query($id_consulta_reserva);
		$reg_id_reserva = $ejecutar_id_consulta_reserva->fetch_assoc();
		$id_reserva = $reg_id_reserva['id'];


		header("Location: reserva_exitosa.php?id=$id_reserva&room=$room&fecha_ida=$fecha_ida&fecha_vuelta=$fecha_vuelta&num_personas=$num_personas&price=$price&cliente=$cliente&dni=$dni&total=$total&dias=$dias");
	$conectar_database->close();






 ?>

