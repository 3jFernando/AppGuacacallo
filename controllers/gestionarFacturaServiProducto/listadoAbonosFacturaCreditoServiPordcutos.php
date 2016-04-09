
<b>LISTADO ABONOS DE FACTURAS POR CREDITO</b>
<table class="table">

			<tr class="info">
				<th>NIT</th>				
				<th>VALOR ABONO</th>
				<th>FECHA</th>
			</tr>
	<?php 

		$idCredito = $_POST['idCredito'];
		require_once('../../models/gestionarFacturaServiProducto/gestionarFacturaServiProductoDeUsuarios.php'); 

			$getAbono = getAbonoCreditoFacturaServiProducto($idCredito);

			$i = 0;
		if ($i < count($getAbono) ) {
		  		
		  	for($i = 0; $i < count($getAbono); $i++) {
		    	$items = $getAbono[$i];	
			echo 
			"
			<tr>
				<td style='color:blue;'>".$items['Id_Detalle_Credito']."</td>
				<td style='color:blue;'>".$items['Valor_Abono']."</td>
				<td style='color:blue;'>".$items['Fecha_Abono']."</td>							
			</tr>
			";

			}
		} else {

			echo "<br><m style='color:red;'>Esta factura no tiene abonos aun.</m>";

		}	

	?>
</table>

<a href='#' class='btn btn-warning btn-xs ' id='ocultarListadoAbonosDeFactCreditoPagada' > ~Ocultar Listado</a>		
