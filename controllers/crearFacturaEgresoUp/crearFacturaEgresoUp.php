<?php

	$fechaActual = $_POST['fechaActual'];
	$movimeinto  = $_POST['movimeinto'];

	require_once('../../models/crearFacturaEgresoUp/facturaEgreso.php');

	crearFact($movimeinto, $fechaActual);

?>
