<?php

	$nombre  	 = $_POST['nombre'];
	$apellido    = $_POST['apellido'];
	$telefono    = $_POST['telefono'];
	$documento   = $_POST['documento'];
	$estado    	 = $_POST['estado'];
	$estrato     = $_POST['estrato'];

	require_once('../../models/usuario/usuario.php');

	insertar($nombre, $apellido, $telefono, $documento, $estado, $estrato);

?>