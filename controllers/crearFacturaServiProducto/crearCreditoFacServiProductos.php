<?php

	$IdFactCredito 				= $_POST['IdFactCredito'];
	$fechaFactCredito 			= $_POST['fechaFactCredito'];
    $fechaVencFactCredito		= $_POST['fechaVencFactCredito'];
    $valorTotFactCredito		= $_POST['valorTotFactCredito'];
    $valorTotDeudaFactCredito	= $_POST['valorTotDeudaFactCredito'];

	require_once('../../models/crearFacturaServiProducto/crearFacturaServiProducto.php');
	
	crearFacturaCreditoServiProductos($IdFactCredito,$fechaFactCredito,$fechaVencFactCredito,$valorTotFactCredito,$valorTotDeudaFactCredito);

?>