<?php 

		require_once('../../models/reunion/reunion.php'); 

		$lista = SelectReunionesRegistradas();

		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];
			echo "<option  value='".$items['Id_Detalle_Reunion']."' selected> 
					".$items['Nombre_Reunion']."
				</option>";

		}

?>