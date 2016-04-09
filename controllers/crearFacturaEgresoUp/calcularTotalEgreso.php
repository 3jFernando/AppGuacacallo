<table class="table">
<?php

	require_once('../../models/crearFacturaEgresoUp/facturaEgreso.php');
	$Id_Factura = $_POST['Id_Factura'];
	$factura    = calcularTotal($Id_Factura);

	$i = 0;
		for($i = 0; $i < count($factura); $i++) {
		   $item = $factura[$i];
		   if(!$item["total"] == 0 || !$item["total"] == '') {
				 echo
				 "
				 <tr>
				 <td style='text-align:right;'>
				 	Total $<label id='totalDineroEgreso'>".$item["total"]."</label> Pesos</td>
				 </tr>
				 ";
			 } else {
				 echo
				 "
				 <tr>
				 <td style='text-align:right;'>
				 	Total $0 Pesos</td>
				 </tr>
				 ";
			 }
			}

	?>

</table>
