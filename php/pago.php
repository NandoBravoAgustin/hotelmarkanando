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


 ?>

<?php 
	require __DIR__ .  '/../mercadopago/vendor/autoload.php';
	MercadoPago\SDK::setAccessToken('TEST-2598719965489646-100713-482299034c6ec5e99e5e814b4ca7bad2-291547864');
	$preference = new MercadoPago\Preference();

	$item = new MercadoPago\Item();
	$item->title = "'Reservar '.$room.' por '.$dias.' noches'";
	$item->quantity = 1;
	$item->unit_price = $total;
	$item->description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, id ipsa voluptatem velit neque officia sit culpa saepe natus, perspiciatis molestiae veniam harum numquam explicabo exercitationem sint consectetur iure quas?";
	$item->currency_id = 'ARS';
	$preference->items = array($item);
	$preference->back_urls = array(
		'success' => 'http://localhost/hotel/php/reservar.php?room='.$room.'&fecha_ida='.$fecha_ida.'&fecha_vuelta='.$fecha_vuelta.'&num_personas='.$num_personas.'&price='.$price.'&cliente='.$cliente.'&dni='.$dni.'&total='.$total.'&dias='.$dias
	);
	
	$preference->save();

 ?>










<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
 	<script src="https://sdk.mercadopago.com/js/v2"></script>

</head>
<body>
	<section id="confirmacion">
		<h3>Confirmacion</h3>
		<span><b>Habitacion : </b><?php echo $room; ?></span><br>
		<span><b>Tu nombre : </b><?php echo $cliente; ?></span><br>
		<span><b>Tu DNI : </b><?php echo $dni; ?></span><br>
		<span><b>Fecha de ida : </b><?php echo $fecha_ida; ?></span><br>
		<span><b>Fecha de vuelta : </b><?php echo $fecha_vuelta; ?></span><br>
		<span><b>Noches : </b><?php echo $dias; ?></span><br>
		<span><b>Cantidad de personas : </b><?php echo $num_personas; ?></span><br>
		<span><b>Precio por noche : </b><?php echo $price; ?></span><br>

		<span><b>Precio total : </b><?php echo $total; ?></span><br>
		<div class="cho-container"></div>
	</section>
	<script>
	  const mp = new MercadoPago('TEST-8e72af5b-1fb5-43f1-93d6-9094b93240d1', {
	    locale: 'es-AR'
	  });

	  mp.checkout({
	    preference: {
	      id: '<?php echo $preference->id ?>'
	    },
	    render: {
	      container: '.cho-container',
	      label: 'Paga con mp',
	    }
	  });
	</script>
</body>
</html>