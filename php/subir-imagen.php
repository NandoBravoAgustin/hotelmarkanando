<?php 

$imagen = $_FILES["imagen_fls"]["tmp_name"];
$destino_imagen = "".$_FILES["imagen_fls"]["name"];

if ($_FILES["imagen_fls"]["type"] =="image/jpeg") {
		move_uploaded_file($imagen, $destino_imagen);
		

	}
	
 ?>