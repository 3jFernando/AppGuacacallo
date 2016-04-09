<?php
require_once('../../configs/conexion.php');
$idprediousuario=$_POST['idprediousu'];
$fechafactura=date("Y/m/d");
$anio=$_POST['anio'];
$mespagoagua=$_POST['mespagoagua'];
$aniomes=$mespagoagua."/".$anio;
$idtipomovimiento=19; //tener encuenta
$idtipopago=8;//tener encuenta
$estado_factura_agua=0;
$id_serviproducto=7;


	$countpredios=count($_POST['idprediousu']);
	for($i=0;$i<$countpredios;$i++){
    $idprediousuario=$_POST['idprediousu'][$i];
    mysqli_query($conexion, "INSERT INTO factura(Id_Predio_Usuario,Fecha_Factura,Id_Tipo_Movimiento,Id_Tipo_Pago,Pago_mes_agua,Estado_facturas_agua,Id_Servi_Producto) 
	VALUES ('$idprediousuario','$fechafactura','$idtipomovimiento','$idtipopago','$aniomes','$estado_factura_agua','$id_serviproducto')") or die(3);

	}
	echo'<script language="javascript">
			alert("Facturas creadas correctamente, recuerde agregar los pagos. ")
		self.location="../../administracion.php";
			</script>';		
?>