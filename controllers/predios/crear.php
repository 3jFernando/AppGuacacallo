<?php

	$idTipoPredio  		= $_POST['idTipoPredio'];
	$idUsuario    		= $_POST['idUsuario'];
	$nombrePredio    	= $_POST['nombrePredio'];
	$fechaInscripcion   = $_POST['fechaInscripcion'];
	$valor    		= $_POST['valor'];
	$cantidad    	= $_POST['cantidad'];
	$total   = $_POST['total'];

	$alcantarillado    	= $_POST['alcantarillado'];
	$idalcantarillado   = 1;


	$Estado_predio=1;

	require_once('../../models/predio/predio.php');

	if($_POST['alcantarillado']=='SI'){
          insertarconalcantarillado($idTipoPredio,$idUsuario,$nombrePredio,$fechaInscripcion,$cantidad,$valor,$total,$Estado_predio,$alcantarillado,$idalcantarillado );

	}else{

		insertar($idTipoPredio,$idUsuario,$nombrePredio,$fechaInscripcion,$cantidad,$valor,$total,$Estado_predio,$alcantarillado);
	}
	

	

?>