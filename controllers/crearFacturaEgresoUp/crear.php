<?php

	$cNombre 				= $_POST['cNombre'];
	$cValor 				= $_POST['cValor'];
	$cCantidad 			= $_POST['cCantidad'];
	$cDescripcion 	= $_POST['cDescripcion'];
	$Id_Factura			= $_POST['Id_Factura'];

	require_once('../../models/crearFacturaEgresoUp/facturaEgreso.php');

	crearFactEgreso($cNombre,$cValor,$cCantidad,$cDescripcion,$Id_Factura);

?>
