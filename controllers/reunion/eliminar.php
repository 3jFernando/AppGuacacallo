<?php
	
	$Id_Detalle_Reunion     = $_POST['Id_Detalle_Reunion'];

	require_once('../../models/reunion/reunion.php');

	eliminar($Id_Detalle_Reunion);

?>