<?php 
	function conectar(){
		
		$servidor ="baojc1qggljknvzecytk-mysql.services.clever-cloud.com";
		$usuario="ugbeouezzukoybhb";
		$password="n61wfg8XrdsbyN77sQ1F";
		$bd="baojc1qggljknvzecytk";

		$conectar = new mysqli($servidor,$usuario,$password,$bd) or die("No se pudo conector al Servidor");
			
			return $conectar;

	}
	
	$conectar = conectar();
	

 ?>