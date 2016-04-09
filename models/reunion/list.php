
<?php
	 
	 require_once('../../configs/conexion.php');

	 $idusu = $_POST['idusu'];
	 $idreu = $_POST['idreu'];
	 $ensayo = $_POST['ensayo'];
	 $SINO = $_POST['SINO'];    
	 $Fecha = date("Y/m/d");
	

	
	$nuevo_usuario=mysqli_query($conexion,"SELECT asistencia.Id_Detalle from asistencia  where Id_Detalle='$ensayo'"); 
	if(mysqli_num_rows($nuevo_usuario)>0) { 

	echo " 	<script class='hola' language='JavaScript'> 
		        window.alert('NO SE PUEDE REGISTRAR LA REUNION,porfavor selecione una reunion no registrada o cree una');
		        self.location='../../administracion.php';
			</script>";


	} else { 

	$count_name = count($_POST['SINO']);
		
		for($i = 0; $i < $count_name; $i ++) {
				$idusu = $_POST['idusu'] [$i];
				$idreu = $_POST['idreu'] [$i];
				$SINO  = $_POST['SINO'] [$i];
				
		mysqli_query($conexion,"INSERT INTO asistencia (Id_Usuario,Id_Detalle,Asistio,
			Fecha_Asistencia) VALUES ('$idusu','$idreu','$SINO','$Fecha')") or die(3);
		}
	
	echo "	<script  class='hola' language='JavaScript'> 
	            window.alert('Reunion registrada con exito porfavor recuerde colocar multa a los socios que no asistieron');
	            self.location='../../administracion.php';
			</script>";

	}  
 
?>
	
