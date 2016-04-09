<?php
	
	$Id_Valor_Consumo = $_POST['Id_Valor_Consumo'];

	require_once('../../models/ValorConsumo/valorconsumo.php');

	eliminar($Id_Valor_Consumo);
?>
