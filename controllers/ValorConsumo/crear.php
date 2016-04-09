<?php

	$nombrevalor  	 = $_POST['nombrevalor'];
	$valorconsumo    = $_POST['valorconsumo'];
	

	require_once('../../models/ValorConsumo/valorconsumo.php');

	insertar($nombrevalor, $valorconsumo);

?>