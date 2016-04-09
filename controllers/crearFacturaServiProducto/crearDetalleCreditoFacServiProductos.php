<?php

	$idCredito							= $_POST['idCredito'];
	$valorAvonoFactCredito 				= $_POST['valorAvonoFactCredito'];
	$fechaAvonoFactCredito 				= $_POST['fechaAvonoFactCredito'];

	require_once('../../models/crearFacturaServiProducto/crearFacturaServiProducto.php');
	
	crearFacturaDetalleCreditoServiProductos($idCredito,$valorAvonoFactCredito,$fechaAvonoFactCredito);

?>