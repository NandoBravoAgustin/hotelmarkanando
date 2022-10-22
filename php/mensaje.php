<?php 
if (isset($_GET["mensaje"])) {
	$mensaje = $_GET["mensaje"];
	echo "<p class='mensaje'>$mensaje</p>";
}
 ?>