<?php 
include ("conexion.php");
$consulta = "SELECT nombre, description, bathroom, room, person, price, image ,star FROM rooms";
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

	echo "
	<a href=''>
		<div class='rooms__base__box'>
			<div class='rooms__img'>
				<img src='img/rooms/room1.jpg' class='rooms__img'>
				<div class='img__base'>	
					<div class='img__base__feat'>
						<img src='img/door.png'>
						<p>$select_room Rooms</p>
					</div>
					<div class='img__base__feat'>
						<img src='img/bathtub.png'>
						<p>$select_bathroom Bathroom</p>
					</div>
					<div class='img__base__feat'>
						<img src='img/person.png'>
						<p>$select_person Persons</p>
					</div>	
				</div>
				<div class='img__reservation'>
					<div class='img__reservation__feat'>
						<a href='php/detallehabitacion.php?modulo=detallehabitacion&room=$select_nombre'>
							<img src='img/eye.svg'>
							<p>Ver detalles</p>
						</a>
					</div>
					<div class='img__reservation__feat'>
							<a href='' >
								<img src='img/reservation.svg'>
								<p>Reservar ahora</p>
							</a>
					</div>
				</div>
			</div>
			<div class='rooms__content'>
			<div class='content__text'>
				<h3>$select_nombre</h3>
				<span>$select_description</span>
			</div>
			<div class='content__values'>
				<div class='stars'>
					<span>$select_star</span><img src='img/star.png'>
				</div>
				<div class='for-night'>
					<span>$$select_price</span>
				</div>
			</div>
			</div>
	</div>
	</a>


	";
};


 ?>
 