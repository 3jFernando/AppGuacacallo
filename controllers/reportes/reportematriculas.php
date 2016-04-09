

<div class="highlight"> 
   <a href="#" id="btnImprimirSocios"  class="btn btn-success "   onClick="printdiv('conten');" ><span class="glyphicon glyphicon-print"></span> imprimir reporte</a>
</div>

<br>

  <div id="conten"> 
        <table class="table taSble-hover">

		<tr class="info">
			<th>Numero de factura</th>
			<th>Nombre usuario</th>
				
			<th>Apellido</th>
			<th>Documento</th>

			<th>Fecha factura</th>
			<TH>Producto </TH>
			<TH>Valor matricula </TH>
		</tr>

	<?php 

		
      $fechamin=$_POST['fechaminima'];
      $fechamax=$_POST['fechamaxima'];	

      require_once('../../models/reportes/reportes.php'); 
      
      $lista = reportematriculas($fechamin,$fechamax);
      for($i = 0; $i < count($lista); $i++) {
           $items = $lista[$i];
			echo 
			"<tr>

<td>".$items["Id_Factura"]."</td>
		<td>".$items["Nombre_Usuario"]."</td>
		<td>".$items["Apellido_Usuario"]."</td>
		<td>".$items["Documento_Usuario"]."</td>
		<td>".$items["Fecha_Factura"]."</td>
		<td>".$items["Nombre_Servi_Producto"]."</td>
		<td>".$items["Precio_Unitario"]."</td>
					
    </tr>";
		}	

	?>
</table>


</div>