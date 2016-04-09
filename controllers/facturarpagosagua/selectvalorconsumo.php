<?php 

		require_once('../../models/facturarpagosagua/facturarpagosagua.php'); 

		$lista = SelectValorConsumo();

		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];
			echo "<option id='selectvalor' value='".$items['Id_Valor_Consumo']."'
				selected> 
					".$items['Nombre_Valor'].'---'.'$'.$items['Valor']."
				</option>";

		}

?>