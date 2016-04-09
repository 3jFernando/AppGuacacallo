<?php 
	
	function listartipospagos(){
		require_once('../../configs/conexion.php');

		$consulta = mysqli_query($conexion, "SELECT fac.Fecha_Factura,SUM(fac.Valor_Total_Factura) as SUMA,pago.Nombre_Tipo_Pago from tipo_pago as pago inner join factura as fac on fac.Id_Tipo_Pago=pago.Id_Tipo_Pago GROUP by Nombre_Tipo_Pago ") or die(2);
		$i = 0;
	    while ($columnas = mysqli_fetch_array($consulta)) {
			$items = array();

			$items["Nombre_Tipo_Pago"]    = $columnas['Nombre_Tipo_Pago']; 
			$items["Valor_Total_Factura"] = $columnas['SUMA'];
							
		    $listados[$i] = $items;
		    $i++;
		}
		return @$listados;

	};

	function SelectTipoReportes(){

		require_once('../../configs/conexion.php'); 

		$consulta = mysqli_query($conexion, "SELECT * from tipo_movimiento") or die(2);
		$i = 0;
		
		while ($columnas = mysqli_fetch_array($consulta)) {
			$items = array();

			$items["Id_Tipo_Movimiento"] 	 = $columnas["Id_Tipo_Movimiento"];
			$items["Nombre_Tipo_Movimiento"] = $columnas["Nombre_Tipo_Movimiento"];
						
			$listados[$i] = $items;
			$i++;

		}
		return @$listados;

	};

	function listadoreportes($tipomovimiento, $fechaminima, $fechamaxima) {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT factura.Id_Tipo_Movimiento,SUM(factura.Valor_Total_Factura) AS SUMA,
			Fecha_Factura FROM factura WHERE Id_Tipo_Movimiento='$tipomovimiento' AND Fecha_Factura
			 BETWEEN '$fechaminima' AND '$fechamaxima' ") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();
			$items["Valor_Total_Factura"] = $columnas['SUMA'];
	
			$listados[$i] = $items;
			$i++;

		}
		return @$listados;	
	};

	function cantidadFacturasRegistradas() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT count(Id_Factura) AS cantidad FROM factura ") or die(2);
		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();
			$items["cantidad"] 		= $columnas["cantidad"];		
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function cantidadFacturasDeveRegistradas() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT 
			COUNT(c.Id_Credito) AS cantidad
			FROM credito AS c 
			WHERE c.Valor_Total_Deuda != 0 AND c.Valor_Total_Factura > c.Valor_Total_Deuda ") or die(2);
		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();
			$items["cantidad"] 		= $columnas["cantidad"];		
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function verFactVencidasDiaActual() {
		$fechaActual = date('Y/m/d');
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * 
			FROM credito AS d WHERE d.Fecha_Vencimiento_Credito = '$fechaActual'
			AND d.Valor_Total_Deuda <> d.Valor_Total_Factura ") or die(2);
		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();
			$items["Id_Factura"] = $columnas["Id_Factura"];		
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function cantidadMultasRegistradas() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT count(Id_Multa) AS cantidad FROM multa ") or die(2);
		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();
			$items["cantidad"] 		= $columnas["cantidad"];		
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function cantidadMultasDeveRegistradas() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT COUNT(Id_Multa) AS cantidad FROM multa WHERE Estado = 0;") or die(2);
		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();
			$items["cantidad"] 		= $columnas["cantidad"];		
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function cantidadDineroRegistrado() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT SUM(Valor_Total_Factura) AS cantidad FROM factura 
			WHERE Id_Tipo_Movimiento = 19; ") or die(2);
		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();
			$items["cantidad"] 		= $columnas["cantidad"];		
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function cantidadDineroDeveRegistrado() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT SUM(Valor_Total_Deuda) AS cantidad FROM credito ") or die(2);
		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();
			$items["cantidad"] 		= $columnas["cantidad"];		
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function cantidadDineroDeveMultasRegistrado() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT SUM(Valor_Multa) AS cantidad2 FROM multa WHERE Estado = 0;") or die(2);
		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();	
			$items["cantidad2"] 	= $columnas["cantidad2"];		
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};









function egresoslistar($fechamin,$fechamax) {
		require_once('../../configs/conexion.php');

		$consulta = mysqli_query($conexion,"SELECT detalle.Id_Factura, detalle.Id_Servi_Producto,detalle.Cantidad,detalle.Precio_Unitario, factu.Id_Factura,factu.Id_Tipo_Movimiento, factu.Fecha_Factura, tipom.Id_Tipo_Movimiento,tipom.Nombre_Tipo_Movimiento, servip.Id_Servi_Producto, servip.Nombre_Servi_Producto 
			from servi_productos, tipo_movimiento, detalle_factura as detalle 
			INNER JOIN factura as factu on factu.Id_Factura = detalle.Id_Factura 
			INNER JOIN tipo_movimiento as tipom on tipom.Id_Tipo_Movimiento = factu.Id_Tipo_Movimiento
			INNER JOIN servi_productos as servip on detalle.Id_Servi_Producto = servip.Id_Servi_Producto 
			where tipom.Id_Tipo_Movimiento = 20 AND factu.Fecha_Factura  BETWEEN '$fechamin' AND '$fechamax'
			GROUP by factu.Id_Factura") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Factura"] 		= $columnas["Id_Factura"];
			$items["Nombre_Servi_Producto"] 		= $columnas["Nombre_Servi_Producto"];
			$items["Cantidad"] 		= $columnas["Cantidad"];
			$items["Precio_Unitario"] 		= $columnas["Precio_Unitario"];
            $items["Fecha_Factura"] 		= $columnas["Fecha_Factura"];
            $items["Nombre_Tipo_Movimiento"] 		= $columnas["Nombre_Tipo_Movimiento"];

 
			$listados[$i] = $items;
			$i++;

		}
		return @$listados;
	};




	function reportematriculas($fechamin,$fechamax) {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, " SELECT detalle.Id_Factura, detalle.Id_Servi_Producto,detalle.Cantidad,detalle.Precio_Unitario, factu.Id_Factura,factu.Id_Tipo_Movimiento, factu.Fecha_Factura,factu.Id_Usuario, servip.Id_Servi_Producto, servip.Nombre_Servi_Producto, usu.Id_Usuario, usu.Nombre_Usuario, usu.Apellido_Usuario,usu.Documento_Usuario, tipom.Id_Tipo_Movimiento, tipom.Nombre_Tipo_Movimiento 
			from tipo_movimiento, usuario, servi_productos, detalle_factura as detalle 
			INNER JOIN factura as factu on factu.Id_Factura = detalle.Id_Factura 
			INNER JOIN servi_productos as servip on detalle.Id_Servi_Producto = servip.Id_Servi_Producto 
			INNER JOIN tipo_movimiento as tipom on tipom.Id_Tipo_Movimiento = factu.Id_Tipo_Movimiento 
			INNER JOIN  usuario as usu on factu.Id_Usuario = usu.Id_Usuario 
			WHERE servip.Id_Servi_Producto = 10 and tipom.Id_Tipo_Movimiento = 19 and servip.Id_Servi_Producto = detalle.Id_Servi_Producto AND factu.Fecha_Factura  BETWEEN '$fechamin' AND '$fechamax' GROUP by factu.Id_Factura ") or die(2);
		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();	
             $items["Id_Factura"] 	= $columnas["Id_Factura"];		
			 $items["Nombre_Usuario"] 	= $columnas["Nombre_Usuario"];		
			$items["Apellido_Usuario"] 	= $columnas["Apellido_Usuario"];		
			 $items["Documento_Usuario"] 	= $columnas["Documento_Usuario"];		
			$items["Fecha_Factura"] 	= $columnas["Fecha_Factura"];		
			$items["Nombre_Servi_Producto"] 	= $columnas["Nombre_Servi_Producto"];		
			$items["Precio_Unitario"] 	= $columnas["Precio_Unitario"];		
			
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};




 ?>