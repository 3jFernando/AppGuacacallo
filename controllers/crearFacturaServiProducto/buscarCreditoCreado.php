<?php 

		require_once('../../models/crearFacturaServiProducto/crearFacturaServiProducto.php'); 
		$credito = buscarCreditoCreado();

		$i = 0;
		for($i = 0; $i < count($credito); $i++) {
		    $item = $credito[$i];
		    echo $item["Id_Credito"];
		}

?>
