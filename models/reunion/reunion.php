<?php

	function listado() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM detalle_reunion") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Detalle_Reunion"] = $columnas["Id_Detalle_Reunion"];
			$items["Detalle_Reunion"]    = $columnas["Detalle_Reunion"];
			$items["Nombre_Reunion"]     = $columnas["Nombre_Reunion"];
			$items["Fecha_Reunion"]      = $columnas["Fecha_Reunion"];

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;	
	};

	function insertar($detalle_reunion,$nombre_reunion,$fecha_reunion) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "INSERT INTO detalle_reunion (Detalle_Reunion, Nombre_Reunion,Fecha_Reunion)
			VALUES ('$detalle_reunion','$nombre_reunion','$fecha_reunion')") or die(3);
	};

	function actualizar($Id_Detalle_Reunion, $detalle_reunion,$nombre_reunion,$fecha_reunion) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "UPDATE detalle_reunion SET
			Detalle_Reunion = '$detalle_reunion',
			Nombre_Reunion  = '$nombre_reunion',
			Fecha_Reunion   = '$fecha_reunion'
			WHERE Id_Detalle_Reunion = '$Id_Detalle_Reunion'") or die(3);
	};

	function eliminar($Id_Detalle_Reunion) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "DELETE from detalle_reunion WHERE Id_Detalle_Reunion = '$Id_Detalle_Reunion'") or die(3);		
	};

	function getReunion($nombre) {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM detalle_reunion WHERE Nombre_Reunion = '$nombre' OR Fecha_Reunion = '$nombre'") or die(2);

		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();

			$items["Id_Detalle_Reunion"] = $columnas["Id_Detalle_Reunion"];
			$items["Detalle_Reunion"]    = $columnas["Detalle_Reunion"];
			$items["Nombre_Reunion"]     = $columnas["Nombre_Reunion"];
			$items["Fecha_Reunion"]      = $columnas["Fecha_Reunion"];			

			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function SelectReuniones() {

		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM detalle_reunion") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Detalle_Reunion"] 	  = $columnas["Id_Detalle_Reunion"];
			$items["Nombre_Reunion"]  = $columnas["Nombre_Reunion"];

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;

	};



	function listadousuariosreuniones($select) {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT detalle_reunion.Id_Detalle_Reunion,Nombre_Reunion,usuario.Id_Usuario,Nombre_Usuario,Apellido_Usuario, Documento_Usuario,Estado from detalle_reunion, usuario where Nombre_Reunion='$select' and Estado='1' ") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Detalle_Reunion"] = $columnas["Id_Detalle_Reunion"];
			$items["Nombre_Reunion"]    = $columnas["Nombre_Reunion"];
			$items["Id_Usuario"]     = $columnas["Id_Usuario"];
			$items["Nombre_Usuario"]      = $columnas["Nombre_Usuario"];
			$items["Apellido_Usuario"]      = $columnas["Apellido_Usuario"];
			$items["Documento_Usuario"]      = $columnas["Documento_Usuario"];

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;	
	};

	function SelectMultados() {

		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * from tipo_multa  ") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Tipo_Multa"] 	  = $columnas["Id_Tipo_Multa"];
			$items["Nombre_Multa"]  = $columnas["Nombre_Multa"];
				$items["Valor"]  = $columnas["Valor"];

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;

	};

	function SelectReunionesRegistradas(){

		require_once('../../configs/conexion.php'); 

		$consulta = mysqli_query($conexion, "SELECT detalle_reunion.Id_Detalle_Reunion,Nombre_Reunion,asistencia.Id_Detalle from detalle_reunion, asistencia where Id_Detalle=Id_Detalle_Reunion groUp by Nombre_Reunion") or die(2);
		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();
			$items["Id_Detalle_Reunion"]  = $columnas["Id_Detalle_Reunion"];
			$items["Nombre_Reunion"] 	  = $columnas["Nombre_Reunion"];
			
			$listados[$i] = $items;
			$i++;

		}
		return @$listados;

	};


	function listadoreunionesmultados($idmulta,$reuregistradas) {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT  * from tipo_multa as tp,usuario as usu 
		inner join asistencia as asis on asis.Id_Usuario =usu.Id_Usuario
		INNER JOIN predio_usuario as pre on pre.Id_Usuario = usu.Id_Usuario 
		where tp.Id_Tipo_Multa='$idmulta' and asis.Asistio=0 and asis.Id_Detalle='$reuregistradas' ") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();
             $items["Id_Usuario"]= $columnas["Id_Usuario"];
	         $items["Nombre_Usuario"]= $columnas["Nombre_Usuario"];
	         $items["Apellido_Usuario"]= $columnas["Apellido_Usuario"];
	         $items["Id_Predio_Usuario"]= $columnas["Id_Predio_Usuario"];
	         $items["Nombre_Predio"]= $columnas["Nombre_Predio"];
	         $items["Id_Tipo_Multa"]= $columnas["Id_Tipo_Multa"];
	         $items["Nombre_Multa"]= $columnas["Nombre_Multa"];
	         $items["Valor_Tipo_Multa"]= $columnas["Valor_Tipo_Multa"];
	          $items["Asistio"]= $columnas["Asistio"];
	          $items["Fecha_Asistencia"]= $columnas["Fecha_Asistencia"];

	         $listados[$i] = $items;
			$i++;

		}
		return @$listados;	
	};




?>