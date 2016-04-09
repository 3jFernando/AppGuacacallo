<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
 <!--formulario predios-->


		<div id="contenedor-nueva-facturaServiProducto" style="display:none;">
			<div class="row">
				<div class="col-lg-8">

          	  <h5 id="titulo">CREAR FACTURA</h5>

          	  Busque el usuario:<br>
          	  <input class="form-control" type="text" id="usuario-busqueda-facturaServiProducto"    
	          placeholder="busque al usuario"><br>

	          <div id="resultado-busqueda-facturaServiProducto" style="display:none;"></div><br>

	            Seleccione el Tipo Pago:<br>
          	  <select id="select-tipoPagoFacturaServiPorductos"  class="form-control">
          	  	         	  	          	  
          	  </select><br>  

	          <?php $fecha = date("Y/m/d"); 
		          echo "
		          Fecha de creacion:<br><input type='text' id='fecha_factura' class='form-control' disabled='disabled'
		          value='".$fecha."'><br>
		          ";
	          ?>

	          <a href="#" style="display:none;" class="btn btn-primary btn-xl" id="crear_facturaServiPreoducto"> Siguiente --> </a>    
      		  <hr>
  			</div>

			</div>
		</div>

