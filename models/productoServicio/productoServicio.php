<?php

	function listado() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM servi_productos AS svp WHERE svp.Id_Tipo_Servi_Producto=1 ") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Servi_Producto"] 		= $columnas["Id_Servi_Producto"];
			$items["Nombre_Servi_Producto"]    	= $columnas["Nombre_Servi_Producto"];
			$items["Descripcion"] 			    = $columnas["Descripcion"];
			$items["Valor_Servi_Producto"]      = $columnas["Valor_Servi_Producto"];

			$listados[$i] = $items;
			$i++;

		}
		return $listados;	
	};

	function insertar($nombre_productoServicio,$detalle_productoServicio,$valor_productoServicio) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "INSERT INTO servi_productos (Nombre_Servi_Producto,Descripcion,Valor_Servi_Producto)
			VALUES ('$nombre_productoServicio','$detalle_productoServicio','$valor_productoServicio')") or die(3);
	};

	function actualizar($Id_Servi_Producto,$nombre_productoServicio,$detalle_productoServicio,$valor_productoServicio) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "UPDATE servi_productos SET
			Nombre_Servi_Producto 	= '$nombre_productoServicio', 
			Descripcion 			= '$detalle_productoServicio',
			Valor_Servi_Producto	= '$valor_productoServicio'
			WHERE Id_Servi_Producto = '$Id_Servi_Producto'") or die(3);
	};

	function eliminar($Id_Servi_Producto) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "DELETE FROM servi_productos WHERE Id_Servi_Producto = '$Id_Servi_Producto'") or die(3);
	};

	function getProductoServicio($nombre) {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM servi_productos WHERE Nombre_Servi_Producto = '$nombre'") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Servi_Producto"] 		= $columnas["Id_Servi_Producto"];
			$items["Nombre_Servi_Producto"]    	= $columnas["Nombre_Servi_Producto"];
			$items["Descripcion"] 			    = $columnas["Descripcion"];
			$items["Valor_Servi_Producto"]      = $columnas["Valor_Servi_Producto"];

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;
	};

	//select tipo de productos
      function SelectTipoProductos() {

		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM tipo_serviproducto") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Tipo_Servi_Producto"] 	  = $columnas["Id_Tipo_Servi_Producto"];
			$items["NombreTipoServiProducto"]  = $columnas["NombreTipoServiProducto"];

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;

	};


?>