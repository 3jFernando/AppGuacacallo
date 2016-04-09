<?php

	$Id_Multa = $_POST['Id_Multa'];

	require_once('../../models/multas/multas.php');

	actualizarEstadoMultas($Id_Multa);

?>