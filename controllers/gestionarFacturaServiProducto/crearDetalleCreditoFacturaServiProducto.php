<?php
 
	$idCredito   	 = $_POST['idCredito'];
	$valTotalAvono   = $_POST['valTotalAvono'];
	$fecha   		 = $_POST['fecha'];

	require_once('../../models/gestionarFacturaServiProducto/gestionarFacturaServiProductoDeUsuarios.php'); 

	insertar($idCredito, $valTotalAvono, $fecha);

?>