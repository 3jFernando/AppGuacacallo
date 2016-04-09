
   
<form method="post" action="models/facturarpagosagua/registrarfacturas.php"> 


	<?php 


		require_once('../../models/facturarpagosagua/facturarpagosagua.php'); 
		$mespagoagua=$_POST['mespagoagua'];
		$anio=$_POST['anio'];
	    $select=$mespagoagua."/".$anio;

	    $lista = listadofacturascreadas($select);
	$i=0;
	if ($i < count($lista) ) {
			echo "<m style='color:green; font-size:15px;''>Nota: Ya existen facturas creadas para este mes.</m>";

	}else{
		echo "
		<div class='row col-lg-12'>
<h4>Listado de predios</h4>
<button style='margin-left:20px !important;' id='registrarfacturas' type='submit' onclick= hello(); class='btn btn-danger' id='crearfacturas'>Facturar <span class='glyphicon glyphicon-list-alt'></span></button>
</div>
<table class='table table-hover'>

			<tr class='info'>
				<th>NIT </th>
				<th>TIPO PREDIO</th>
				<th>USUARIO</th>
				<th>NOMBRE PREDIO</th>
				<th>FECHA</th>
				
			</tr>



		";
			//$mesanio=$_POST['mespagoagua'].$_POST['anio'];
		echo "<h3> Mes seleccionado: ".$mespagoagua." del ".$anio."</h3>";
		 echo " <input type='hidden' class='form-control' name='mespagoagua' value= ".$_POST['mespagoagua']."    size='10' readonly>";
		  echo " <input type='hidden' class='form-control' name='anio' value= ".$_POST['anio']."    size='10' readonly>";

		  $listapredios = listadopredios();

			for($i = 0; $i < count($listapredios); $i++) {

				$items = $listapredios[$i];
				echo 
				"
				<tr>

                <td>  <input value= ".$items["Id_Predio_Usuario"]." class='form-control  input-sm' name='idprediousu[]'  size='10' readonly> </td>
		
					<td>".$items["Nombre_Tipo_Predio"]."</td>
					<td>".$items["Nombre_Usuario"]. " " .$items["Apellido_Usuario"]."</td>
					<td>".$items["Nombre_Predio"]."</td>
					<td>".$items["Fecha_Inscripcion"]."</td>	
							
				</tr>
				";
			}	

			echo "</table>";

	}
	
	?>

</form>

<script type="text/javascript">


 $(document).on('click','#registrarfacturas', function() {

            $.ajax({
                success:function(data) {
                   
                    $("#cargando").slideDown('slow');
                    toastr.info('Facturas creadas correctamente, recuerde agregar los pagos.',' recuerde agregar los pagos.');                
                    setTimeout( 2000);                                                                                                   
                }
            });

 	   });
</script>