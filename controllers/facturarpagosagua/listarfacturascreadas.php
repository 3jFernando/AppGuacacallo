<form method="post" action="models/facturarpagosagua/registrarpagosbyfactura.php">
	<?php 
		require_once('../../models/facturarpagosagua/facturarpagosagua.php'); 

 
      $anio=$_POST['anio'];
     $mespagoagua=$_POST['mespagoagua'];
     $select=$mespagoagua."/".$anio;
      $Id_Valor_Consumo=$_POST['valorpago'];
     
       echo " <input type='hidden' class='form-control' name='idvalorconsumo' value= ".$_POST['valorpago']."    size='10' readonly>";
     
    $lista = listadofacturascreadas($select);
	$valorconsumoseleccionado=SelectValorConsumoSeleccionado($Id_Valor_Consumo);

	$i=0;
	if ($i < count($lista) ) {
		 $verificarasignarpagosafacturas = VerificarSiSeAgregaronPagosalasFacturas($select);
		$r=0;
		if($r < count($verificarasignarpagosafacturas)){
			echo "
		<div class='row'>
    <div class='col-lg-12'>
    <div class='col-lg-6'>
 Fecha Vencimiento:<br><input class='form-control input-sm' type='date' name='Fecha_Pago_Oportuno'placeholder='Pago Vecimiento' required></div>
<div class='col-lg-6'>
 Fecha Corte:<br><input type='date' class='form-control input-sm' name='fechacorte' placeholder='fecha corte' required></div></div>

  <div class='col-lg-12' style='margin-top:20px;'>
    <div class='col-lg-6'>
 Fecha Elaboracion<br><input class='form-control input-sm' type='date' name='fechaelaboracion' id='fechaelaboracion' required></div>
<div class='col-lg-6'>
 Contador:<br><select name='contador' class='form-control input-sm'>
 <option value='0'>NO</option>
 <option value='1'>SI</option>
</select> 
</div></div></div>

<table class='table table-hover'>
			<tr class='info'>
				<th>NIT </th>
				<th>NIT PREDIO</th>
				<th>NIT USUARIO</th>
				<th>FECHA FACTURA</th>
				<th>NOMBRE PREDIO</th>
				<th>NOMBRE USUARIO</th>
				<TH>APELLIDO</TH>
				<TH>DOCUMENTO</TH>
			</tr><br>



		";
		for($i = 0; $i < count($valorconsumoseleccionado); $i++) {

			$items = $valorconsumoseleccionado[$i];
			echo "
			<div class='row'>
			<div class='col-lg-12'>
			  <div class='col-lg-6'>
			  <label>Nombre Pago:</label><br>
			  <input type='text' class='form-control input-sm' value= ".$items['Nombre_Valor']."    size='10' readonly></div>
			  <div class='col-lg-6'>
			  <label>Valor Pago:</label><br>
			  <input type='text' class='form-control input-sm' value= ".$items['Valor']." name='valorfactura'    size='10' readonly>
			   
			   </div> 
			   </div>
			  </div>
			  <div class='row'>
			<div class='col-lg-6' style='margin-top:10px;margin-left:15px;margin-bottom:10px;'>
			  <button type='submit'class='btn btn-primary btn-sm' id='#registrarfacturascreadas'>Agregar Pagos <span class='glyphicon glyphicon-floppy-
	}

disk'></span></button>
 </div>
			  
			  </div>
			  ";
     

		}
		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];
                  //$Id_Predio_Usuario=$items["Id_Predio_Usuario"];
				//  $cantidadfacturas=contarCantidaddeFacturasPendientesIdPredio($Id_Predio_Usuario);	
				 // echo "<input value= ".$cantidadfacturas["cantidadfaturas"]." class='form-control'  name='cantidadfaturas[]'  size='10' readonly>";


			echo 
			"
			<tr>
				<td>  <input value= ".$items["Id_Factura"]." class='form-control  input-sm'  name='idfactura[]'  size='10' readonly> </td>
				<td>  <input value= ".$items["Id_Predio_Usuario"]." class='form-control  input-sm'  name='Id_Predio_Usuario[]'  size='10' readonly> </td>
					<td>  <input value= ".$items["Id_Usuario"]." class='form-control  input-sm'  name='Id_Usuario[]'  size='10' readonly> </td>
				<td>".$items["Fecha_Factura"]."</td>
				<td>".$items["Nombre_Predio"]."</td>

				<td>".$items["Nombre_Usuario"]."</td>
				<td>".$items["Apellido_Usuario"]."</td>
				<td>".$items["Documento_Usuario"]."</td>
            </tr>
			";
		}	

echo "</table>";
		}else{
			echo "<m style='color:red; font-size:15px;''>Nota: Ya se facturaron los pagos de los predios para este mes  (".$mespagoagua=$_POST['mespagoagua']. " / ".$anio=$_POST['anio']." ).</m>";

		}
		
	}else{
		echo "<m style='color:red; font-size:15px;''>Nota: No se han registrado facturas para este mes.</m>";
	}
	?>
</form>
<script type="text/javascript">

 $(document).on('click','#registrarfacturascreadas', function() {

            $.ajax({
                success:function(data) {
                   
                    $("#cargando").slideDown('slow');
                    toastr.info('Facturas creadas correctamente, recuerde agregar los pagos.',' recuerde agregar los pagos.');                
                    setTimeout( 2000);                                                                                                   
                }
            });

 	   });
 </script>