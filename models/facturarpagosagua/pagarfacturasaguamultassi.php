
<?php
require_once('../../configs/conexion.php');
$Id_FacturaReferenciaPago=$_POST['Id_FacturaReferenciaPago'];
$Id_Factura=$_POST['Id_Factura'];
$Id_Consumo_Contador=$_POST['Id_Consumo_Contador'];
$Id_Multa=$_POST['Id_Multa'];
$estadomulta=1;
$estado_predio=1;
$Id_Predio_Usuario=$_POST['Id_Predio_Usuario'];
$estadofacturaagua=0;
//$Id_Multa_Cero=$_POST['Id_Multa_Cero'];
$countpredios=count($_POST['Id_Predio_Usuario']);
for($i=0;$i<$countpredios;$i++){
	$Id_Predio_Usuario=$_POST['Id_Predio_Usuario'][$i];
		 //$Id_Usuario=$_POST['Id_Usuario'];
		   mysqli_query($conexion, "UPDATE predio_usuario SET Estado_predio = '$estado_predio' WHERE 

Id_Predio_Usuario = '$Id_Predio_Usuario'") or die(3);

}

$countmulta=count($_POST['Id_Multa']);
	for($i=0;$i<$countmulta;$i++){

		  
		   $Id_Multa=$_POST['Id_Multa'][$i];
		   mysqli_query($conexion, "UPDATE multa SET Estado = '$estadomulta',Referencia_Pago = 

'$Id_FacturaReferenciaPago' WHERE Id_Multa = '$Id_Multa'") or die(3);

}

$countfactura=count($_POST['Id_Factura']);
	for($i=0;$i<$countfactura;$i++){


		 $Id_Consumo_Contador=$_POST['Id_Consumo_Contador'][$i];
		  $Id_Factura=$_POST['Id_Factura'][$i];
		   mysqli_query($conexion, "UPDATE consumo_contador SET estado_factura = '$estadofacturaagua',Referencia_Pago = 

'$Id_FacturaReferenciaPago' WHERE 

Id_Consumo_Contador = '$Id_Consumo_Contador'") or die(3);

}
	echo'<script language="javascript">
			alert("Las multas y facturas de agua han sido pagada, verifique el historial de facturas pagadas del cliente ")
		self.location="../../administracion.php";
			</script>';


?>
	


