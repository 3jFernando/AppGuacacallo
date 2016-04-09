<?php

	function crearFactEgreso($cNombre,$cValor,$cCantidad,$cDescripcion,$Id_Factura) {
		require_once('../../configs/conexion.php');
		mysqli_query($conexion, "INSERT INTO egresos_empresas(Nombre_Producto_Egreso, Cantidad_Producto, Valor_Unitrario, Descripcion_Productos, Id_Factura)
		VALUES ('$cNombre','$cCantidad','$cValor','$cDescripcion','$Id_Factura')") or die(3);
	};

	function listarServiProductosFactura($Id_Factura) {
		require_once('../../configs/conexion.php');
		$consulta = mysqli_query($conexion, "SELECT * FROM egresos_empresas WHERE Id_Factura = '$Id_Factura'") or die(2);

		$i = 0;
		while($campos = mysqli_fetch_array($consulta)){

			$items = array();

			$items["Id_Factura"]							= $campos["Id_Factura"];
			$items["Id_Egresos"]							= $campos["Id_Egresos"];
			$items["Nombre_Producto_Egreso"]	= $campos["Nombre_Producto_Egreso"];
			$items["Cantidad_Producto"]				= $campos["Cantidad_Producto"];
			$items["Valor_Unitrario"]					= $campos["Valor_Unitrario"];
			$items["Descripcion_Productos"]		= $campos["Descripcion_Productos"];


			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function crearFact($movimeinto, $fechaActual) {
		require_once('../../configs/conexion.php');
		mysqli_query($conexion, "INSERT INTO factura(Id_Tipo_Movimiento, Fecha_Factura)
		VALUES ('$movimeinto','$fechaActual')") or die(3);
	};

	function calcularTotal($Id_Factura) {
		require_once('../../configs/conexion.php');
		$consulta = mysqli_query($conexion, "select Id_Factura, SUM(Valor_Unitrario) AS total from egresos_empresas WHERE Id_Factura = '$Id_Factura'") or die(2);

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

	function acutualizarTotal($Id_Factura ,$totalDineroEgreso) {
		require_once('../../configs/conexion.php');
		mysqli_query($conexion, "UPDATE factura SET Valor_Total_Factura = '$totalDineroEgreso' WHERE Id_Factura = '$Id_Factura'") or die(3);	
	};

?>
