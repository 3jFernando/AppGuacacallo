<div class="highlight"> 
<a href="#" id="btnImprimirSocios"  class="btn btn-success pull-right"   onClick="printdiv('contenfactura');" ><span class="glyphicon glyphicon-print"></span> imprimir factura</a>
</div>
<br>


 
<hr>
<div id="contenfactura">
<?php 

		$documento = $_POST['documento'];
		require_once('../../models/facturarpagosagua/facturarpagosagua.php'); 
		$usuario = getUsuarioPagoFactura($documento);
		$valoradicional=0;
		$infodesprendible=0;
	    $totalmultas=0;
	    $totalfactura=0;
	    $atrasosusuario=0;
	    $totalalcantarillado=0;
	   //Listar informacion del usuario buscado/*-----------------------------------------------------------------------------*/ 
		$i = 0;
		if ($i < count($usuario) ) {
		for($i = 0; $i < count($usuario); $i++) {
		    $items = $usuario[$i];

		
		}
       
        $verificarsiexistenpredios=getUsuarioPredio($documento);
      
        	$h=0;
        	 ///------------Inicio Condicion para Verificar si el usuario tiene predios registrados-----------------///
				if ($h <  count($verificarsiexistenpredios) ) {
						   	$cantidadpredios=contarCantidaddePredioPorUsuarios($documento);
						   	   /*-----------------------INICIO FOR CONTAR CANTIDAD DE  PREDIOS DEL USUARIO-------------------------------*/
		             for($n = 0; $n < count($cantidadpredios); $n++) {

		          	$items = $cantidadpredios[$n];
		          	  /*----------------------- INICIO CONDICION CUANDO LA CANTIDAD DE PREDIOS POR EL USUARIO ES MAYOR A 1-------------------------------*/
			        if($items["cantidadpredios"]>1){
			        	
			        	
				
				  $cantidadfacturas=contarCantidaddeFacturasPendientes($documento);	

				  
				  if ($h <  count($cantidadfacturas) ) {
				   echo  
				"
				 <table class='table table-hover'>
				              <tr class='info'>
								<th>NIT </th>
								<th>TIPO PREDIO</th>
								<th>USUARIO</th>
								<th>NOMBRE PREDIO</th>
								<th>FECHA</th>
								<th>FACTURAS PENDIENTES</th>
			           
							</tr>";
				for($z= 0; $z < count($cantidadfacturas); $z++) {

						   $numerofacturas = $cantidadfacturas[$z];
						   echo "<tr>
					<td>".$numerofacturas["Id_Predio_Usuario"]."</td>
					<td>".$numerofacturas["Nombre_Tipo_Predio"]."</td>
					<td>".$numerofacturas["Nombre_Usuario"]. " " .$numerofacturas["Apellido_Usuario"]."</td>
					<td>".$numerofacturas["Nombre_Predio"]."</td>
					<td>".$numerofacturas["Fecha_Inscripcion"]."</td>
					<td style='color:red;'>".$numerofacturas["cantidadfaturas"]." pendientes"."</td>	
					<td>
					<button class='verfactura-predio btn btn-primary btn-xs' 
						Id_Predio_Usuario='".$numerofacturas["Id_Predio_Usuario"]."'
						Nombre_Predio='".$numerofacturas["Nombre_Predio"]."'
						Nombre_Tipo_Predio='".$numerofacturas["Nombre_Tipo_Predio"]."'
						cantidadfaturas='".$numerofacturas["cantidadfaturas"]."'
						Id_Usuario='".$items["Id_Usuario"]."'
						>+ ver factura 
					</button>
					</td>			
				</tr>";
			}
		}else{
			echo "
				<m style='color:red; font-size:12px;''>Nota: Este usuario no debe facturas. de lo contario verifique que se halla creado la factura al mes correspondiente.</m>
						";
		}
echo "</table>";

					}/*----------------------- FIN CONDICION CUANDO LA CANTIDAD DE PREDIOS POR EL USUARIO ES MAYOR A 1-------------------------------*/
			      /*----------------------- INICIO CONDICION CUANDO LA CANTIDAD DE PREDIOS POR EL USUARIO ES IGUAL 1-------------------------------*/
			      
					else{
			    $facturauser  = getFacturasAguaByUsuario($documento);
			    $totalfacturas=calcularTotalFacturas($documento);
				$multas=getMultasUsuarioPredio($documento);
	            $totalmulta= calcularTotalMultas($documento);
	            $alcantarilladosino=0;
	            $valoralcantarillado=0;
	            $nombrealcantarillado=0;

                ///Inicio modulo verificacion de servicio de alcantarillado
                    $alcantarilladoverificacion=getUsuarioPredio($documento);
                    $t=0;
                      if ($t < count($alcantarilladoverificacion)) {
                      	 for($t= 0; $t < count($alcantarilladoverificacion); $t++) {
						   $servicioalcantarilladoverificacion = $alcantarilladoverificacion[$t];
  
						  if($servicioalcantarilladoverificacion["Alcantarillado"]=="SI"){
						  	$alcantarillado=getUsuarioPredioAlcantarillado($documento);
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
                
	            $Fecha_Corte=0;
	                      $Fecha_Pago_Oportuno=0;
	                     $Fecha_Elaboracion=0;
	                     $Pago_mes_agua=0;
	                      	$Total=0;
	                      	$Id_FacturaReferenciaPago=0;

	            	/*-----------------------------------------------------------------------------*/

	            	///Inicio de informacion para cuando el usuario tiene multas
	            	/*--------------------------------------------------------------------------------------*/
					$r=0;
					 $cantidad=0;
				    if ($r < count($multas)) {
				    	$m=0;
				    	if($r < count($facturauser)){

						 $cantidadfacturas=contarCantidaddeFacturasPendientes($documento);	

						
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
						 $totalalcantarillado=$valoralcantarillado*$cantidad;
						 //Fin contar facturas del usuarios para hallar los atrasos




		echo "<form method='post' action='models/facturarpagosagua/pagarfacturasaguamultassi.php'> ";


	     $facturausuario  = getUltimaFacturaByUsuario($documento);
	     $c=0;

	     ///Inicio cargar el numero de la factura y nombre del predio

	     /*---------------------------------------------------------------------------------------------*/
	     if($c < count($facturausuario) ){

	     
	     	echo "
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
	     	 for($c = 0; $c < count($facturausuario); $c++) {
			 $items = $facturausuario[$c];
			 echo " <h4>" .$items["Id_Factura"]."</h4> ";
			 $Id_FacturaReferenciaPago =$items["Id_Factura"];
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
			 	
			 	
	       	for($c = 0; $c < count($verificarsiexistenpredios); $c++) {
	       		            $valoradicional=$verificarsiexistenpredios[$c];
						    $items = $verificarsiexistenpredios[$c];
						    $infodesprendible=$verificarsiexistenpredios[$c];
						    echo "<input type='hidden' value= ".$items["Id_Predio_Usuario"]."  name='Id_Predio_Usuario[]'  size='10' readonly>";

						   

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
    
						}
					}

	  
	     else{

	     }
	  
	         ///Fin cargar el numero de la factura  y nombre del predio
	     /*---------------------------------------------------------------------------------------------*/
	

					//Listar Multas del usuario buscado
					/*-----------------------------------------------------------------------------*/
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
							    <td style='padding:0px !important;'><input value= ".$items["Id_Multa"]."  style='border:none;'  name='Id_Multa[]'  size='10' readonly> </td>
							    <td style='padding:0px !important;'>".$items["Nombre_Multa"]."</td>
								<td style='padding:0px !important;'>".$estadomulta_."</td>
								<td style='padding:0px !important;'>".$items["Valor_Tipo_Multa"]."</td>
					          <td style='padding:0px !important;'>".$items["Fecha_Multa"]."</td>
				            ";

						}

				echo "</table>";
						} else {
						$Id_Multa_Cero=0;
						///echo "<input value= ".$Id_Multa_Cero." class='form-control'  name='Id_Multa_Cero'  size='10' readonly>";
						echo "<m style='color:#317eac; font-size:15px;''>Nota:No se han encontrado multas para ".$documento. ".</m>";
						echo "<input id='nombre_usuario_busquedaServiProducto' type='hidden';>
				         
						";
					}

				  //Fin Listar Multas del usuario buscado
					/*-----------------------------------------------------------------------------*/


				///Mostrar Valor total de las multas
					/*-----------------------------------------------------------------------------*/
					$h=0;
				if ($h <  count($totalmulta) ) {
				for($h= 0; $h < count($totalmulta); $h++) {
						   $totalmultas = $totalmulta[$h];
						   if($totalmultas["total"]==0){
						  
						   }else{
						   	 echo "<div class='row text-right'><h4>TOTAL MULTAS: $<input type='text'   style='border:none; width:200px; margin:0; padding:0;'   id='totalValorCapturado' value='".$totalmultas["total"]."' disabled='disabled' > </div> </h4>";
						   }
						  
							}
					
						} else {
							
					
						
						
					}
							/// Fin Mostrar Valor total de las multas
					/*-----------------------------------------------------------------------------*/
				

				///Mostrar Factura del usuario
					/*-----------------------------------------------------------------------------*/
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
							    <td style='padding:0px !important;'> <input  value= ".$items["Id_Factura"]."  style='border:none;'  name='Id_Factura[]'  size='10' readonly> </td>
								<td style='padding:0px !important;'>".$items["Valor_Total_Factura"]."</td>
								<td style='padding:0px !important;'>".$items["Fecha_Pago_Oportuno"]."</td>
					            <td style='padding:0px !important;'>".$estadofactura_."</td>
					            <td style='padding:0px !important;'>".$items["Fecha_Corte"]."</td>
					            <td style='padding:0px !important;'>".$items["Fecha_Elaboracion"]."</td>
					            <td style='padding:0px !important;'>".$items["Pago_mes_agua"]."</td>
					            <td style='padding:0px !important;'> <input type='hidden' value= ".$items["Id_Consumo_Contador"]."  name='Id_Consumo_Contador[]'  size='10' readonly></td>
					          

				            ";
						}

				echo "</table>";
						} else {

						echo "
						<m style='color:#317eac; font-size:18px;'>Nota:Este usuario no debe facturas de agua.</m>
						";
						echo "<input id='nombre_usuario_busquedaServiProducto' type='hidden';>";
					
					}
					///Fin Mostrar Factura del usuario
					/*-----------------------------------------------------------------------------*/
				///Mostrar el total Factura del usuario
					/*-----------------------------------------------------------------------------*/
					$tf=0;
				if ($tf < count($totalfacturas) ) {
						for($tf= 0; $tf < count($totalfacturas); $tf++) {
						   $totalfactura = $totalfacturas[$tf];
						   if($totalfactura["total"]==0){
						  echo "
				            <m style='color:#317eac; font-size:12px;''>Nota:Total facturas igual a  $0.</m>
						";
						   }else{
						   	   echo " </h4><div class='row text-right'><h4>TOTAL FACTURAS: $<input type='text'    style='border:none; width:200px; margin:0; padding:0;'    id='totalValorCapturado' value='".$totalfactura["total"]."' disabled='disabled'> </div></h4>";
                               }
						  
						
							}

						} else {
						echo " <m style='color:#317eac; font-size:12px;''>Nota:Total facturas igual a  $0.</m>";
						
					}
						///Fin Mostrar el total Factura del usuario
					/*-----------------------------------------------------------------------------*/
			

				//Hallar total a pagar
				/*--------------------------------------------------------------------------------------*/


				
				
				if($totalfactura["total"]==0 && $totalmultas["total"]==0){



				}else{
					$Total=$totalfactura["total"]+$totalmultas["total"]+$valoradicional["Valor_Total"]+$totalalcantarillado;
							echo "
				<div class='row'>
							<div class='col-lg-12 '>
				<div class='row text-right'><h3>TOTAL A PAGAR: $<input type='text'  id='totalValorCapturado' value='".$Total."'   style='border:none; width:200px; margin:0; padding:0;'  disabled='disabled' ></h3></div>

				</div>
				</div>
				 ";
				
				echo "<div>--------------------------------------------------------------------------------------------------------------------------------------------<div>";
                  echo "<button type='submit' id='btnPagarFactura' class='btn btn-primary' id='pagarfacturas'>Pagar Factura <span class='glyphicon glyphicon-list-alt'></span></button>";
				
				}

				//Fin Hallar total a pagar
				/*--------------------------------------------------------------------------------------*/
			
				
				echo "</form>";

					//// Inicio Desprendible factura
				/*---------------------------------------------------------------------------*/
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

            ";



				//// Fin Desprendible factura
				/*---------------------------------------------------------------------------*/

				    }
				    else{
						echo "<br>
						<m style='color:#317eac; font-size:20px;''>Nota:Este usuario no debe facturas de agua.</m>
						";

				}
				}


	            	///Fin de informacion para cuando el usuario tiene multas
	            	/*--------------------------------------------------------------------------------------*/

///
	          /*---------------------------------------------------------------------------------------------------------------------------------------------*/


	            	///Inicio de informacion para cuando el usuario no tiene multas
	            	/*--------------------------------------------------------------------------------------*/
				    else{
				    	$Total=0;
				    	$infodesprendible=0;
				    	 $Fecha_Corte=0;
	                      $Fecha_Pago_Oportuno=0;
	                     $Fecha_Elaboracion=0;
	                     $Pago_mes_agua=0;
	                     $Id_FacturaReferenciaPago=0;


	                            $alcantarilladosino=0;
					            $valoralcantarillado=0;
					            $nombrealcantarillado=0;

	                        ///Inicio modulo verificacion de servicio de alcantarillado
                    $alcantarilladoverificacion=getUsuarioPredio($documento);
                    $t=0;
                      if ($t < count($alcantarilladoverificacion)) {
                      	 for($t= 0; $t < count($alcantarilladoverificacion); $t++) {
						   $servicioalcantarilladoverificacion = $alcantarilladoverificacion[$t];

						    
						  if($servicioalcantarilladoverificacion["Alcantarillado"]=="SI"){
						  	$alcantarillado=getUsuarioPredioAlcantarillado($documento);
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


				    		$m=0;
				    	if($r < count($facturauser)){




				    	echo "<form method='post' action='models/facturarpagosagua/pagarfacturasaguamultasno.php'> ";
				    	 $cantidadfacturas=contarCantidaddeFacturasPendientes($documento);	

						  $cantidad=0;
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
						 $totalalcantarillado=$valoralcantarillado*$cantidad;
						 //Fin contar facturas del usuarios para hallar los atrasos
				    	    
	     $facturausuario  = getUltimaFacturaByUsuario($documento);
	     $c=0;



	     ///Inicio cargar el numero de la factura y nombre del predio7

	     /*---------------------------------------------------------------------------------------------*/
	     if($c < count($facturausuario) ){

	     	echo "

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
	     	 for($c = 0; $c < count($facturausuario); $c++) {
			 $items = $facturausuario[$c];
			 echo " <h4>" .$items["Id_Factura"]."</h4> ";
			 $Id_FacturaReferenciaPago =$items["Id_Factura"];

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
			 	
	       	for($c = 0; $c < count($verificarsiexistenpredios); $c++) {
						    $items = $verificarsiexistenpredios[$c];
						    $infodesprendible= $verificarsiexistenpredios[$c];
						     $valoradicional=$verificarsiexistenpredios[$c];
                             echo "<input type='hidden' value= ".$items["Id_Predio_Usuario"]."  name='Id_Predio_Usuario[]'  size='10' readonly>
";
						    

						   

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


				            
						}
					}

	  
	     else{

	     }
	  
	         ///Fin cargar el numero de la factura  y nombre del predio
	     /*---------------------------------------------------------------------------------------------*/
	

					//Listar Multas del usuario buscado
					/*-----------------------------------------------------------------------------*/
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
							    <td style='padding:0px !important;'>".$items["Id_Multa"]." </td>
							    <td style='padding:0px !important;'>".$items["Nombre_Multa"]."</td>
								<td style='padding:0px !important;'>".$estadomulta_."</td>
								<td style='padding:0px !important;'>".$items["Valor_Tipo_Multa"]."</td>
					          <td style='padding:0px !important;'>".$items["Fecha_Multa"]."</td>
				            ";

						}

				echo "</table>";
						} else {
						$Id_Multa_Cero=0;
						///echo "<input value= ".$Id_Multa_Cero." class='form-control'  name='Id_Multa_Cero'  size='10' readonly>";
						echo "<m style='color:#317eac; font-size:15px;''>Nota:No se han encontrado multas para ".$documento. ".</m>";
					
					}

				  //Fin Listar Multas del usuario buscado
					/*-----------------------------------------------------------------------------*/


				///Mostrar Valor total de las multas
					/*-----------------------------------------------------------------------------*/
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
							    <td style='padding:0px !important;'> <input  value= ".$items["Id_Factura"]."  style='border:none;'  name='Id_Factura[]'  size='10' readonly> </td>
								<td style='padding:0px !important;'>".$items["Valor_Total_Factura"]."</td>
								<td style='padding:0px !important;'>".$items["Fecha_Pago_Oportuno"]."</td>
					            <td style='padding:0px !important;'>".$estadofactura_."</td>
					            <td style='padding:0px !important;'>".$items["Fecha_Corte"]."</td>
					            <td style='padding:0px !important;'>".$items["Fecha_Elaboracion"]."</td>
					                <td style='padding:0px !important;'>".$items["Pago_mes_agua"]."</td>

					            <td style='padding:0px !important;'> <input type='hidden' value= ".$items["Id_Consumo_Contador"]."  name='Id_Consumo_Contador[]'  size='10' readonly></td>
					          

				            ";
						}

				echo "</table>";
						} else {

						echo "<br>
						<m style='color:#317eac !important; font-size:18px;''>Nota:Este usuario no debe facturas de agua.</m>
						";
						
					
					}
					///Fin Mostrar Factura del usuario
					/*-----------------------------------------------------------------------------*/
				///Mostrar el total Factura del usuario
					/*-----------------------------------------------------------------------------*/
					$tf=0;
				if ($tf < count($totalfacturas) ) {
						for($tf= 0; $tf < count($totalfacturas); $tf++) {
						   $totalfactura = $totalfacturas[$tf];
						   if($totalfactura["total"]==0){
						  echo "
				           <br> <m style='color:#317eac; font-size:12px;''>Nota:Total facturas igual a  $0.</m>
						";
						   }else{
						   	   echo " </h4><div class='row text-right'><h5>TOTAL FACTURAS: $<input type='text'    style='border:none; width:200px; margin:0; padding:0;'    id='totalValorCapturado' value='".$totalfactura["total"]."' disabled='disabled'> </div></h5>";
                               }
						  
						
							}

						} else {
						echo " <m style='color:#317eac; font-size:12px;''>Nota:Total facturas igual a  $0.</m>";
						
					}
						///Fin Mostrar el total Factura del usuario
					/*-----------------------------------------------------------------------------*/
			

				//Hallar total a pagar
				/*--------------------------------------------------------------------------------------*/


				 	
				
				if($totalfactura["total"]==0 && $totalmultas["total"]==0){



				}else{
					$Total=$totalfactura["total"]+$totalmultas["total"]+$valoradicional["Valor_Total"]+$totalalcantarillado;
							echo "
				<div class='row'>
							<div class='col-lg-12 '>
				<div class='row text-right'><h4>TOTAL A PAGAR: $<input type='text'  id='totalValorCapturado' value='".$Total."'   style='border:none; width:200px; margin:0; padding:0;'  disabled='disabled' ></h4></div>

				</div>
				</div>
				 ";
				
				echo "<div>------------------------------------------------------------------------------------------------------------------------------------------<div>";
                  




                  echo "<button type='submit' id='btnPagarFactura' class='btn btn-primary' id='pagarfacturas'>Pagar Factura <span class='glyphicon glyphicon-list-alt'></span></button>";
				
				}

				//Fin Hallar total a pagar
				/*--------------------------------------------------------------------------------------*/
				echo "</form>";

				//// Inicio Desprendible factura
				/*---------------------------------------------------------------------------*/

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

            ";


				//// Fin Desprendible factura
				/*---------------------------------------------------------------------------*/


				    }
				    else{
						echo "<br>
						<m style='color:#317eac; font-size:20px;''>Nota:Este usuario no debe facturas de agua.</m>
						";

				}
				}
				     	///Fin de informacion para cuando el usuario no tiene multas
	            	/*--------------------------------------------------------------------------------------*/


	   
					}
					 /*----------------------- FIN CONDICION CUANDO LA CANTIDAD DE PREDIOS POR EL USUARIO ES IGUAL 1-------------------------------*/
				}
					  /*-----------------------FIN FOR CONTAR CANTIDAD DE  PREDIOS DEL USUARIO-------------------------------*/
							
						}
						 ///------------Fin Condicion para Verificar  si el usuario tiene predios registrados-----------------///
						 else {
							
					echo "
				<m style='color:red; font-size:16px;''>Nota:Este usuario no tiene predios Registrados.</m>
						";
						
					}
					

	} else {
		echo "No se han encontrado resultados para ".$documento. ". Por favor verifique que el usuario este activo en el sistema";
		echo "<input id='nombre_usuario_busquedaServiProducto' type='hidden';>";
	}

?>
</div>