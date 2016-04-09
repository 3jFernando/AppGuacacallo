<a href="#" class="btn btn-primary btn-xl" id="btn-agregar-reunion" accion="1"> + Agregar Reunion</a> 
<br>        
<hr>
<table class="table table-hover">

			<tr class="info">
				<th>NIT</th>
				<th>NOMBRE</th>
				<th>DESCRIPCION</th>
				<th>FECHA</th>
				<th>ACCION</th>
			</tr>
	<?php 

		require_once('../../models/reunion/reunion.php'); 

		$lista = listado();

		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];
			echo 
			"
			<tr>
				<td>".$items["Id_Detalle_Reunion"]."</td>
				<td>".$items["Nombre_Reunion"]."</td>	
				<td>".$items["Detalle_Reunion"]."</td>
				<td>".$items["Fecha_Reunion"]."</td>	
				<td>
				<button class='actualizar-reunion btn btn-primary btn-xs'
				Id_Detalle_Reunion='".$items["Id_Detalle_Reunion"]."'
				Detalle_Reunion='".$items["Detalle_Reunion"]."'
				Nombre_Reunion='".$items["Nombre_Reunion"]."'
				Fecha_Reunion='".$items["Fecha_Reunion"]."'
				>X Actualizar 
				</button>
				<button class='eliminar-reunion btn btn-danger btn-xs'
				Id_Detalle_Reunion='".$items["Id_Detalle_Reunion"]."'
				>X Eliminar 
				</button>					
				</td>			
			</tr>
			";

		}	

	?>
</table>
