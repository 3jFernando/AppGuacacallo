<hr>
<b>LISTADO DE FACTURAS DE TIPÓ CREDITO <i id="mostarListadoFacturasTipoCreditoServiPorductos" style="display:none; color:blue;"> ~ver listado...</i><i id="ocultarListadoFacturasTipoCreditoServiPorductos" style=" color:red;"> ~Ocultar listado...</i></b>
<table class="table table-hover ListadoFacturasTipoCreditoServiPorductos">

			<tr class="info">
				<th>NIT</th>
				<th>TP.PAGO</th>
				<th>TP.MOV</th>
				<th>FECHA</th>
				<th>VALOR.T</th>
				<th>USUARIO</th>
				<th>FECHA.V</th>
				<th>VALOR.D</th>
				<th>GESTIONAR</th>
			</tr>
	<?php 

		$documento = $_POST['documento'];
		require_once('../../models/gestionarFacturaServiProducto/gestionarFacturaServiProductoDeUsuarios.php'); 

			$getUsuario = getUsuarioGestionarFacturasCreditoServiProductos($documento);

			$i = 0;
		  	if ($i < count($getUsuario) ) {
		  		
		  	for($i = 0; $i < count($getUsuario); $i++) {
		    	$items = $getUsuario[$i];

		    $valorDeuda = $items['Valor_Total_Deuda'];		
			echo 
			"
			<tr>
				<td>".$items['Id_Credito']."</td>
				<td>".$items['Nombre_Tipo_Pago']."</td>
				<td>".$items['Nombre_Tipo_Movimiento']."</td>
				<td>".$items['Fecha_Factura']."</td>
				<td>$".$items['Valor_Total_Factura']."</td>
				<td>".$items['Nombre_Usuario']."</td>
				<td>".$items['Fecha_Vencimiento_Credito']."</td>
				";
				if($valorDeuda == 0) { 
					echo "<td style='color:blue;'>$".$items['Valor_Total_Deuda']."</td>";
				} else { 
					echo "<td style='color:red;'>$".$items['Valor_Total_Deuda']."</td>";
				}
				if($valorDeuda == 0) { 
					echo 
					"<td>
						<a href='#' class='btn btn-primary btn-xs' disabled='disabled'>PAGADO</a>
						<a href='#' class='btn btn-warning btn-xs VerAbonosCreditoPagadoFacturaServiProdcutos' id='VerAbonosCreditoPagadoFacturaServiProdcutos'
						Id_Credito='".$items['Id_Credito']."'
						>VER.ABNS</a>
					</td>";
				} else { 
					echo 
					"
					<td><a href='#' class='btn btn-danger btn-xs gestionarFacturaCredito' id='gestionarFacturaCredito'
						Id_Credito='".$items['Id_Credito']."'
						Valor_Total_Factura='".$items['Valor_Total_Factura']."'
						Valor_Total_Deuda='".$items['Valor_Total_Deuda']."'
						fecha='".$items['Fecha_Vencimiento_Credito']."'
						> GESTIONAR CREDITO </a>
					</td>
					";
				}
			"</tr>
			";

		}
		} else {

			echo "<br><m style='color:red;'>No se han encontrado resultados para</m>".$documento;

		}	

	?>
</table>




