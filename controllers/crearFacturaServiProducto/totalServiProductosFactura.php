<hr>
<b style="color:blue; font-size:11px;">Nota: Este es el total de la suma de los servicios adquiridos hasta el momento</b>
<br>
<?php

	require_once('../../models/crearFacturaServiProducto/crearFacturaServiProducto.php'); 
	$Id_Factura = $_POST['Id_Factura'];
	$factura    = calcularTotalServiProductosAgregados($Id_Factura);

	$i = 0;
		for($i = 0; $i < count($factura); $i++) {
		   $item = $factura[$i];
		   echo "<b style='color:blue; font-family:calibry;'>TOTAL: $ <input type='text' style='width:90px; text-align:center; background:blue; color:white; border:0px;' id='totalValorCapturado' value='".$item["total"]."' disabled='disabled'> PESOS.</b>";
			}

	?>

