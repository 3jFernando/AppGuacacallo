<?php

	$Id_Detalle_Factura		  = $_POST['Id_Detalle_Factura'];
  	
  	require_once('../../models/crearFacturaServiProducto/crearFacturaServiProducto.php');

	eliminarServiProducto($Id_Detalle_Factura);

?>