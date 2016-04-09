<a href="#" class="btn btn-primary btn-xl" id="btn-agregar-predio" accion="1"> + Agregar Predio</a> 
<br>       
<hr>
<table class="table table-hover">

			<tr class="info">
			<th>NIT </th>
				<th>Tipo Predio</th>
				<th>Usuario</th>
				<th>Nombre Predio</th>
				<th>Fecha</th>
				<th>Hectareas</th>
				<th>Valor Hectarea</th>
				<th>Valor Total</th>
				<th>Alcantarillado</th>
				<th>ACCION</th>
			</tr>
	<?php 

		require_once('../../models/predio/predio.php'); 

		$lista = listado();

			for($i = 0; $i < count($lista); $i++) {

				$items = $lista[$i];
				echo 
			"
				<tr>
					<td>".$items["Id_Predio_Usuario"]."</td>
					<td>".$items["Nombre_Tipo_Predio"]."</td>
					<td>".$items["Nombre_Usuario"]. " " .$items["Apellido_Usuario"]."</td>
					<td>".$items["Nombre_Predio"]."</td>
					<td>".$items["Fecha_Inscripcion"]."</td>
					<td>".$items["Tamano_Predio"]."</td>
					<td>".$items["Valor_Hectarea"]."</td>
					<td>".$items["Valor_Total"]."</td>	
					<td>".$items["Alcantarillado"]."</td>
					<td>
					<button  class='actualizar-predio btn btn-primary btn-xs' 
						Id_Predio_Usuario='".$items["Id_Predio_Usuario"]."'	
						Id_Tipo_Predio='".$items["Id_Tipo_Predio"]."'
						Id_Usuario='".$items["Id_Usuario"]."'
						Nombre_Predio='".$items["Nombre_Predio"]."'
						Fecha_Inscripcion='".$items["Fecha_Inscripcion"]."'
						Alcantarillado='".$items["Alcantarillado"]."'
						Id_Alcantarillado='".$items["Id_Alcantarillado"]."'
						Tamano_Predio='".$items["Tamano_Predio"]."'
						Valor_Hectarea='".$items["Valor_Hectarea"]."'
						Valor_Total='".$items["Valor_Total"]."'
						nombre_usuario_busqueda='".$items["Nombre_Usuario"]."'
						apellido_usuario_busqueda='".$items["Apellido_Usuario"]."'

						>Actualizar 
					</button>
					<button class='eliminar-predio btn btn-danger btn-xs' 
						Id_Predio_Usuario='".$items["Id_Predio_Usuario"]."'>Eliminar 
					</button>	
					</td>			
				</tr>
				";

			}	
		

	?>
</table>

