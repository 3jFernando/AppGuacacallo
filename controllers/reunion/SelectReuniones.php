<?php 

		require_once('../../models/reunion/reunion.php'); 

		$lista = SelectReuniones();

		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];
			echo "<option id='selectasistencia' value='".$items['Nombre_Reunion']."'
				selected> 
					".$items['Nombre_Reunion']."
				</option>";

		}

?>