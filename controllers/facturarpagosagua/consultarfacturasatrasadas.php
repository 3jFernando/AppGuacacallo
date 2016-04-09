<form method="post" action="models/facturarpagosagua/agregarcorteaguaapredios.php">
<?php




	$idvalor     = $_POST['valorconsulta'];
	require_once('../../models/facturarpagosagua/facturarpagosagua.php'); 
	$usuariofacturas = CountDeFacturasPendienteDeLosUsuarios();
								
	if ($idvalor>=3) {

 echo "<button type='submit' id='btnPagarFactura' class='btn btn-warning' id='pagarfacturas'>Agregar Corte de Agua <span class='glyphicon glyphicon-check'></span></button>";

						}

					$r=0;
				    if ($r < count($usuariofacturas) ) {

					echo "  <table class='table table-hover'>
				              <tr class='info'>
								<th>NIT FACTURA</th>
								<th>NIT PREDIO</th>
								<th>NIT USUARIO</th>
								<th>USUARIO</th>
								<th>PREDIO </th>
								<th>TIPO PREDIO </th>
								<th>CANTIDAD FACTURAS </th>
							</tr>";
						for($r = 0; $r < count($usuariofacturas); $r++) {
						    $items = $usuariofacturas[$r];


						    if($items["cantidadfaturas"]>=$idvalor){
						    	    echo  
				            "
							<tr>
							    <td>".$items["Id_Factura"]."   </td>
							    <td> <input  value= ".$items["Id_Predio_Usuario"]."  style='border:none;'  name='Id_Predio_Usuario[]'  size='10' readonly></td>
							    <td><input  value= ".$items["Id_Usuario"]."  style='border:none;'  name='Id_Usuario[]'  size='10' readonly></td>
							    <td>".$items["Nombre_Usuario"]." ".$items["Apellido_Usuario"]."</td>
								<td>".$items["Nombre_Predio"]."</td>
								<td>".$items["Nombre_Tipo_Predio"]."</td>
					          <td style='color:red;'>".$items["cantidadfaturas"]."  Facturas pendientes"."</td>
					          </tr>
				            ";
						    }else{
						    		

						    }
						}
						echo "</table>";

		
						} else {
						echo "<m style='color:green; font-size:18px;''>Nota:No se han encontrado usuarios con facturas pendientes.</m><br>";
						echo "<input id='nombre_usuario_busquedaServiProducto' type='hidden';>
				         
						";
					}

?>

</form>