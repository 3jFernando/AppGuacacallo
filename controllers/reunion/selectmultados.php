<?php 

		require_once('../../models/reunion/reunion.php'); 

		$lista = SelectMultados();

		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];
			echo "<option id='selectmultar'  value='".$items['Id_Tipo_Multa']."' selected> 
					".$items['Nombre_Multa']."
				</option>";

		}

?>