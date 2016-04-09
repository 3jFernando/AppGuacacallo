<?php

	$nombre   = $_POST['nombre'];
	$detalle  = $_POST['detalle'];
	$valor    = $_POST['valor'];
	$tipo     = $_POST['tipo'];
	$cantidad = $_POST['cantidad'];

	require_once('../../models/crearFacturaEgreso/facturaEgreso.php');

	insertar($nombre,$detalle,$valor,$tipo,$cantidad);

?>