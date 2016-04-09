<?php

	$valorServiProducto = $_POST['valorServiProducto'];
	$Id_Factura			= $_POST['Id_Factura'];
	$Id_Servi_Producto	= $_POST['Id_Servi_Producto'];

	require_once('../../models/crearFacturaServiProducto/crearFacturaServiProducto.php');

	agregarServiProducto($Id_Factura, $Id_Servi_Producto, $valorServiProducto);

?>