<?php 
function intervalo_reserva($fecha){
	$dia = date("d",strtotime($fecha));
	$mes = date("m",strtotime($fecha));
	$año = date("Y",strtotime($fecha));
	echo $año."-".$mes."-".$dia."<br>";
};

 ?>