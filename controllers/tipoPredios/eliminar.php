<?php
	
	$tipoPredioId     = $_POST['tipoPredioId'];

	require_once('../../models/tipoPredio/tipoPredio.php');

	eliminar($tipoPredioId);
?>
