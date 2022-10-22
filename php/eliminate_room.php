<section id="create-room">
	
	<form action="php/eliminate-room.php" name="auntentificacion_frm" method="POST" enctype="application/x-www-form-urlencoded">
		<?php 
			error_reporting(E_ALL ^ E_NOTICE);
			// include ("php/mensaje.php");
		 ?>
		 <h2>ELIMINATE ROOM</h2>
		Nombre de la habitacion: <select name="room_sel">
			<option value="">- - -</option>
		
			<?php include ("select-room.php"); ?>
			
			
		

		</select>			
		<input type="submit" name="entrar_btn" value="Eliminar Habitacion">
	</form>



</section>

