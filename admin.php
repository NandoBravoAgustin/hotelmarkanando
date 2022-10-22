<?php
	error_reporting(E_ALL ^ E_NOTICE);//excluye las noticias

 include ("php/sesion.php");
  ?>
<?php 

$op = $_GET["op"];
switch ($op) {
	case 'login':
		$login = "php/login.php";
		$title = "Iniciar sesion";
		break;
	case 'create-room':
		$login = "php/create_room.php";
		break;
	case 'eliminate-room':
		$login = "php/eliminate_room.php";
		break;
	default:
		$login = "php/home.php";
		$title = "Nando";
		break;
};


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modo Administrador</title>
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
				<li><a href="php/salir.php">EXIT</a></li>

			</ul>
		</nav>
		<div class="menu">
			<img src="img/menu.png" alt="">
		</div>
		<a href="" class="reservation">RESERVATION</a>
	</header>
	<main>
		<!-- <a href="" class="reservation mobile">RESERVATION</a> -->
		
				


		<section id="hero">
			
			<div class="hero__base">
				<h1>The perfect Hotel in Buenos Aires</h1>
				<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur sapiente labore fugit error distinctio sed nulla, ratione accusantium.</span>
				<button>BOOK YOUR STAY</button>
			</div>		
		</section>

			<?php include $login; ?>	
		<section id="rooms">
				<a class="op_room" href="?op=create-room#create-room"><span>+</span> Create room</a>
				<a class="op_room" href="?op=eliminate-room#eli-room" id="eli-room"><span>-</span> Eliminate Room</a>
			<div class="rooms__base" id="room">
				
				<?php include ("php/query-room.php"); ?>
				






			</div>
		</section>	

		<section id="services">
			
		</section>
	</main>
	<script src="scripts.js"></script>
</body>
</html>
