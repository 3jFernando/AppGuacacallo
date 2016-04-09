<?php 

		require_once('../../models/crearFacturaEgreso/facturaEgreso.php'); 
		$seriProducto = buscarServiProducto();

		$i = 0;
		for($i = 0; $i < count($seriProducto); $i++) {
		    $item = $seriProducto[$i];
		    echo $item["Id_Servi_Producto"];
		}

?>