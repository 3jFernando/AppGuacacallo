<?php
	
	require_once('../../configs/conexion.php');

	$idusuario 	= $_POST['idusuario'];
	$asistio 	= $_POST['asistio'];
	$idmulta 	= $_POST['idmulta'];
	$valor 		= $_POST['valor'];
	$fecha 		= $_POST['fecha'];
	$fechamulta = $_POST['fechamulta'];
	$idpredio 		= $_POST['idpredio'];

	$nuevo_usuario=mysqli_query($conexion,"SELECT multa.Fecha_Multa FROM multa  WHERE Fecha_Multa = '$fechamulta'"); 
	if(mysqli_num_rows($nuevo_usuario)>0) { 

	echo "	<script  class='hola' language='JavaScript'> 
            window.alert('NO SE PUEDE REGISTRAR LA multa,porfavor selecione una reunion no registrada o cree una');
            self.location='../../administracion.php';
			</script>";

	} else { 

		$count_name = count($_POST['asistio']);
				
		for($i = 0; $i < $count_name; $i ++) {

		$idmulta 		= $_POST['idmulta'] [$i];
		$asistio 		= $_POST['asistio'] [$i];
		$idusuario 		= $_POST['idusuario'] [$i];
		$valor 			= $_POST['valor'] [$i];
		$fecha 			= $_POST['fecha'] [$i];
		$idpredio 		= $_POST['idpredio'] [$i];
				

	 	mysqli_query($conexion,"INSERT INTO multa(Id_Tipo_Multa,Id_Usuario,Estado,Valor_Multa,Fecha_Multa,Id_Predio_Usuario)
			VALUES ('$idmulta','$idusuario','$asistio','$valor','$fecha','$idpredio')") or die(3);
		}
		
		echo "	<script  class='hola' language='JavaScript'> 
	            window.alert('Multa registrada correctamente');
	            self.location='../../administracion.php';
			  	</script>";

	}  



 ?>