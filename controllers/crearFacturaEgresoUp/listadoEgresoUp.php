<table class="table table-hover">

		 <tr class="info">
			 <th>ID</th>
			 <th>NOMBRE</th>
			 <th>CANTIDAD</th>
			 <th>VALOR</th>
			 <th>DESCRIPCION</th>
		 </tr>
 <?php

	 require_once('../../models/crearFacturaEgresoUp/facturaEgreso.php');
	 $Id_Factura = $_POST['Id_Factura'];
	 $productoServicio = listarServiProductosFactura($Id_Factura);

	 $i = 0;
	 if ($i < count($productoServicio) ) {

		 for($i = 0; $i < count($productoServicio); $i++) {
			 $items = $productoServicio[$i];
			 echo
			 "
			 <tr>
				 <td>".$items['Id_Egresos']."</td>
				 <td>".$items['Nombre_Producto_Egreso']."</td>
				 <td>".$items['Cantidad_Producto']."</td>
				 <td>".$items['Valor_Unitrario']."</td>
				 <td>".$items['Descripcion_Productos']."</td>
			 </tr></tr>
			 ";
		 }
	 } else {

		 echo "<b>No hay Datos</b>";

	 }


 ?>

</table>
