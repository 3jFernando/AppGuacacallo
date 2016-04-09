 <?php
	
	require_once('../../models/reunion/reunion.php');
	
	 	$idusu 	= $_POST['idusu'];
		$idreu 	= $_POST['idreu'];
	 	$SINO 	= $_POST['SINO'];    
	 	$Fecha 	= date("Y/m/d");

		insertarasistencia($idusu,$idreu,$SINO,$Fecha);

  ?>
 