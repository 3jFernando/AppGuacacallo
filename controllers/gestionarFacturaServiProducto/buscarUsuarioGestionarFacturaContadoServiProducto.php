
<hr>
<b>LISTADO DE FACTURAS DE TIPÓ CONTADO <i id="mostarListadoFacturasTipoContadoServiPorductos" style="color:blue;"> ~ver listado...</i><i id="ocultarListadoFacturasTipoContadoServiPorductos" style="display:none; color:red;"> ~Ocultar listado...</i></b>
<table class="table table-hover ListadoFacturasTipoContadoServiPorductos" style="display:none;" >

			<tr class="info">
				<th>NIT</th>
				<th>TP.PAGO</th>
				<th>TP.MOV</th>
				<th>FECHA</th>
				<th>VALOR.T</th>
				<th>USUARIO</th>
			</tr>
	<?php 

		$documento = $_POST['documento'];
		require_once('../../models/gestionarFacturaServiProducto/gestionarFacturaServiProductoDeUsuarios.php'); 

			$getUsuarioFactura = getUsuarioGestionarFacturasContadoServiProductos($documento);

			$i = 0;
		  	if ($i < count($getUsuarioFactura) ) {
		  		
		  	for($i = 0; $i < count($getUsuarioFactura); $i++) {
		    	$items = $getUsuarioFactura[$i];
			echo 
			"
			<tr>
				<td>".$items['Id_Factura']."</td>
				<td>".$items['Nombre_Tipo_Pago']."</td>
				<td>".$items['Nombre_Tipo_Movimiento']."</td>
				<td>".$items['Fecha_Factura']."</td>
				<td>$".$items['Valor_Total_Factura']."</td>
				<td>".$items['Nombre_Usuario']."</td>
			</tr>
			";

			}
		} else {

			echo "<br><m style='color:red;'>No se han encontrado resultados para</m>".$documento;

		}	

	?>
</table>
