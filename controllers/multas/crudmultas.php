
<table class="table table-hover">

			<tr class="info">
				<th>NIT</th>
				<th>nombre multa</th>
				<th>valor tipo multa</th>
				
				<th>ACCION</th>
			</tr>
	<?php 

		require_once('../../models/multas/multas.php'); 

		$lista = listado();

		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];
			echo 
			"
			<tr>
				<td>".$items["Id_Tipo_Multa"]."</td>
				<td>".$items["Nombre_Multa"]."</td>	
				<td>".$items["Valor_Tipo_Multa"]."</td>
				
				<td>
				<button class='actualizar-tipomulta btn btn-primary btn-xs'
				Id_Tipo_Multa='".$items["Id_Tipo_Multa"]."'
				Nombre_Multa='".$items["Nombre_Multa"]."'
				Valor_Tipo_Multa='".$items["Valor_Tipo_Multa"]."'
				
				>X Actualizar 
				</button>
								
				</td>			
			</tr>
			";

		}	

	?>
</table>
