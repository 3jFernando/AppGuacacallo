<?php 

		require_once('../../models/usuario/usuario.php'); 

		$verCantidad = cantidadUsuariosRegistrados();

		for($i = 0; $i < count($verCantidad); $i++) {

			$items = $verCantidad[$i];
			echo $items["cantidad"];
		}	

?>