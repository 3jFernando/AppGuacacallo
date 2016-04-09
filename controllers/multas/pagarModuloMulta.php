<?php


	$Id_TipoPago  		= $_POST['Id_TipoPago'];
	$Id_TipoMovimiento  = $_POST['Id_TipoMovimiento'];
	$fechaCreacion  	= $_POST['fechaCreacion'];
	$valorMulta  		= $_POST['valorMulta'];
	$Id_Usuario  		= $_POST['Id_Usuario'];	

	require_once('../../models/multas/multas.php');

	crearFacturaModuloMultas($Id_TipoPago, $Id_TipoMovimiento, $fechaCreacion, $valorMulta, $Id_Usuario);

?>