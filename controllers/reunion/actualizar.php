<?php

	$Id_Detalle_Reunion  = $_POST['Id_Detalle_Reunion'];
    $nombre_reunion 	 = $_POST['nombre_reunion'];
    $detalle_reunion 	 = $_POST['detalle_reunion'];
    $fecha_reunion   	 = $_POST['fecha_reunion'];                

	require_once('../../models/reunion/reunion.php');

	actualizar($Id_Detalle_Reunion,$detalle_reunion,$nombre_reunion,$fecha_reunion);

?>