<?php 

		require_once('../../models/reportes/reportes.php'); 

		$verCantidad = cantidadFacturasRegistradas();

		for($i = 0; $i < count($verCantidad); $i++) {

			$items = $verCantidad[$i];
			echo $items["cantidad"];
		}	

?>