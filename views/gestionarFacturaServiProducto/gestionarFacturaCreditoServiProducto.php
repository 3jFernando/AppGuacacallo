<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
 <!--formulario predios-->


		<div id="contenedor-gestionar-facturaServiProductoDeUsuario" style="display:none;">
			<div class="row">
				<div class="col-lg-8">

	          	  <h5 id="titulo">GESTIONAR FACTURA DE USUARIOS</h5>

	          	  Busque el usuario:<br>
	          	  <input class="form-control" type="text" id="documentoUsuarioGestionarFacturasServiProductos"    
		          placeholder="busque al usuario"><br>
		        </div>
		        	<div class="col-lg-8">  
	  				<div id="AbonoPagadoFacturaCreditoServiProductoDeUsuario" style="display:none;"></div>
	  			</div>
		        <div class="col-lg-12">  
		        	<div id="ActualizarFacturaCreditoServiProductoDeUsuario" style="display:none;"></div>		        	
		        	
		          	<div id="resultado-busqueda-facturaCreditoServiProductoDeUsuario" style="display:none;"></div>
					<div id="resultado-busqueda-facturaContadoServiProductoDeUsuario" style="display:none;"></div><br>
	  			</div>

			</div>
		</div>

