<?php

	$Id_Factura  		= $_POST['Id_Factura'];
    $totalValoCapturado = $_POST['totalValoCapturado'];       

	require_once('../../models/crearFacturaServiProducto/crearFacturaServiProducto.php');
	actualizarValorFactura($Id_Factura,$totalValoCapturado);

?>