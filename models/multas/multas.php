<?php

	function getUsuarioMultas($documento) {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT 
			m.Id_Multa, m.Id_Tipo_Multa, m.Id_Usuario, m.Estado, m.Valor_Multa, m.Fecha_Multa,
			tm.Nombre_Multa,
			u.Nombre_Usuario, u.Telefono_Usuario
			FROM multa AS m
			INNER JOIN tipo_multa AS tm ON m.Id_Tipo_Multa = tm.Id_Tipo_Multa
			INNER JOIN usuario AS u ON m.Id_Usuario = u.Id_Usuario 
			WHERE u.Estado = 1 AND u.Nombre_Usuario = '$documento' OR u.Apellido_Usuario = '$documento' OR u.Telefono_Usuario = '$documento' OR  u.Documento_Usuario = '$documento' ") or die(2);

		$i = 0;
		while($campos = mysqli_fetch_array($consulta)){			
				
			$items = array();
			
			$items["Id_Multa"] 			= $campos["Id_Multa"];
			$items["Id_Tipo_Multa"] 	= $campos["Id_Tipo_Multa"];
			$items["Id_Usuario"] 		= $campos["Id_Usuario"];
			$items["Estado"] 			= $campos["Estado"];
			$items["Valor_Multa"] 		= $campos["Valor_Multa"];
			$items["Fecha_Multa"] 		= $campos["Fecha_Multa"];
			$items["Nombre_Multa"] 		= $campos["Nombre_Multa"];
			$items["Nombre_Usuario"] 	= $campos["Nombre_Usuario"];
			$items["Telefono_Usuario"] 	= $campos["Telefono_Usuario"];

			
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function crearFacturaModuloMultas($Id_TipoPago, $Id_TipoMovimiento, $fechaCreacion, $valorMulta, $Id_Usuario) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "INSERT INTO factura (Id_Tipo_Pago, Id_Tipo_Movimiento, Fecha_Factura, Valor_Total_Factura, Id_Usuario) 
			VALUES ('$Id_TipoPago', '$Id_TipoMovimiento', '$fechaCreacion', '$valorMulta', '$Id_Usuario')") or die(3);
	};

	function actualizarEstadoMultas($Id_Multa) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "UPDATE multa SET Estado = 1 WHERE Id_Multa = '$Id_Multa'") or die(3);
	};



	
	function listado() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM tipo_multa") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Tipo_Multa"] = $columnas["Id_Tipo_Multa"];
			$items["Nombre_Multa"]    = $columnas["Nombre_Multa"];
			$items["Valor_Tipo_Multa"]     = $columnas["Valor_Tipo_Multa"];
			

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;	
	};



	function actualizar($Id_Tipo_Multa,$Nombre_Multa,$Valor_Tipo_Multa){
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "UPDATE tipo_multa 
			SET 
			Id_Tipo_Multa = '$Id_Tipo_Multa', 
			Nombre_Multa = '$Nombre_Multa', 
			Valor_Tipo_Multa = '$Valor_Tipo_Multa'

			WHERE Id_Tipo_Multa = '$Id_Tipo_Multa'") or die(3);
	};

?>