<hr>
<h5><b>TOTAL DE INGRESOS POR TIPO DE MOVIMIENTO</b></h5>

<table class="table table-hover" >

	<tr class="success" >
	<th>INGRESOS</th>
	<th>VALOR TOTAL</th>
	</tr>
	
	<?php 
	require_once('../../models/reportes/reportes.php'); 
      
		$lista = listartipospagos();
        
		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];
			echo 
			"
			<tr>
			<td>".$items["Nombre_Tipo_Pago"]."</td>
			<td>$".$items["Valor_Total_Factura"]."</td>
			</tr>
			";
		}
	?>
	
</table>
