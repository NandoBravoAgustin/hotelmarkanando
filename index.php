<?php 
	error_reporting(E_ALL ^ E_NOTICE);

$op = $_GET["op"];
switch ($op) {
	case 'login':
		$login = "php/login.php";
		$title = "Iniciar sesion";
		break;
	
	default:
		$login = "php/home.php";
		$title = "Nando";
		break;
}
$modulo = isset($_REQUEST["modulo"])?$_REQUEST["modulo"]:'';
if ($modulo == "habitacion" || $modulo == "") {
	include_once "php/habitacion.php";
};
if ($modulo == "detallehabitacion") {
	include_once 'php/detallehabitacion.php';
}
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>nando</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<header id="header">
		<nav>
			<h2 class="title">Kadgar Hotel</h2>
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li><a href="">ROOMS</a></li>
				<li><a href="">AMENITIES</a></li>
				<li><a href="">CONTACT</a></li>
				<li><a href="?op=login">LOGIN</a></li>

			</ul>
		</nav>
		<div class="menu">
			<img src="img/menu.png" alt="">
		</div>
		<a href="" class="reservation">RESERVATION</a>
	</header>
	<main>
		<!-- <a href="" class="reservation mobile">RESERVATION</a> -->
		
			<?php include $login; ?>	
				


		<section id="hero">
			
			<div class="hero__base">
				<h1>The perfect Hotel in Buenos Aires</h1>
				<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur sapiente labore fugit error distinctio sed nulla, ratione accusantium.</span>
				<button>BOOK YOUR STAY</button>
			</div>		
		</section>

		<section id="rooms">
			<div class="rooms__base">
				
				<?php include ("php/query-room.php"); ?>
				






			</div>
		</section>	

		<section id="services">
			
		</section>
	</main>
	<script src="scripts.js"></script>
</body>
</html>
