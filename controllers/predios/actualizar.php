<?php

	$Id_Predio_Usuario	= $_POST['Id_Predio_Usuario'];
	$idTipoPredio  		= $_POST['idTipoPredio'];
	$nombrePredio    	= $_POST['nombrePredio'];
	$fechaInscripcion   = $_POST['fechaInscripcion'];

	$cantidad	= $_POST['cantidad'];
	$valor	= $_POST['valor'];
	$total	= $_POST['total'];

	$alcantarillado    	= $_POST['alcantarillado'];
	//$idalcantarillado    	= $_POST['idalcantarillado'];

	$idalcantarillado=1;


	require_once('../../models/predio/predio.php');


	if($_POST['alcantarillado']=="SI"){
		actualizarconalcantarillado($Id_Predio_Usuario,$idTipoPredio,$nombrePredio,$fechaInscripcion,$cantidad,$valor,$total,$alcantarillado,$idalcantarillado);
			
	}else{

			actualizar($Id_Predio_Usuario,$idTipoPredio,$nombrePredio,$fechaInscripcion,$cantidad,$valor,$total,$alcantarillado,$idalcantarillado);
	}



?>