<?php 

		require_once('../../models/productoServicio/productoServicio.php'); 

		$lista = SelectTipoProductos();

		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];
			echo "<option id='selecttipoproducto' value='".$items['Id_Tipo_Servi_Producto']."'
				selected> 
					".$items['NombreTipoServiProducto']."
				</option>";

		}

?>