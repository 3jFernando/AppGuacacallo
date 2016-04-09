<?php 

		require_once('../../models/reportes/reportes.php'); 

		$verCantidad = cantidadDineroDeveMultasRegistrado();

		for($i = 0; $i < count($verCantidad); $i++) {

			$items = $verCantidad[$i];
			if($items["cantidad2"] > 0) {
				echo $items["cantidad2"];
			} else {
				echo 0;
			}
		}	

?>