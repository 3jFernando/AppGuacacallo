<?php

	$idFactura 	= $_POST['idFactura'];
	$idSerProd 	= $_POST['idSerProd'];
	$valor 		= $_POST['valor'];
	$cantidad 	= $_POST['cantidad'];

	require_once('../../models/crearFacturaEgreso/facturaEgreso.php');

	crearDetalleFacturaEgreso($idFactura, $idSerProd, $valor, $cantidad);

?>