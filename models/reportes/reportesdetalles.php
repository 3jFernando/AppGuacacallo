<?php 

	function listartipospagos() {
		require_once('../../configs/conexion.php'); 

		$consulta = mysqli_query($conexion, "SELECT fac.Fecha_Factura,SUM(fac.Valor_Total_Factura) as suma,
			pago.Nombre_Tipo_Pago from tipo_pago as pago inner join factura as fac on fac.Id_Tipo_Pago=pago.Id_Tipo_Pago GROUP by Nombre_Tipo_Pago") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();
            $items["Nombre_Tipo_Movimiento"] = $columnas['Nombre_Tipo_Movimiento']; 
			$items["Valor_Total_Factura"] 	 = $columnas['SUMA'];

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;	
	};

?>