
<?php
require_once('../../models/multas/multas.php');

	$Id_Tipo_Multa = $_POST['Id_Tipo_Multa'];
	$Nombre_Multa = $_POST['Nombre_Multa'];
	$Valor_Tipo_Multa = $_POST['Valor_Tipo_Multa'];

	

	actualizar($Id_Tipo_Multa,$Nombre_Multa,$Valor_Tipo_Multa);

?>