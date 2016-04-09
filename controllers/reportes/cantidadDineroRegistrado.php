<?php 

		require_once('../../models/reportes/reportes.php'); 

		$verCantidad = cantidadDineroRegistrado();

		for($i = 0; $i < count($verCantidad); $i++) {

			$items = $verCantidad[$i];
			echo $items["cantidad"];
			
		}	

?>