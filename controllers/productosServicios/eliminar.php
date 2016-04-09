<?php

	$Id_Servi_Producto		  = $_POST['Id_Servi_Producto'];
  	
  	require_once('../../models/productoServicio/productoServicio.php');

	eliminar($Id_Servi_Producto);

?>