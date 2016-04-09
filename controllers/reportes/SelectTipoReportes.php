<?php 

		require_once('../../models/reportes/reportes.php'); 

		$lista = SelectTipoReportes();

		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];
            echo "<option id='SelectTipoReportes' value='".$items['Id_Tipo_Movimiento']."'
				selected> 
			".$items['Nombre_Tipo_Movimiento']."--".$items['Id_Tipo_Movimiento']."
				</option>";

		}

?>