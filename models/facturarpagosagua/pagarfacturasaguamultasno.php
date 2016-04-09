
<?php
require_once('../../configs/conexion.php');
$Id_Factura=$_POST['Id_Factura'];
$Id_FacturaReferenciaPago=$_POST['Id_FacturaReferenciaPago'];
$Id_Predio_Usuario=$_POST['Id_Predio_Usuario'];
$Id_Consumo_Contador=$_POST['Id_Consumo_Contador'];
$estadofacturaagua=0;
$estado_predio=1;
$countfactura=count($_POST['Id_Factura']);
$countpredios=count($_POST['Id_Predio_Usuario']);
for($i=0;$i<$countpredios;$i++){
	$Id_Predio_Usuario=$_POST['Id_Predio_Usuario'][$i];
		 //$Id_Usuario=$_POST['Id_Usuario'];
		   mysqli_query($conexion, "UPDATE predio_usuario SET Estado_predio = '$estado_predio' WHERE Id_Predio_Usuario = '$Id_Predio_Usuario'") or die(3);

}
	for($i=0;$i<$countfactura;$i++){


		 $Id_Consumo_Contador=$_POST['Id_Consumo_Contador'][$i];
		  $Id_Factura=$_POST['Id_Factura'][$i];
		   mysqli_query($conexion, "UPDATE consumo_contador SET estado_factura = '$estadofacturaagua', Referencia_Pago = 

'$Id_FacturaReferenciaPago' WHERE Id_Consumo_Contador = '$Id_Consumo_Contador'") or die(3);
}
	echo'<script language="javascript">
			alert("La(s) factura(s) de agua han sido pagada correctamente, verifique el historial de facturas pagadas del cliente ")
		self.location="../../administracion.php";
			</script>';
?>