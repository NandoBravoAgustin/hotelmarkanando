<section id="create-room">
	
	<form action="php/create-room.php" name="auntentificacion_frm" method="POST" enctype="application/x-www-form-urlencoded">
		<?php 
			error_reporting(E_ALL ^ E_NOTICE);
			// include ("php/mensaje.php");
			
		 ?>
		 <h2>CREATE ROOM</h2>
		<label for="room">Nombre de la habitacion:</label> <input id="room" type="text" name="nombre_txt" placeholder="Nombre de la habitacion" required>
		<label for="description">Descripción:</label><textarea id="description" placeholder="Escribe la descripción de la Habitación" name="description_txt"  cols="10" rows="3" required></textarea>
		<div class="features">
			<div class="input">
				<label for="baños">Baños:</label> <input type="number" id="baños" required name="baños_num">
			</div>
			<div class="input">
				<label for="habitacion">Habitaciones:</label> <input type="number" required name="habitacion_num" id="habitacion">
			</div>
			<div class="input">
				<label for="personas">Max Personas:</label> <input type="number" required name="personas_num" id="personas">
			</div>
			<div class="input">
				<label for="precio">Precio:</label> <input type="number" required name="precio_num" id="precio">
			</div>
		</div>		
		<label for="imagen">Imagen:</label> <input type="file" name="imagen_fls" id="imagen">
		<label for="estrellas">Numero de estrellas:</label> <input type="number" required name="estrellas_num">
		<input type="submit" name="entrar_btn" value="Crear Habitacion">
	</form>



</section>