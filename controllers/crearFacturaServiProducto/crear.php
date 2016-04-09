<?php

	$idtipoPagoFacturaServiPorductos 	= $_POST['idtipoPagoFacturaServiPorductos'];
	$Id_Usuario 					 	= $_POST['Id_Usuario'];
	$fecha_factura  				 	= $_POST['fecha_factura']; 

	require_once('../../models/crearFacturaServiProducto/crearFacturaServiProducto.php');
	insertar($idtipoPagoFacturaServiPorductos, $fecha_factura, $Id_Usuario);

?>