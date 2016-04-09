 <table class="table table-hover">

			<tr class="info">
				<th>NOMBRE</th>
				<th>VALOR</th>
				<th>USUARIO</th>
				<th>FECHA</th>
				<th>ACCION</th>
			</tr>
	<?php 

		require_once('../../models/crearFacturaServiProducto/crearFacturaServiProducto.php'); 
		$Id_Factura = $_POST['Id_Factura'];		
		$productoServicio = listarServiProductosFactura($Id_Factura);

		$i = 0;
		if ($i < count($productoServicio) ) {
		  		
			for($i = 0; $i < count($productoServicio); $i++) {
				$items = $productoServicio[$i];	
				echo 
				"
				<tr>
					<td>".$items["Nombre_Servi_Producto"]."</td>
					<td>".$items["Valor_Servi_Producto"]."</td>
					<td>".$items["Nombre_Usuario"]." ".$items["Apellido_Usuario"]."</td>
					<td>".$items["Fecha_Factura"]."</td>
					<td>			
					<button class='eliminar-productoServicioFactura btn btn-danger btn-xs'
					Id_Detalle_Factura='".$items["Id_Detalle_Factura"]."'
					>X Eliminar 
					</button>					
					</td>			
				</tr>";
			}
		} else {

			echo "<b>No hay productos registrados aun.</b>";

		}


	?>
</table>
<a href='#' class='btn btn-primary btn-xl' id='terminar-FacturacionServiProductos'>Terminar proceso.</a>    	

