<hr>
<b>LISTADO DE MULTAS POR USUARIOS</b>
<table class="table table-hover">

			<tr class="info">
				<th>NIT</th>
				<th>USUARIO</th>
				<th>MULTA</th>
				<th>FECHA</th>
				<th>$VALOR</th>
				<th>ESTADO</th>
				<th>ACCION</th>
			</tr>
	<?php 

		
			$documento = $_POST['documento'];
			require_once('../../models/multas/multas.php'); 
			$getUsuario = getUsuarioMultas($documento);

			$i = 0;
		  	if ($i < count($getUsuario) ) {
		  		
		  	for($i = 0; $i < count($getUsuario); $i++) {
		    	$items = $getUsuario[$i];

		   	$estado = $items['Estado'];
		   	if($estado == 0) {
		   		$estadoActual = "Por pagar";		   		
		   	} else {
		   		$estadoActual = "Pagada";
		   	}

			echo 
			"
			<tr>
				<td>".$items['Id_Multa']."</td>
				<td>".$items['Nombre_Usuario']."</td>
				<td>".$items['Nombre_Multa']."</td>
				<td>".$items['Fecha_Multa']."</td>
				<td>$".$items['Valor_Multa']."</td>
				<td>".$estadoActual."</td>
				";
				if($estadoActual == "Por pagar") {
					echo "<td>
					<a href='#' class='pagarModuloMulta btn btn-xs btn-warning'
					Id_Multa='".$items['Id_Multa']."'
					Fecha_Multa='".$items['Fecha_Multa']."'
					Valor_Multa='".$items['Valor_Multa']."'
					Id_Usuario='".$items['Id_Usuario']."'
					Nombre_Usuario='".$items['Nombre_Usuario']."'
					>PAGAR.MULTA</a>
					</td>";
				} else {
					echo "<td><a href='#' disabled='disabled' class='btn btn-xs btn-primary'>MULTA.PAGAD</a></td>";
				}
				"
			</tr>
			";

			}
		} else {

			echo "<br><m style='color:red;'>No se han encontrado resultados para</m>".$documento;

		}	

	?>
</table>
