<?php

	function getUsuarioFacturaServiProducto($documento)  {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM usuario as u WHERE u.Estado = 1 AND u.Nombre_Usuario = '$documento' OR u.Apellido_Usuario = '$documento' OR u.Telefono_Usuario = '$documento' OR u.Documento_Usuario = '$documento' ") or die(2);

		$i = 0;
		while($campos = mysqli_fetch_array($consulta)){			
				
			$items = array();

			$items["Id_Usuario"] 		= $campos["Id_Usuario"];
			$items["Nombre_Usuario"] 	= $campos["Nombre_Usuario"];
			$items["Apellido_Usuario"]  = $campos["Apellido_Usuario"];	
			$items["Documento_Usuario"]  = $campos["Documento_Usuario"];	

			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function listadoTiposPagosFactServiPorductos() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM tipo_pago") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Tipo_Pago"] 	  = $columnas["Id_Tipo_Pago"];
			$items["Nombre_Tipo_Pago"]  = $columnas["Nombre_Tipo_Pago"];

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;
	};


	function insertar($idtipoPagoFacturaServiPorductos, $fecha_factura, $Id_Usuario) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "INSERT INTO factura(Id_Tipo_Pago, Id_Tipo_Movimiento, Fecha_Factura, Id_Usuario) 
			VALUES ('$idtipoPagoFacturaServiPorductos',19, '$fecha_factura','$Id_Usuario')") or die(3);
	};

	function buscarFacturaCreada() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT MAX(Id_Factura) as Id_Factura FROM factura") or die(2);

		$i = 0;
		while($campo = mysqli_fetch_array($consulta)){			
				
			$item = array();
			$item["Id_Factura"]  = $campo["Id_Factura"];	
			$listado[$i] = $item;
			$i++;

		}
		return @$listado;
	};

	function cargarDatosFacturaCreadaCredito($Id_Factura) {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM factura WHERE Id_Factura = '$Id_Factura'") or die(2);

		$i = 0;
		while($campo = mysqli_fetch_array($consulta)){			
				
			$item = array();
			$item["Id_Factura"]  			= $campo["Id_Factura"];
			$item["Fecha_Factura"]  		= $campo["Fecha_Factura"];
			$item["Valor_Total_Factura"]  	= $campo["Valor_Total_Factura"];	
			$listado[$i] = $item;
			$i++;

		}
		return @$listado;
	};

	function getServiProducto($nombre) {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT Id_Servi_Producto, Nombre_Servi_Producto, Descripcion, Valor_Servi_Producto FROM servi_productos WHERE Nombre_Servi_Producto =  '$nombre'") or die(2);

		$i = 0;
		while($campos = mysqli_fetch_array($consulta)){			
				
			$items = array();
			$items["Nombre_Servi_Producto"]  = $campos["Nombre_Servi_Producto"];	
			$items["Descripcion"]  			 = $campos["Descripcion"];	
			$items["Valor_Servi_Producto"]   = $campos["Valor_Servi_Producto"];	
			$items["Id_Servi_Producto"]		 = $campos["Id_Servi_Producto"];
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function agregarServiProducto($Id_Factura, $Id_Servi_Producto, $valorServiProducto) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "INSERT INTO detalle_factura (Id_Factura,Id_Servi_Producto,Cantidad,Precio_Unitario) 
			VALUES ('$Id_Factura','$Id_Servi_Producto',1,'$valorServiProducto')") or die(3);
	};

	function listarServiProductosFactura($Id_Factura) {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT 
				df.Id_Detalle_Factura, df.Cantidad,
				f.Id_Factura, f.Fecha_Factura, f.Id_Usuario,
				sp.Id_Servi_Producto, sp.Nombre_Servi_Producto, sp.Valor_Servi_Producto,
				u.Nombre_Usuario, u.Apellido_Usuario, u.Documento_Usuario
				FROM 
				detalle_factura AS df 
				INNER JOIN factura AS f ON df.Id_Factura = f.Id_Factura
				INNER JOIN servi_productos AS sp ON df.Id_Servi_Producto = sp.Id_Servi_Producto 
				INNER JOIN usuario AS u ON f.Id_Usuario = u.Id_Usuario 
				WHERE f.Id_Factura = '$Id_Factura'
				ORDER BY df.Id_Detalle_Factura") or die(2);

		$i = 0;
		while($campos = mysqli_fetch_array($consulta)){			
				
			$items = array();
			$items["Id_Detalle_Factura"] 	= $campos["Id_Detalle_Factura"];
			$items["Nombre_Servi_Producto"] = $campos["Nombre_Servi_Producto"];
			$items["Valor_Servi_Producto"]  = $campos["Valor_Servi_Producto"];
			$items["Nombre_Usuario"]  		= $campos["Nombre_Usuario"];
			$items["Apellido_Usuario"] 		= $campos["Apellido_Usuario"];
			$items["Fecha_Factura"]  		= $campos["Fecha_Factura"];
			$items["Id_Factura"]			= $campos["Id_Factura"];
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function eliminarServiProducto($Id_Detalle_Factura) {	
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "DELETE from detalle_factura WHERE Id_Detalle_Factura = '$Id_Detalle_Factura'") or die(3);	
	};

	function calcularTotalServiProductosAgregados($Id_Factura) {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "select Id_Factura, SUM(Precio_Unitario) AS total from detalle_factura WHERE Id_Factura = '$Id_Factura'") or die(2);

		$i = 0;
		while($campos = mysqli_fetch_array($consulta)){			
				
			$items = array();
			$items["Id_Factura"] 	= $campos["Id_Factura"];
			$items["total"]			= $campos["total"];
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function actualizarValorFactura($Id_Factura,$totalValoCapturado) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "UPDATE factura SET Valor_Total_Factura = '$totalValoCapturado' WHERE Id_Factura = '$Id_Factura'") or die(3);
	};

	function crearFacturaCreditoServiProductos($IdFactCredito,$fechaFactCredito,
		$fechaVencFactCredito,$valorTotFactCredito,$valorTotDeudaFactCredito) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "INSERT INTO credito (Id_Factura, Fecha_Credito, 
			Fecha_Vencimiento_Credito, Valor_Total_Factura, Valor_Total_Deuda)
			VALUES ('$IdFactCredito','$fechaFactCredito','$fechaVencFactCredito',
				'$valorTotFactCredito','$valorTotDeudaFactCredito')") or die(3);
	};

	function  buscarCreditoCreado() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT MAX(Id_Credito) as Id_Credito FROM credito") or die(2);

		$i = 0;
		while($campo = mysqli_fetch_array($consulta)){			
				
			$item = array();
			$item["Id_Credito"]  = $campo["Id_Credito"];	
			$listado[$i] = $item;
			$i++;

		}
		return @$listado;
	};

	function crearFacturaDetalleCreditoServiProductos($idCredito, $valorAvonoFactCredito,$fechaAvonoFactCredito) {		
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "INSERT INTO detalle_credito (Id_Credito,Valor_Abono,Fecha_Abono) 
			VALUES ('$idCredito','$valorAvonoFactCredito','$fechaAvonoFactCredito')") or die(3);
	};

?>