<?php

	$Id_Administrador  				= $_POST['Id_Administrador'];
	$nombre_administrador  			= $_POST['nombre_administrador'];
	$apellido_administrador 		= $_POST['apellido_administrador'];
	$correo_administrador  			= $_POST['correo_administrador'];
	$identificacion_administrador  	= $_POST['identificacion_administrador'];

	require_once('../../models/administrador/administrador.php');

	actualizar($Id_Administrador, $nombre_administrador, $apellido_administrador, $correo_administrador, $identificacion_administrador);

?>