

<div class="highlight"> 
   <a href="#" id="btnImprimirSocios"  class="btn btn-success "   onClick="printdiv('conten');" ><span class="glyphicon glyphicon-print"></span> imprimir reporte</a>
</div>

<br>

  <div id="conten"> 
        <table class="table taSble-hover">

		<tr class="info">
			<th>Numero de factura</th>
			<th>Nombre del producto</th>
				
			<th>Cantidad</th>
			<th>Precio unitario</th>
			<th>Fecha factura</th>
			<TH>Tipo de Movimeinto</TH>
		</tr>

	<?php 

		
      $fechamin=$_POST['fechaminima'];
      $fechamax=$_POST['fechamaxima'];	

      require_once('../../models/reportes/reportes.php'); 
      
      $lista = egresoslistar($fechamin,$fechamax);
      for($i = 0; $i < count($lista); $i++) {
           $items = $lista[$i];
			echo 
			"<tr>

		<td>".$items["Id_Factura"]."</td>
		<td>".$items["Nombre_Servi_Producto"]."</td>
		<td>".$items["Cantidad"]."</td>	
		<td>".$items["Precio_Unitario"]."</td>
		<td>".$items["Fecha_Factura"]."</td>
		<td>".$items["Nombre_Tipo_Movimiento"]."</td>			
    </tr>";
		}	

	?>
</table>


</div>