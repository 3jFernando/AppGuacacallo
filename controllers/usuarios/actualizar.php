<?php

	$Id_Usuario  = $_POST['Id_Usuario'];
	$nombre  	 = $_POST['nombre'];
	$apellido    = $_POST['apellido'];
	$telefono    = $_POST['telefono'];
	$documento   = $_POST['documento'];
	$estado    	 = $_POST['estado'];
	$estrato     = $_POST['estrato'];

	require_once('../../models/usuario/usuario.php');

	actualizar($Id_Usuario, $nombre, $apellido, $telefono, $documento, $estado, $estrato);

?>