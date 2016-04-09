	

<div class="highlight"> 
<a href="#" id="btnImprimirSocios"  class="btn btn-success pull-right"   onClick="printdiv('contenidos');" ><span class="glyphicon glyphicon-print"></span> imprimir factura</a>
</div>
<br>
 
<hr>
<div id="contenidos">
	<?php 
		require_once('../../models/facturarpagosagua/consultareimprimirfacturasagua.php'); 
	
		  $listapredios = listadopredios();

	    $totalmultas=0;
	    $totalfactura=0;
	    $totaladicional=0;
	    		$Total=0;
		

			for($i = 0; $i < count($listapredios); $i++) {

				$items = $listapredios[$i];
				$infodesprendible=$listapredios[$i];
				 $totaladicional=$listapredios[$i];
				 $idPrediousu=$items["Id_Predio_Usuario"];

                 //Inicio Cargar id de la ultima factura generada por predio
                 /*----------------------------------------------------------------------------------------*/
				 $facturausuario  = getUltimaFacturaByUsuario($idPrediousu);
                 $Fecha_Corte=0;
	             $Fecha_Pago_Oportuno=0;
	             $Fecha_Elaboracion=0;
	             $Pago_mes_agua=0;
	                $cantidad=0;
	             $z=0;
                 $f=0;
                 $atrasosusuario=0;

                $alcantarilladosino=0;
	            $valoralcantarillado=0;
	            $nombrealcantarillado=0;

                ///Inicio modulo verificacion de servicio de alcantarillado
                    $alcantarilladoverificacion=getUsuarioPagoFactura($idPrediousu);
                    $t=0;
                      if ($t < count($alcantarilladoverificacion)) {
                      	 for($t= 0; $t < count($alcantarilladoverificacion); $t++) {
						   $servicioalcantarilladoverificacion = $alcantarilladoverificacion[$t];
  
						  if($servicioalcantarilladoverificacion["Alcantarillado"]=="SI"){
						  	$alcantarillado=getUsuarioPredioAlcantarillado($idPrediousu);
				            $a=0;
				            	 for($a= 0; $a < count($alcantarillado); $a++) {

									   $servicioalcantarillado = $alcantarillado[$a];

									    $alcantarilladosino=$servicioalcantarillado["Alcantarillado"];
							            $valoralcantarillado=$servicioalcantarillado["Valor_Servicio_Alcantarillado"];

							            $nombrealcantarillado=$servicioalcantarillado["Nombre_Acantarillado"];

									}

				            
							  }else{
									    $alcantarilladosino="NO";
							            $valoralcantarillado=0;
							            $nombrealcantarillado=0;
						  }
						}
                      }

                     
	            ///Fin modulo verificacion de servicio de alcantarillado


						 $cantidadfacturas=contarCantidaddeFacturasPendientes($idPrediousu);	
						 //Inico contar facturas del usuarios para hallar los atrasos
						 for($z= 0; $z < count($cantidadfacturas); $z++) {

						   $numerofacturas = $cantidadfacturas[$z];
						

						  $cantidad= $numerofacturas["cantidadfaturas"];
						  if($cantidad>1){
						  	  $atrasosusuario=$cantidad-1;
						  }else{
						  	 $atrasosusuario=0;

						  }
						  
						}
						 //Fin contar facturas del usuarios para hallar los atrasos
                     //total valor alcantarillado
                    $totalalcantarillado=$valoralcantarillado*$cantidad;

				 if ($f < count($facturausuario) ) { 
				    	echo "
				    	<section class='tamanohoja' >
<center>
<div class='row'>
  <div class='col-xs-2'><img alt='' src='public/img/logo.png' width='130'/></div>
  <div class='col-xs-6'>
<h5> Junta Adinistradora Guacacallo</h5>
Direccion: Guacacallo <br>
Telefono:3138888120<br>
NIt:423424234232

</div>
<div class='spaciopanelsjunta col-xs-4'>
<div class='panel panel-primary'>
<div style='padding:1px 1px !important; background-color:#337ab7 !important;'>
 <h5 style='color:#ffffff !important;'>FACTURA No.</h5>
</div>
<div class='panel-body informacion'>
	     	";
	    for($z = 0; $z < count($facturausuario); $z++) {
			 $itemsultimo = $facturausuario[$z];
			 echo " <h4>" .$itemsultimo["Id_Factura"]."</h4> ";
			 $Id_FacturaReferenciaPago =$itemsultimo["Id_Factura"];
			   $infofactura  = getUltimaFacturaByUsuarioInfo($Id_FacturaReferenciaPago);
			  $p=0;
			   for($p = 0; $p < count($infofactura); $p++) {
			 $itemsinfofactura = $infofactura[$p];

			 
			  $Fecha_Corte=$itemsinfofactura["Fecha_Corte"];
	          $Fecha_Pago_Oportuno=$itemsinfofactura["Fecha_Pago_Oportuno"];
	          $Fecha_Elaboracion=$itemsinfofactura["Fecha_Elaboracion"];
	          $Pago_mes_agua=$itemsinfofactura["Pago_mes_agua"];


			}


			 echo "<input type='hidden' value= " .$Id_FacturaReferenciaPago."  name='Id_FacturaReferenciaPago'  size='10' readonly>";

						   

			}
			echo "</div>
			</div></div></center>
		 ";


				    }else{


				    }
                 //Fin Cargar id de la ultima factura generada por predio
                 /*----------------------------------------------------------------------------------------*/
  echo  
            "

<div class='row'>

<div class='spaciopanels col-xs-5 text-left '>
<div class='panel panel-default'>
<div style='padding:1px 1px !important; background-color:#337ab7 !important;'>
<center>
<h5 style='color:#ffffff !important;'>".$items["Nombre_Usuario"]." ".$items["Apellido_Usuario"]."</h5>
</center>

</div>
<div class='panel-body informacion'>
 Documento: ".$items["Documento_Usuario"]."<br>
 Telefono:".$items["Telefono_Usuario"]."<br>
 Estrato:".$items["Estrato_Usuario"]."<br>
 Nombre Predio: ".$items["Nombre_Predio"]."<br>
 Zona:".$items["Nombre_Tipo_Predio"]."

</div>
</div>
</div>

            ";
              //verficacion de hectareas del predio de l usuario
            
					
					echo "<div class='spaciopanels col-xs-4 text-left'>
<div class='panel panel-default'>
<div style='padding:1px 1px !important; background-color:#337ab7 !important;'>
<center>
<h6 style='color:#ffffff !important;'>Costos Adicionales<a href='#'> </a></h6>
</center>
</div>
<div class='panel-body informacion'>
<m>Hectareas Predio:</m>
<m class='infopanels'>" .$items["Tamano_Predio"]."</m><br>
 <m>Valor Hectarea:</m>
<m class='infopanels'> $".$items["Valor_Hectarea"]."</m><br>
<m>Total Hectareas:</m>
<m class='infopanels'> $" .$items["Valor_Total"]."</m><br>
<m>Alcantarillado:</m>
<m class='infopanels'>" .$alcantarilladosino."</m><br>
 <m>Valor Alcantarillado</m>
<m class='infopanels'> $".$valoralcantarillado."</m><br>
<m>Total Alcantarillado</m>
<m class='infopanels'> $".$totalalcantarillado."</m>
</div>
</div>
</div>

"; 
	      
	          ///Fin verificacion hectareas predio    
	          	echo "<div class='spaciopanels col-xs-3 text-left '>
<div class='panel panel-default'>
<div style='padding:1px 1px !important; background-color:#337ab7 !important;'>
<center>
<h6 style='color:#ffffff !important;'>Informacion Factura<a href='#'> </a></h6>
</div>
<div class='panel-body informacion'>
<m>Periodo pago:</m>
<m class='informacionfechafactura'>" .$Pago_mes_agua."</m><br>
<m>Corte :</m>
<m class='informacionfechafactura'>".$Fecha_Corte."</m><br>
 <m>Pago Oportuno:</m>
<m class='informacionfechafactura'>".$Fecha_Pago_Oportuno."</m><br>
<m >Elaboracion:</m>
<m class='informacionfechafactura'>".$Fecha_Elaboracion."</m><br>
<m>Atrasos:</m>
<m class='informacionfechafactura'>" .$atrasosusuario."</m><br>
</div>
</div>
</div>
</div>
"; 
            /*Inicio multas del usuario*/
			//$idPrediousu=$items["Id_Predio_Usuario"];
			$multas=getMultasUsuario( $idPrediousu);	

					$r=0;
				    if ($r < count($multas) ) {
						echo "<center><h5>Factura del usuario</h5>";
					echo "  <table class='table table-bordered'>
				              <tr >
								<th style='padding:0px !important;  background-color:#337ab7 !important; color:#ffffff !important;'>NIT</th>
								<th style='padding:0px !important;  background-color:#337ab7 !important; color:#ffffff !important;'>MULTA </th>
								<th style='padding:0px !important;  background-color:#337ab7 !important; color:#ffffff !important;'>ESTADO</th>
								
								<th style='padding:0px !important;  background-color:#337ab7 !important; color:#ffffff !important;'>VALOR</th>
								<th style='padding:0px !important;  background-color:#337ab7 !important; color:#ffffff !important;'>FECHA MULTA</th>
								
							</tr>";
						for($r = 0; $r < count($multas); $r++) {
						    $items = $multas[$r];
						    $estadomulta_ = '';
			                 if($items["Estado"] == 0) {
									$estadomulta_ =  "Pendiente";
									
								} 

						    echo  
				            "
							<tr>
							    <td style='padding:0px !important;'><input value= ".$items["Id_Multa"]."  style='border:none;'  name='Id_Multa[]'  size='10' readonly></td>
							    <td style='padding:0px !important;'>".$items["Nombre_Multa"]."</td>
								<td style='padding:0px !important;'>".$estadomulta_."</td>
								<td style='padding:0px !important;'>".$items["Valor_Tipo_Multa"]."</td>
					          <td style='padding:0px !important;'>".$items["Fecha_Multa"]."</td>
					          
				            ";

						}

				echo "</table>";
						} else {
						echo "<m style='color:#317eac; font-size:15px;''>Nota:No se han encontrado multas para este usuario.</m>";
					}
					/*Fin Multas del usuario*/
						///Mostrar Valor total de las multas
					/*-----------------------------------------------------------------------------*/
					 $totalmulta= calcularTotalMultas($idPrediousu);
					$h=0;
				if ($h <  count($totalmulta) ) {
				for($h= 0; $h < count($totalmulta); $h++) {
						   $totalmultas = $totalmulta[$h];
						   if($totalmultas["total"]==0){
						 
						   }else{
						   	 echo "<div class='row text-right'><h5>TOTAL MULTAS: $<input type='text'   style='border:none; width:200px; margin:0; padding:0;'   id='totalValorCapturado' value='".$totalmultas["total"]."' disabled='disabled' > </div> </h5>";
						 
						   	  }
						  
							}
					
						} else {
						
					}
			/// Fin Mostrar Valor total de las multas
					/*-----------------------------------------------------------------------------*/

						///Mostrar Factura del usuario
					/*-----------------------------------------------------------------------------*/
					  $facturauser  = getFacturasAguaByUsuario($idPrediousu);
				$c=0;
				if ($c < count($facturauser) ) {
					echo "<center><h5>Factura del usuario</h5>";
					echo "  <table class='table table-bordered'>
				              <tr >
								<th style='padding:0px !important;  background-color:#337ab7 !important; color:#ffffff !important;'>NIT</th>
								<th style='padding:0px !important;  background-color:#337ab7 !important; color:#ffffff !important;'>TOTAL </th>
								<th style='padding:0px !important;  background-color:#337ab7 !important; color:#ffffff !important;'>PAGO OPORTUNO</th>
								
								<th style='padding:0px !important;  background-color:#337ab7 !important; color:#ffffff !important;'>ESTADO</th>
								<th style='padding:0px !important;  background-color:#337ab7 !important; color:#ffffff !important;'>CORTE </th>
								<th style='padding:0px !important;  background-color:#337ab7 !important; color:#ffffff !important;'>ELABORACION </th>
								<th style='padding:0px !important;  background-color:#337ab7 !important; color:#ffffff !important;'>PERIODO </th>
								
							</tr>";
						for($c = 0; $c < count($facturauser); $c++) {
						    $items = $facturauser[$c];
						     $estadofactura_ = '';
			                 if($items["estado_factura"] == 1) {
									$estadofactura_ =  "Pendiente";
									
								} 


						    echo  
				            "
							<tr>
							    <td style='padding:0px !important;'><input  value= ".$items["Id_Factura"]."  style='border:none;'  name='Id_Factura[]'  size='10' readonly></td>
								<td style='padding:0px !important;'>".$items["Valor_Total_Factura"]."</td>
								<td style='padding:0px !important;'>".$items["Fecha_Pago_Oportuno"]."</td>
					           
					            <td style='padding:0px !important;'>".$estadofactura_."</td>
					            <td style='padding:0px !important;'>".$items["Fecha_Corte"]."</td>
					            <td style='padding:0px !important;'>".$items["Fecha_Elaboracion"]."</td>
					             <td style='padding:0px !important;'>".$items["Pago_mes_agua"]."</td>
					             <td style='padding:0px !important;'><input type='hidden'  value= ".$items["Id_Consumo_Contador"]."  style='border:none;'  name='Id_Consumo_Contador[]'  size='10' readonly></td>

				            ";

						}

				echo "</table>";
						} else {

						echo "
						<m style='color:317eac; font-size:20px;''>Nota:Este usuario no debe facturas de agua.</m>
						";
					
						
					}
						///Fin Factura del usuario
					/*-----------------------------------------------------------------------------*/
					///Mostrar el total Factura del usuario
					/*-----------------------------------------------------------------------------*/
					$totalfacturas=calcularTotalFacturas($idPrediousu);
					$tf=0;
				if ($tf < count($totalfacturas) ) {
						for($tf= 0; $tf < count($totalfacturas); $tf++) {
						   $totalfactura = $totalfacturas[$tf];
						   if($totalfactura["total"]==0){
						  echo "
				            <m style='color:317eac; font-size:12px;''>Nota:Total facturas igual a  $0.</m>
						";
						   }else{
						   	echo " </h4><div class='row text-right'><h5>TOTAL FACTURAS: $<input type='text'    style='border:none; width:200px; margin:0; padding:0;'    id='totalValorCapturado' value='".$totalfactura["total"]."' disabled='disabled'> </div></h5>";
                            
						   	     }
						  
						
							}

						} else {
						echo " <m style='color:317eac; font-size:12px;''>Nota:Total facturas igual a  $0.</m>";
						
					}
						///Fin Mostrar el total Factura del usuario
					/*-----------------------------------------------------------------------------*/
								//Hallar total a pagar
				/*--------------------------------------------------------------------------------------*/
					
				if($totalfactura["total"]==0 && $totalmultas["total"]==0){

				}else{
					$Total=$totalfactura["total"]+$totalmultas["total"]+$totaladicional["Valor_Total"]+$totalalcantarillado;
						echo "
				<div class='row'>
							<div class='col-lg-12 '>
				<div class='row text-right'><h4>TOTAL A PAGAR: $<input type='text'  id='totalValorCapturado' value='".$Total."'   style='border:none; width:200px; margin:0; padding:0;'  disabled='disabled' ></h4></div>

				</div>
				</div>
				 ";
				 
				echo "<div>--------------------------------------------------------------------------------------------------------------------------------------------<div>";
               

				}

				     	    echo  
            "

<div class='row'>
<div class='spaciopanelsjunta col-xs-12 '>


<table class='table table-bordered'>
				              <tr class='info'>
								<th style='padding:0px !important; background-color:#337ab7 !important; color:#ffffff !important;'>Empresa</th>
								<th style='padding:0px !important; background-color:#337ab7 !important; color:#ffffff !important;'>Usuario </th>
								<th style='padding:0px !important; background-color:#337ab7 !important; color:#ffffff !important;'>Informacion Registro</th>
								<th style='padding:0px !important; background-color:#337ab7 !important; color:#ffffff !important;'>Costos Adicionales</th>
								
								
							</tr>
							<tr class='informacion'>
							    <td style='padding:0px !important;'>
							    <img alt='' src='public/img/logo.png' width='50'/><br>
								Direccion: Guacacallo <br>
								Telefono:3138888120<br>
								NIt:423424234232
							     </td>
								<td style='padding:0px !important;'>
								<br>
								Factura No.:
								<m class='infopanels'>" .$Id_FacturaReferenciaPago."</m>
								<br>

								Usuario:".$infodesprendible["Nombre_Usuario"]." ".$infodesprendible["Apellido_Usuario"]."<br>
								Documento: ".$infodesprendible["Documento_Usuario"]."<br>
								 Estrato:".$infodesprendible["Estrato_Usuario"]."<br>
								 Nombre Predio: ".$infodesprendible["Nombre_Predio"]."<br>
								</td>
								<td style='padding:0px !important;'><br>
								<m>Periodo pago:</m>
<m class='informacionfechafactura'>" .$Pago_mes_agua."</m><br>
<m>Corte :</m>
<m class='informacionfechafactura'>".$Fecha_Corte."</m><br>
 <m>Pago Oportuno:</m>
<m class='informacionfechafactura'>".$Fecha_Pago_Oportuno."</m><br>
<m >Fecha Elaboracion:</m>
<m class='informacionfechafactura'>".$Fecha_Elaboracion."</m><br>
<m>Atrasos:</m>
<m class='informacionfechafactura'>" .$atrasosusuario."</m><br>

								</td>
					            <td style='padding:0px !important;'><br>
					            
<div class='row text-center'><m class='infopanels'>Total Adicional: $<input type='text'  id='totalValorCapturado' value='".$infodesprendible["Valor_Total"]."'   style='border:none; width:100px; margin:0; padding:0;'  disabled='disabled' ></m></div>
<div class='row text-center'><m class='infopanels'>Total Multas: $<input type='text'  id='totalValorCapturado' value='".$totalmultas["total"]."'   style='border:none; width:100px; margin:0; padding:0;'  disabled='disabled' ></m></div>
<div class='row text-center'><m class='infopanels'>Total Alcantarillado: $<input type='text'  id='totalValorCapturado' value='".$totalalcantarillado."'   style='border:none; width:100px; margin:0; padding:0;'  disabled='disabled' ></m></div>
<div class='row text-center'><m class='infopanels'>Total Agua: $<input type='text'  id='totalValorCapturado' value='".$totalfactura["total"]."'   style='border:none; width:100px; margin:0; padding:0;'  disabled='disabled' ></m></div>

<div class='row text-center'><h5>TOTAL A PAGAR: $<input type='text'  id='totalValorCapturado' value='".$Total."'   style='border:none; width:100px; margin:0; padding:0;'  disabled='disabled' ></h5></div>

					            </td>
					           </tr>
					           </table>
</div>
</div>
</section>
            ";

			
				//Fin Hallar total a pagar
				/*--------------------------------------------------------------------------------------*/
              
		}


				    

	?>

</div>