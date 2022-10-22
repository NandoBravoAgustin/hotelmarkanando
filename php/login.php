<div class="login__base">
	<form action="php/control.php" name="auntentificacion_frm" method="POST" enctype="application/x-www-form-urlencoded">
		<?php 
			error_reporting(E_ALL ^ E_NOTICE);
			if ($_GET["error-login"]=="si") {
				echo "<p>Usuario y/o contraseña equivocado</p><br><br>";
			} else {
				echo "<p>Introduce tus datos</p><br><br>";
			}
		 ?>
		Usuario: <input type="text" name="user_txt">
		Contraseña: <input type="password" name="password_txt">
		<input type="submit" name="entrar_btn" value="Iniciar Sesion">
	</form>
</div>