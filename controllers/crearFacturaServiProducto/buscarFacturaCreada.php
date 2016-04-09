<?php 

		require_once('../../models/crearFacturaServiProducto/crearFacturaServiProducto.php'); 
		$factura = buscarFacturaCreada();

		$i = 0;
		for($i = 0; $i < count($factura); $i++) {
		    $item = $factura[$i];
		    echo $item["Id_Factura"];
		}

?>
