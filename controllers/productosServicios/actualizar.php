<?php

	$Id_Servi_Producto		  = $_POST['Id_Servi_Producto'];
    $nombre_productoServicio  = $_POST['nombre_productoServicio'];
    $detalle_productoServicio = $_POST['detalle_productoServicio'];
    $valor_productoServicio   = $_POST['valor_productoServicio'];               

	require_once('../../models/productoServicio/productoServicio.php');

	actualizar($Id_Servi_Producto,$nombre_productoServicio,$detalle_productoServicio,$valor_productoServicio);

?>