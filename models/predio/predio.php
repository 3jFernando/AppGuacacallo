<?php


	function listado() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM predio_usuario as p inner join tipo_predio as tp on p.Id_Tipo_Predio = tp.Id_Tipo_Predio inner join usuario as u on p.Id_Usuario = u.Id_Usuario ORDER BY p.Id_Predio_Usuario") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Predio_Usuario"] 	= $columnas["Id_Predio_Usuario"];
			$items["Nombre_Tipo_Predio"] 	= $columnas["Nombre_Tipo_Predio"];
			$items["Nombre_Usuario"] 		= $columnas["Nombre_Usuario"];	
			$items["Apellido_Usuario"] 		= $columnas["Apellido_Usuario"];
			$items["Nombre_Predio"] 		= $columnas["Nombre_Predio"];
			$items["Fecha_Inscripcion"] 	= $columnas["Fecha_Inscripcion"];
			$items["Id_Usuario"] 			= $columnas["Id_Usuario"];	
			$items["Id_Tipo_Predio"] 		= $columnas["Id_Tipo_Predio"];

            $items["Id_Alcantarillado"] 	= $columnas["Id_Alcantarillado"];
			$items["Alcantarillado"] 	= $columnas["Alcantarillado"];
			$items["Tamano_Predio"] 	= $columnas["Tamano_Predio"];
			$items["Valor_Hectarea"] 	= $columnas["Valor_Hectarea"];	
			$items["Valor_Total"] 		= $columnas["Valor_Total"];	

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;
	};

	function listadoTiposPredios() {

		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM tipo_predio") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Tipo_Predio"] 	  = $columnas["Id_Tipo_Predio"];
			$items["Nombre_Tipo_Predio"]  = $columnas["Nombre_Tipo_Predio"];

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;

	};

	function getUsuarioPredio($documento)  {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM usuario as u WHERE u.Estado = 1 AND u.Nombre_Usuario = '$documento' OR u.Estado = 1 AND u.Apellido_Usuario = '$documento'  OR u.Estado = 1 AND u.Documento_Usuario = '$documento' ") or die(2);

		$i = 0;
		while($campos = mysqli_fetch_array($consulta)){			
				
			$items = array();

			$items["Id_Usuario"] 		= $campos["Id_Usuario"];
			$items["Nombre_Usuario"] 	= $campos["Nombre_Usuario"];
			$items["Apellido_Usuario"]  = $campos["Apellido_Usuario"];	

			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function insertar($idTipoPredio,$idUsuario,$nombrePredio,$fechaInscripcion,$cantidad,$valor,$total,$Estado_predio,$alcantarillado) {
		//require_once('../../configs/conexion.php'); 
		include '../../configs/conexion.php';
		mysqli_query($conexion, "INSERT INTO predio_usuario (Id_Tipo_Predio,Id_Usuario,Nombre_Predio,Fecha_Inscripcion,Tamano_Predio,Valor_Hectarea,Valor_Total,Estado_predio,Alcantarillado)
			VALUES ('$idTipoPredio','$idUsuario','$nombrePredio','$fechaInscripcion','$cantidad','$valor','$total','$Estado_predio','$alcantarillado')") or die(3);
	};

	function insertarconalcantarillado($idTipoPredio,$idUsuario,$nombrePredio,$fechaInscripcion,$cantidad,$valor,$total,$Estado_predio,$alcantarillado,$idalcantarillado) {
		//require_once('../../configs/conexion.php'); 
		include '../../configs/conexion.php';
		mysqli_query($conexion, "INSERT INTO predio_usuario (Id_Tipo_Predio,Id_Usuario,Nombre_Predio,Fecha_Inscripcion,Tamano_Predio,Valor_Hectarea,Valor_Total,Estado_predio,Alcantarillado,Id_Alcantarillado)
			VALUES ('$idTipoPredio','$idUsuario','$nombrePredio','$fechaInscripcion','$cantidad','$valor','$total','$Estado_predio','$alcantarillado','$idalcantarillado')") or die(3);
	};



	function getPredio($nombre)  {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM predio_usuario as p inner join tipo_predio as tp on 
			p.Id_Tipo_Predio = tp.Id_Tipo_Predio inner join usuario as u on p.Id_Usuario = u.Id_Usuario 
			WHERE p.Nombre_Predio = '$nombre' OR u.Nombre_Usuario = '$nombre' OR u.Documento_Usuario = '$nombre' ORDER BY p.Id_Predio_Usuario") or die(2);

		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();

			$items["Id_Predio_Usuario"] 	= $columnas["Id_Predio_Usuario"];
			$items["Nombre_Tipo_Predio"] 	= $columnas["Nombre_Tipo_Predio"];
			$items["Nombre_Usuario"] 		= $columnas["Nombre_Usuario"];	
			$items["Apellido_Usuario"] 		= $columnas["Apellido_Usuario"];
			$items["Nombre_Predio"] 		= $columnas["Nombre_Predio"];
			$items["Fecha_Inscripcion"] 	= $columnas["Fecha_Inscripcion"];	
			$items["Id_Usuario"] 			= $columnas["Id_Usuario"];	
            $items["Id_Tipo_Predio"] 			= $columnas["Id_Tipo_Predio"];

            $items["Alcantarillado"] 	= $columnas["Alcantarillado"];
            $items["Id_Alcantarillado"] 	= $columnas["Id_Alcantarillado"];
			$items["Tamano_Predio"] 	= $columnas["Tamano_Predio"];
			$items["Valor_Hectarea"] 	= $columnas["Valor_Hectarea"];	
			$items["Valor_Total"] 		= $columnas["Valor_Total"];		

			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

		function actualizar($Id_Predio_Usuario,$idTipoPredio,$nombrePredio,$fechaInscripcion,$cantidad,$valor,$total,$alcantarillado,$idalcantarillado){
		//require_once('../../configs/conexion.php'); 
			include '../../configs/conexion.php';
		mysqli_query($conexion, "UPDATE predio_usuario 
			SET 
			Id_Tipo_Predio = '$idTipoPredio', 
			
			Nombre_Predio = '$nombrePredio', 
			Fecha_Inscripcion = '$fechaInscripcion',
            Alcantarillado='$alcantarillado',
            Id_Alcantarillado='$idalcantarillado',
			Tamano_Predio = '$cantidad', 
			Valor_Hectarea = '$valor', 
			Valor_Total = '$total'
			WHERE Id_Predio_Usuario = '$Id_Predio_Usuario'") or die(3);
	};


		function actualizarconalcantarillado($Id_Predio_Usuario,$idTipoPredio,$nombrePredio,$fechaInscripcion,$cantidad,$valor,$total,$alcantarillado,$idalcantarillado){
		//require_once('../../configs/conexion.php'); 
			include '../../configs/conexion.php';
		mysqli_query($conexion, "UPDATE predio_usuario 
			SET 
			Id_Tipo_Predio = '$idTipoPredio', 
			
			Nombre_Predio = '$nombrePredio', 
			Fecha_Inscripcion = '$fechaInscripcion',
            Alcantarillado='$alcantarillado',
            Id_Alcantarillado='$idalcantarillado',
			Tamano_Predio = '$cantidad', 
			Valor_Hectarea = '$valor', 
			Valor_Total = '$total'
			WHERE Id_Predio_Usuario = '$Id_Predio_Usuario'") or die(3);
	};



	


	function eliminar($idPredio) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "DELETE from predio_usuario WHERE Id_Predio_Usuario = '$idPredio'") or die(3);	
	};

	

?>	