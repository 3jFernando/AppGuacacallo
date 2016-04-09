<?php

function listado() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM usuario") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Usuario"] 		= $columnas["Id_Usuario"];
			$items["Nombre_Usuario"] 	= $columnas["Nombre_Usuario"];
			$items["Apellido_Usuario"]  = $columnas["Apellido_Usuario"];
			$items["Telefono_Usuario"]  = $columnas["Telefono_Usuario"];
			$items["Documento_Usuario"] = $columnas["Documento_Usuario"];
			$items["Estado"]  			= $columnas["Estado"];
			$items["Estrato_Usuario"]  	= $columnas["Estrato_Usuario"];			

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;
	};


	function insertar($nombre, $apellido, $telefono, $documento, $estado, $estrato) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "INSERT INTO usuario (Nombre_Usuario, Apellido_Usuario, Telefono_Usuario, 
			Documento_Usuario, estado, Estrato_Usuario)
			VALUES ('$nombre','$apellido','$telefono','$documento','$estado','$estrato')") or die(3);

	};

	function actualizar($Id_Usuario, $nombre, $apellido, $telefono, $documento, $estado, $estrato) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "UPDATE usuario SET Nombre_Usuario = '$nombre', Apellido_Usuario = '$apellido', 
			Telefono_Usuario = '$telefono', Documento_Usuario = '$documento' , Estado = '$estado', 
			Estrato_Usuario = '$estrato', Id_Usuario = '$Id_Usuario'
			WHERE Id_Usuario = '$Id_Usuario'") or die(3);

	};

	function desactivar($Id_Usuario) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "UPDATE usuario SET Estado = 0 WHERE Id_Usuario = '$Id_Usuario'") or die(3);
	};

	function activar($Id_Usuario) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "UPDATE usuario SET Estado = 1 WHERE Id_Usuario = '$Id_Usuario'") or die(3);
	};

	function getUsuario($nombre)  {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM usuario as u WHERE u.Nombre_Usuario = '$nombre' OR u.Apellido_Usuario = '$nombre' OR u.Telefono_Usuario = '$nombre' OR u.Documento_Usuario = '$nombre' OR u.Estado = '$nombre'") or die(2);

		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();

			$items["Id_Usuario"] 		= $columnas["Id_Usuario"];
			$items["Nombre_Usuario"] 	= $columnas["Nombre_Usuario"];
			$items["Apellido_Usuario"]  = $columnas["Apellido_Usuario"];
			$items["Telefono_Usuario"]  = $columnas["Telefono_Usuario"];
			$items["Documento_Usuario"] = $columnas["Documento_Usuario"];
			$items["Estado"]  			= $columnas["Estado"];
			$items["Estrato_Usuario"]  	= $columnas["Estrato_Usuario"];			

			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function cantidadUsuariosRegistrados() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT count(Id_Usuario) AS cantidad FROM usuario ") or die(2);
		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();
			$items["cantidad"] 		= $columnas["cantidad"];		
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function cantidadUsuariosDesactivadosRegistrados() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT count(Id_Usuario) AS cantidad FROM usuario WHERE Estado = 0") or die(2);
		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();
			$items["cantidad"] 		= $columnas["cantidad"];		
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};
	

?>