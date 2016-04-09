<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
 <!--formulario multas-->


		<div id="contenedor-nueva-multa" style="display:none;">
			<div class="row">
				<div class="col-lg-8">

          	  <h5 id="titulo">REGISTRO DE MULTAS</h5>

          	  Busque el usuario:<br>
          	  <input class="form-control" type="text" id="usuario-busqueda-multas"    
	          placeholder="busque al usuario"><br>

	          <input type="hidden" id="Id_Tipo_Pago_Multas">
	          <input type="hidden" id="Id_Tipo_Mvimiento_Multas">
	          <input type="hidden" id="fechaCreacion">
	          <input type="hidden" id="valor_total">
	          <input type="hidden" id="Id_Usuario">	
	          <input type="hidden" id="Id_Multa_Multas">     
	          
			</div>
		</div>

