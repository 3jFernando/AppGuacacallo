<?php

	$Id_Usuario  = $_POST['Id_Usuario'];

	require_once('../../models/usuario/usuario.php');

	desactivar($Id_Usuario);

?>