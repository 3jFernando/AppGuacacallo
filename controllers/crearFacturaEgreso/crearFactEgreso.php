<?php

	$valor = $_POST['valor'];

	require_once('../../models/crearFacturaEgreso/facturaEgreso.php');

	crearFactEgreso($valor);

?>