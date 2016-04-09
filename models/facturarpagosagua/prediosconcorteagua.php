
<?php 
	function listado() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM predio_usuario as p inner join tipo_predio as tp on p.Id_Tipo_Predio = tp.Id_Tipo_Predio inner join usuario as u on p.Id_Usuario = u.Id_Usuario WHERE p.Estado_predio=0 ORDER BY p.Id_Predio_Usuario") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Predio_Usuario"] 	= $columnas["Id_Predio_Usuario"];
			$items["Nombre_Tipo_Predio"] 	= $columnas["Nombre_Tipo_Predio"];
				$items["Documento_Usuario"] 	= $columnas["Documento_Usuario"];
				$items["Fecha_Suspension_Predio"] 	= $columnas["Fecha_Suspension_Predio"];
			$items["Nombre_Usuario"] 		= $columnas["Nombre_Usuario"];	
			$items["Apellido_Usuario"] 		= $columnas["Apellido_Usuario"];
			$items["Nombre_Predio"] 		= $columnas["Nombre_Predio"];
			$items["Fecha_Inscripcion"] 	= $columnas["Fecha_Inscripcion"];
			$items["Id_Usuario"] 			= $columnas["Id_Usuario"];	
			$items["Id_Tipo_Predio"] 		= $columnas["Id_Tipo_Predio"];	

			$items["Tamano_Predio"] 	= $columnas["Tamano_Predio"];
			$items["Valor_Hectarea"] 	= $columnas["Valor_Hectarea"];	
			$items["Valor_Total"] 		= $columnas["Valor_Total"];	

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;
	};


		function getPredio($nombre)  {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM predio_usuario as p inner join tipo_predio as tp on 
			p.Id_Tipo_Predio = tp.Id_Tipo_Predio inner join usuario as u on p.Id_Usuario = u.Id_Usuario 
			WHERE p.Nombre_Predio = '$nombre' AND p.Estado_predio=0 OR u.Nombre_Usuario = '$nombre' AND p.Estado_predio=0 OR u.Documento_Usuario = '$nombre' AND p.Estado_predio=0 ORDER BY p.Id_Predio_Usuario") or die(2);

		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();
$items["Id_Predio_Usuario"] 	= $columnas["Id_Predio_Usuario"];
			$items["Nombre_Tipo_Predio"] 	= $columnas["Nombre_Tipo_Predio"];
				$items["Documento_Usuario"] 	= $columnas["Documento_Usuario"];
				$items["Fecha_Suspension_Predio"] 	= $columnas["Fecha_Suspension_Predio"];
			$items["Nombre_Usuario"] 		= $columnas["Nombre_Usuario"];	
			$items["Apellido_Usuario"] 		= $columnas["Apellido_Usuario"];
			$items["Nombre_Predio"] 		= $columnas["Nombre_Predio"];
			$items["Fecha_Inscripcion"] 	= $columnas["Fecha_Inscripcion"];
			$items["Id_Usuario"] 			= $columnas["Id_Usuario"];	
			$items["Id_Tipo_Predio"] 		= $columnas["Id_Tipo_Predio"];	

			$items["Tamano_Predio"] 	= $columnas["Tamano_Predio"];
			$items["Valor_Hectarea"] 	= $columnas["Valor_Hectarea"];	
			$items["Valor_Total"] 		= $columnas["Valor_Total"];	

			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};
	?>