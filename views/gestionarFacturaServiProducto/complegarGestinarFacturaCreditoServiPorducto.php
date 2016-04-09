<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
 <!--formulario predios-->
<hr>
<div class="row">
	<div class="col-lg-8">

		<div id="gestionarFacturaCreditoServiPorducto" style="display:block;">
			
			<h5 id="titulo">GESTIONAR FACTURA DE USUARIOS AGREGANDO ABONOS A LA DEUDA.</h5>

		Total de la Factura:<br>
		<input class="form-control" disabled="disabled" type="text" id="totalValorFacturaCreditoServiPorcutos"><br>
		Total de la Deuda:<br>
		<input class="form-control" disabled="disabled" type="text" id="totalDeudaFacturaCreditoServiPorcutos"><br>
		Abono de Usuario:<br>
		<i style='color:blue; font-size:12px;'>[por favor asegurece de insertar bien el abono ya que este paso no tiene reversa,
		luego de ingresar el abono presione ENTER. Recuerde que cada ves que presione ENTER el abono se guardara en la base de datos del sistema AppGuacacallo.]</i>
		<input class="form-control" type="number" id="abonoFacturaCreditoServiPorcutos"><br>
		
		<input type="button" id="cancelarGestionarFactiurasServiProductos" class="btn btn-warning btn-xl"  value='CANCELAR GESTIONAR FACTURA'>
		
		<input type="hidden" id="idCreditoFacturaCreditoServiPorcutos"><br>
		<input type="hidden" id="fechaFacturaCreditoServiPorcutos"><br>

		</div>

		<div id="listadoAbonosDeFacturasPorCredito" style="display:block;"></div>

	</div>
</div>		
