<a href="#" class="btn btn-primary btn-xl" id="btn-agregar-tipoPredio" accion="1"> + Agregar Tipo Predio</a> 
<br>        
<hr>
<m style="color:red; font-size:12px;">Nota: Recuerde que los Tipos de Predios que esten asignados al Predio de un Usuario no podran ser eliminados</m>
<table class="table table-hover">

			<tr class="info">
				<th>NIT </th>
				<th>NOMBRE</th>
				<th>ACCION</th>
			</tr>
	<?php 

		require_once('../../models/tipoPredio/tipoPredio.php'); 

		$lista = listado();

		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];
			echo 
			"
			<tr>
				<td>".$items["Id_Tipo_Predio"]."</td>
				<td>".$items["Nombre_Tipo_Predio"]."</td>	
				<td>
				<button class='eliminar btn btn-danger btn-xs' 
				tipoPredio-id='".$items["Id_Tipo_Predio"]."'>X Eliminar 
				</button>					
				</td>			
			</tr>
			";

		}	

	?>
</table>

