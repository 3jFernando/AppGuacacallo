<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>

 <!--formulario predios-->


		<div id="contenedor-completar-facturaCredito" style="display:block;">
			<div class="row">
				<div class="col-lg-8">
	          	  <h5 id="titulo">FACTURACION DE CREDITO</h5>
	          	  <div id="resultadoConsultaCargarDatosfactServiProductosCredito"></div>	<br>          	
	  			  <input type='hidden' id='id_ultimoCreditoCreado'>		  			  
	  			</div>
			</div>
		</div>

