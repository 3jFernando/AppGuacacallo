
<?php
require_once('../../configs/conexion.php');
$Id_Predio_Usuario=$_POST['Id_Predio_Usuario'];
$Id_Usuario=$_POST['Id_Usuario'];
$fechacorteagua=date("Y/m/d");
$countfactura=count($_POST['Id_Predio_Usuario']);
//multa corte agua
$idcorteagua=6;
//multa reconexion agua
$reconexion=7;
$estadoregistromulta=0;
//Modificar conexion aqui
/*-----------------------------------------------------------------------------*/


	for($i=0;$i<$countfactura;$i++){
		 $Id_Usuario=$_POST['Id_Usuario'][$i];
	//	echo "predios: ".$Id_Predio_Usuario;

		 $Id_Predio_Usuario=$_POST['Id_Predio_Usuario'][$i];
		 //$Id_Usuario=$_POST['Id_Usuario'];
		   mysqli_query($conexion, "UPDATE predio_usuario SET Fecha_Suspension_Predio='$fechacorteagua' WHERE Id_Predio_Usuario = '$Id_Predio_Usuario'") or die(3);

		    mysqli_query($conexion, "INSERT INTO multa(Id_Predio_Usuario,Id_Tipo_Multa,Id_Usuario,Fecha_Multa,Estado) 
	VALUES ('$Id_Predio_Usuario','$idcorteagua','$Id_Usuario','$fechacorteagua','$estadoregistromulta')") or die(3);
               mysqli_query($conexion, "INSERT INTO multa(Id_Predio_Usuario,Id_Tipo_Multa,Id_Usuario,Fecha_Multa,Estado) 
	VALUES ('$Id_Predio_Usuario','$reconexion','$Id_Usuario','$fechacorteagua','$estadoregistromulta')") or die(3);


}

	echo'<script language="javascript">
			alert(" Los cortes de agua se efectuaron correctamente, consulTe los predios con corte de agua para verificar.")
		self.location="../../administracion.php";
			</script>';
		
?>