<?php
	$idPredio     = $_POST['idPredio'];

	// echo "idpredio: ".$idPredio ;

	require_once('../../models/predio/predio.php');
	eliminar($idPredio);

?>