<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
 <!--formulario predios-->


		<div id="contenedor-completar-facturaServiProducto" style="display:none;">
			<div class="row">
				<div class="col-lg-8">

	          	  <h5 id="titulo">AGREGAR PRODUCTO O SERVICIOS</h5>

	          	  Busque el producto:<br>
	          	  <input class="form-control" type="text" id="serviProducto-busqueda-facturaServiProducto"    
		          placeholder="busque el producto o servicio deseado"><br>

		          <div id="resultado-serviProducto-busqueda-facturaServiProducto" style="display:none;"></div>  
		          <br>     	         
	      		  <input type="hidden" id='Id_Factura_CreadaServiProductos'>	
	      		  <input type="hidden" id="id_detalle_factura">
      		  
  				</div>
			</div>
		</div>

		

