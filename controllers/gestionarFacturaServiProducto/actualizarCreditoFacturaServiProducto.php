<?php
 
 

	$idCredito   	 = $_POST['idCredito'];
	$total   	 	 = $_POST['total'];

	require_once('../../models/gestionarFacturaServiProducto/gestionarFacturaServiProductoDeUsuarios.php'); 

	actualizarCredito($idCredito ,$total);

?>