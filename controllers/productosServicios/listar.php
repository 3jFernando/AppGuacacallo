<a href="#" class="btn btn-primary btn-xl" id="btn-agregar-productoServicio" accion="1"> + Agregar Producto Servicio</a> 
<br>        
<hr>
<table class="table table-hover">

			<tr class="info">
				<th>NIT</th>
				<th>NOMBRE</th>
				<th>DESCRIPCION</th>
				<th>VALOR</th>
				<th>ACCION</th>
			</tr>
	<?php 

		require_once('../../models/productoServicio/productoServicio.php'); 

		$lista = listado();

		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];
			echo 
			"
			<tr>
				<td>".$items["Id_Servi_Producto"]."</td>
				<td>".$items["Nombre_Servi_Producto"]."</td>	
				<td>".$items["Descripcion"]."</td>
				<td>$ ".$items["Valor_Servi_Producto"]."</td>	
				<td>
				<button class='actualizar-productoServicio btn btn-primary btn-xs'
				Id_Servi_Producto='".$items["Id_Servi_Producto"]."'
				Nombre_Servi_Producto='".$items["Nombre_Servi_Producto"]."'
				Descripcion='".$items["Descripcion"]."'
				Valor_Servi_Producto='".$items["Valor_Servi_Producto"]."'
				>X Actualizar 
				</button>
				<button class='eliminar-productoServicio btn btn-danger btn-xs'
				Id_Servi_Producto='".$items["Id_Servi_Producto"]."'
				>X Eliminar 
				</button>					
				</td>			
			</tr>
			";

		}	

	?>
</table>
