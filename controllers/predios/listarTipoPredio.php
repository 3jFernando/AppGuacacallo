<?php 

		require_once('../../models/predio/predio.php'); 

		$lista = listadoTiposPredios();

		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];
			echo "<option id='tipo_predio_usuarios' value='".$items['Id_Tipo_Predio']."'
				selected> 
					".$items['Nombre_Tipo_Predio']."
				</option>";

		}

?>