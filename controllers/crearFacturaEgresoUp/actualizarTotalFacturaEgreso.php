<?php

	$Id_Factura   	 = $_POST['Id_Factura'];
	$totalDineroEgreso   	 	 = $_POST['totalDineroEgreso'];

	require_once('../../models/crearFacturaEgresoUp/facturaEgreso.php');

	acutualizarTotal($Id_Factura ,$totalDineroEgreso);

?>
