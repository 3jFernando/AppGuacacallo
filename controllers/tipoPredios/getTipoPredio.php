<a href="#" class="btn btn-primary btn-xl" id="btn-agregar-tipoPredio" accion="1"> + Agregar Tipo Predio</a> 
<br>        
<hr>
<table class="table table-hover">

			<tr class="info">
				<th>NIT </th>
				<th>NOMBRE</th>
				<th>ACCION</th>
			</tr>
	<?php 

		require_once('../../models/tipoPredio/tipoPredio.php'); 
		$nombre = $_POST['nombre'];

			$tipoPredio = getTipoPredio($nombre);

			$i = 0;
		  	if ($i < count($tipoPredio) ) {
		  		
		  	for($i = 0; $i < count($tipoPredio); $i++) {
		    	$items = $tipoPredio[$i];	 
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
		} else {

			echo "No se han encontrado resultados para ".$nombre;

		}

	?>
</table>

