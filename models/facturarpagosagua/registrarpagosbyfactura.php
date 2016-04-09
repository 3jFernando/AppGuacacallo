<?php
require_once('../../configs/conexion.php');
$fechaelaboracio=$_POST['fechaelaboracion'];
$Id_Predio_Usuario=$_POST['Id_Predio_Usuario'];
$Id_Usuario=$_POST['Id_Usuario'];
$fechacorte=$_POST['fechacorte'];
$Fecha_Pago_Oportuno=$_POST['Fecha_Pago_Oportuno'];
$idvalorconsumo=$_POST['idvalorconsumo'];
$contador=$_POST['contador'];
$idfactura=$_POST['idfactura'];
$fechamulta=date("Y/m/d");
$estadoregistromulta=0;
$suspendido=0;
$estadofactura=1;
$recargomes=8;
$estado_factura_agua=1;
$valorfactura=$_POST['valorfactura'];
	$countfacturas=count($_POST['idfactura']);
	for($i=0;$i<$countfacturas;$i++){
          $Id_Predio_Usuario=$_POST['Id_Predio_Usuario'][$i];
            $Id_Usuario=$_POST['Id_Usuario'][$i];
          $idfactura=$_POST['idfactura'][$i];


		$cantidadfacturas=mysqli_query($conexion,"SELECT pu.Id_Predio_Usuario, count(fp.Id_Predio_Usuario) AS cantidadfaturas FROM predio_usuario as pu inner join tipo_predio as tp on pu.Id_Tipo_Predio = tp.Id_Tipo_Predio inner join usuario as u on pu.Id_Usuario = u.Id_Usuario inner join factura as fp on pu.Id_Predio_Usuario = fp.Id_Predio_Usuario inner join consumo_contador as cc on fp.Id_Factura = cc.Id_Facrura WHERE u.Estado = 1 AND cc.estado_factura=1 AND fp.Id_Predio_Usuario = '$Id_Predio_Usuario' GROUP BY fp.Id_Predio_Usuario"); 
       if($reg=mysqli_fetch_array($cantidadfacturas)){
       	 foreach ($cantidadfacturas as $cantidad) {
          if($cantidad['cantidadfaturas']>=1){
             mysqli_query($conexion, "INSERT INTO multa(Id_Predio_Usuario,Id_Tipo_Multa,Id_Usuario,Fecha_Multa,Estado) 
            VALUES ('$Id_Predio_Usuario','$recargomes','$Id_Usuario','$fechamulta','$estadoregistromulta')") or die(3);
          }
              if($cantidad['cantidadfaturas']>=2){
          
                  mysqli_query($conexion, "INSERT INTO consumo_contador(Id_Valor_Consumo,Suspendido,Id_Facrura,Fecha_Elaboracion,Fecha_Corte,Fecha_Pago_Oportuno,Contador,estado_factura) 
                VALUES ('$idvalorconsumo','$suspendido','$idfactura','$fechaelaboracio','$fechacorte','$Fecha_Pago_Oportuno','$contador','$estadofactura')") or die(3);
                mysqli_query($conexion, "UPDATE factura SET Valor_Total_Factura = '$valorfactura', Estado_facturas_agua='$estado_factura_agua' WHERE Id_Factura = '$idfactura'") or die(3);
                      }
                      if($cantidad['cantidadfaturas']<2){

                        
                  mysqli_query($conexion, "INSERT INTO consumo_contador(Id_Valor_Consumo,Suspendido,Id_Facrura,Fecha_Elaboracion,Fecha_Pago_Oportuno,Contador,estado_factura) 
                VALUES ('$idvalorconsumo','$suspendido','$idfactura','$fechaelaboracio','$Fecha_Pago_Oportuno','$contador','$estadofactura')") or die(3);
                mysqli_query($conexion, "UPDATE factura SET Valor_Total_Factura = '$valorfactura', Estado_facturas_agua='$estado_factura_agua' WHERE Id_Factura = '$idfactura'") or die(3);
             }
         
      
       }


       }else{

       	  mysqli_query($conexion, "INSERT INTO consumo_contador(Id_Valor_Consumo,Suspendido,Id_Facrura,Fecha_Elaboracion,Fecha_Pago_Oportuno,Contador,estado_factura) 
	VALUES ('$idvalorconsumo','$suspendido','$idfactura','$fechaelaboracio','$Fecha_Pago_Oportuno','$contador','$estadofactura')") or die(3);
	mysqli_query($conexion, "UPDATE factura SET Valor_Total_Factura = '$valorfactura', Estado_facturas_agua='$estado_factura_agua' WHERE Id_Factura = '$idfactura'") or die(3);

       }
	}
	echo'<script language="javascript">
			alert("Pagos efectuados correctamente ")
		self.location="../../administracion.php";
			</script>';		
?>