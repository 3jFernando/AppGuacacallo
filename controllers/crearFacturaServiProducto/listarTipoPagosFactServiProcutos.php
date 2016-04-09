<?php 

	require_once('../../models/crearFacturaServiProducto/crearFacturaServiProducto.php');

	$lista = listadoTiposPagosFactServiPorductos();

	for($i = 0; $i < count($lista); $i++) {

		$items = $lista[$i];
		echo "<option id='tipo_pago_factServiPorcutos' value='".$items['Id_Tipo_Pago']."'
				selected> 
				".$items['Nombre_Tipo_Pago']."
			</option>";

		}

?>