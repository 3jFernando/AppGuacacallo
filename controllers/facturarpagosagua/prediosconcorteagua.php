<div class="highlight"> 
<a href="#" id="btnImprimirSocios"  class="btn btn-success pull-right"   onClick="printdiv('contenidospredioscorteagua');" ><span class="glyphicon glyphicon-print"></span> imprimir reporte</a>
</div>
<br>
 
<hr>
<div id="contenidospredioscorteagua">

<h5>Listado de predios con corte de agua</h5>
<table class="table table-hover">

			<tr class="info">
			<th>NIT </th>
				<th>Tipo Predio</th>
				<th>Usuario</th>
				<th>Doc Identidad</th>
				<th>Nombre Predio</th>
				<th>Fecha Ingreso</th>
				<th>Fecha Corte</th>
				
			</tr>
	<?php 

		require_once('../../models/facturarpagosagua/prediosconcorteagua.php'); 

		$lista = listado();

			for($i = 0; $i < count($lista); $i++) {

				$items = $lista[$i];
				echo 
			"
				<tr>
					<td>".$items["Id_Predio_Usuario"]."</td>
					<td>".$items["Nombre_Tipo_Predio"]."</td>
					<td>".$items["Nombre_Usuario"]. " " .$items["Apellido_Usuario"]."</td>
					<td>".$items["Documento_Usuario"]."</td>
					<td>".$items["Nombre_Predio"]."</td>
					<td>".$items["Fecha_Inscripcion"]."</td>
					<td>".$items["Fecha_Suspension_Predio"]."</td>
							
				</tr>
				";

			}	
		

	?>
</table>

</div>