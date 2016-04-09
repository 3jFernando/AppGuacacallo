<?php

	function actualizar($Id_Administrador, $nombre_administrador, $apellido_administrador, $correo_administrador, $identificacion_administrador) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "UPDATE administrador SET 
			Nombre = '$nombre_administrador', 
			Apellidos = '$apellido_administrador', 
			Correo = '$correo_administrador', 
			Identificacion = '$identificacion_administrador'
			WHERE Id_Administrador = '$Id_Administrador'") or die(3);

	};

?>