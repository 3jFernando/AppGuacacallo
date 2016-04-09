<?php 
		
		require_once('../../models/crearFacturaServiProducto/crearFacturaServiProducto.php'); 
		$Id_Factura = $_POST['Id_Factura'];
		$factura = cargarDatosFacturaCreadaCredito($Id_Factura);

		$i = 0;
		if ($i < count($factura) ) {
			for($i = 0; $i < count($factura); $i++) {
			    $items = $factura[$i];

			    echo  
	            "
	            	Fecha de vencimiento:<br>
				    <input type='date' id='fecha_factCreditoVencimiento' class='form-control' ><br>		          

	            	Fecha de creacion:<br>
				        <input type='text' id='fecha_factCredito' class='form-control' disabled='disabled' 
				        value='".$items["Fecha_Factura"]."'><br>

	            	Valor Total de la Factura:<br>
			          	<input type='text' id='valorTotalFact' class='form-control' disabled='disabled' 
			          	value='".$items["Valor_Total_Factura"]."'><br>

		          	Avono del Usuario:<br>
			          	<input type='text' id='valorAvonoFact' class='form-control' 
			          	placeholder='por favor ingrese el avono deseado'><br>

		          	Valor de la Deuda:<br>
			          	<input type='text' id='valorDeudaFact' class='form-control' 
			          	disabled='disabled' value='".$items["Valor_Total_Factura"]."'><br>
				   
		            <a href='#' class='btn btn-primary btn-xl' id='finalizarFactServiPorductosCredito'>Finalizar</a>    

		          	<input type='hidden' id='id_factCredito' disabled='disabled' value='".$items["Id_Factura"]."'>

	            ";

		}

	} else {

		echo "mal";

	}
	

?>
