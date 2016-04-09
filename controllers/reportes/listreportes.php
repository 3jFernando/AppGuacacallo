<br>
<table class="table" id="tablaReportes">

			<tr class="info" >
				<th >VALOR TOTAL</th>
			</tr>
	<?php 

        $tipomovimiento 	= $_POST['tipomovimiento'];
       	$fechaminima 		= $_POST['fechaminima'];
       	$fechamaxima 		= $_POST['fechamaxima'];

       	require_once('../../models/reportes/reportes.php'); 

		$lista = listadoreportes($tipomovimiento,$fechaminima, $fechamaxima);
        
        $i = 0;
		if ($i < count($lista)) {

			for($i = 0; $i < count($lista); $i++) {

				$items = $lista[$i];
				$valorActual = $items["Valor_Total_Factura"];

				if($valorActual > 0 || $valorActual != '') {

				echo "<tr>
				<td>TOTAL DINERO: <m style='color:blue'>$".$valorActual."</m> PESOS.</td>
				</tr>
				";

				} else {

				echo "<tr><td style='color:black'><b>No se han encontrado resultados para el tipo de movimieno seleccionado:</b> 
				<p style='color:blue;'>Movimieno (".$tipomovimiento.")</p> 
				<b>Entre el rango de fechas seleccionado:</b>  <br>				
				<p style='color:blue;'>Rango: desde ".$fechaminima." hasta ".$fechamaxima."</p>
				<m style='color:orange;'>Asegurese de que las fechas que eligio sean las correctas.</m></td></tr>";
				}


			}

		} else { }	

	?>

</table>


