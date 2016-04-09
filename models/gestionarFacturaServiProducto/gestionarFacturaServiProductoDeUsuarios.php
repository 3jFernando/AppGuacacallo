<?php 

	function getUsuarioGestionarFacturasCreditoServiProductos($documento) {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT 
				c.Id_Credito, 
				tp.Nombre_Tipo_Pago,
				tm.Nombre_Tipo_Movimiento,
				f.Fecha_Factura,
				c.Valor_Total_Factura, 
				u.Nombre_Usuario, 
				c.Fecha_Vencimiento_Credito, 
				c.Valor_Total_Deuda
				FROM credito AS c 
				INNER JOIN factura AS f ON c.Id_Factura = f.Id_Factura 
				INNER JOIN tipo_pago AS tp ON tp.Id_Tipo_Pago = f.Id_Tipo_Pago 
				INNER JOIN tipo_movimiento AS tm ON tm.Id_Tipo_Movimiento = f.Id_Tipo_Movimiento
				INNER JOIN usuario AS u ON u.Id_Usuario = f.Id_Usuario 
				WHERE u.Documento_Usuario = '$documento' AND tp.Nombre_Tipo_Pago = 'Credito'") or die(2);

		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();

			$items["Id_Credito"] 				= $columnas["Id_Credito"];
			$items["Nombre_Tipo_Pago"] 			= $columnas["Nombre_Tipo_Pago"];
			$items["Nombre_Tipo_Movimiento"] 	= $columnas["Nombre_Tipo_Movimiento"];
			$items["Fecha_Factura"] 			= $columnas["Fecha_Factura"];
			$items["Valor_Total_Factura"] 		= $columnas["Valor_Total_Factura"];
			$items["Nombre_Usuario"] 			= $columnas["Nombre_Usuario"];
			$items["Fecha_Vencimiento_Credito"] = $columnas["Fecha_Vencimiento_Credito"];
			$items["Valor_Total_Deuda"] 		= $columnas["Valor_Total_Deuda"];

			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function getUsuarioGestionarFacturasContadoServiProductos($documento) {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT 
				f.Id_Factura, 
				tp.Nombre_Tipo_Pago,
				tm.Nombre_Tipo_Movimiento,
				f.Fecha_Factura, f.Valor_Total_Factura, 
				u.Nombre_Usuario
				FROM factura AS f 
				INNER JOIN tipo_pago AS tp ON f.Id_Tipo_Pago = tp.Id_Tipo_Pago
				INNER JOIN tipo_movimiento AS tm ON f.Id_Tipo_Movimiento = tm.Id_Tipo_Movimiento
				INNER JOIN usuario AS u ON f.Id_Usuario = u.Id_Usuario 
				WHERE u.Documento_Usuario = '$documento' AND tp.Nombre_Tipo_Pago = 'Contado'") or die(2);

		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();

			$items["Id_Factura"] 				= $columnas["Id_Factura"];
			$items["Nombre_Tipo_Pago"] 			= $columnas["Nombre_Tipo_Pago"];
			$items["Nombre_Tipo_Movimiento"] 	= $columnas["Nombre_Tipo_Movimiento"];
			$items["Fecha_Factura"] 			= $columnas["Fecha_Factura"];
			$items["Valor_Total_Factura"] 		= $columnas["Valor_Total_Factura"];
			$items["Nombre_Usuario"] 			= $columnas["Nombre_Usuario"];

			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function insertar($idCredito, $valTotalAvono, $fecha) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "INSERT INTO detalle_credito (Id_Credito,Valor_Abono,Fecha_Abono) 
			VALUES ('$idCredito', '$valTotalAvono', '$fecha')") or die(3);
	};

	function actualizarCredito($idCredito ,$total) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "UPDATE credito SET Valor_Total_Deuda = '$total' WHERE Id_Credito = '$idCredito'") or die(3);	
	};

	function getAbonoCreditoFacturaServiProducto($idCredito) {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM detalle_credito WHERE Id_Credito = '$idCredito'") or die(2);

		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();

			$items["Id_Detalle_Credito"]	= $columnas["Id_Detalle_Credito"];
			$items["Valor_Abono"] 			= $columnas["Valor_Abono"];
			$items["Fecha_Abono"] 			= $columnas["Fecha_Abono"];

			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

 ?>