<?php 

		require_once('../../models/reportes/reportes.php'); 

		$verificar = verFactVencidasDiaActual();

		for($i = 0; $i < count($verificar); $i++) {

			$items = $verificar[$i];
			echo $items["Id_Factura"];
		}	

?>