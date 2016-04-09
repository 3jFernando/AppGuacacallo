<?php 

		require_once('../../models/reportes/reportes.php'); 

		$verCantidad = cantidadDineroDeveRegistrado();

		for($i = 0; $i < count($verCantidad); $i++) {

			$items = $verCantidad[$i];
			if($items["cantidad"] > 0) {
				echo $items["cantidad"];
			} else {
				echo 0;
			}
		}	

?>