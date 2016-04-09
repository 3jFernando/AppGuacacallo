<?php

	$nombre  	 = $_POST['nombre'];

	require_once('../../models/tipoPredio/tipoPredio.php');

	insertar($nombre);

?>