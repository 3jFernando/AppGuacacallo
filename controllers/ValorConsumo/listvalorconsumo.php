<div class="highlight"> 
<a href="#" class="btn btn-primary btn-xl" id="btn-agregar-valor" > <span class="glyphicon glyphicon-plus"></span> Agregar Valor Consumo</a> 
  
<button type="button" class="btn btn-success pull-right" id="imprimirvalorconsumo"><span    class="glyphicon glyphicon-print"></span> imprimir reporte </button>
</div>



     
<hr>
<table class="table table-hover">

			<tr class="info">
				<th>NIT</th>
				<th>Nombre</th>
				<th>Valor</th>
				<th>Accion</th>
			
			</tr>
	<?php 

		require_once('../../models/ValorConsumo/valorconsumo.php'); 

		$lista = listado();

		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];
			echo 
			"
			<tr>
				<td>".$items["Id_Valor_Consumo"]."</td>
				<td>".$items["Nombre_Valor"]."</td>	
				<td>".$items["Valor"]."</td>
				
				<td>
				
				<button class='eliminar-valor btn btn-danger btn-xs'
				Id_Valor_Consumo='".$items["Id_Valor_Consumo"]."' id='Id_Valor_Consumo'
				>  <span class='glyphicon glyphicon-remove'></span>  Eliminar 
				</button>					
				</td>			
			</tr>
			";

		}	

	?>
</table>
