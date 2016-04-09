<?php

	function listado() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM tipo_predio") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Tipo_Predio"] 		= $columnas["Id_Tipo_Predio"];
			$items["Nombre_Tipo_Predio"] 	= $columnas["Nombre_Tipo_Predio"];	

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;
	};

	function insertar($nombre) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "INSERT INTO tipo_predio (Nombre_Tipo_Predio)
			VALUES ('$nombre')") or die(3);

	};

	function eliminar($tipoPredioId) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "DELETE from tipo_predio WHERE Id_Tipo_Predio = '$tipoPredioId'") or die(3);
	};

	function getTipoPredio($nombre)  {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM tipo_predio WHERE Nombre_Tipo_Predio = '$nombre'") or die(2);

		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();

			$items["Id_Tipo_Predio"] 		= $columnas["Id_Tipo_Predio"];
			$items["Nombre_Tipo_Predio"] 	= $columnas["Nombre_Tipo_Predio"];			

			$listado[$i] = $items;
			$i++;

		}
		return $listado;
	};



?>