<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
<!--formulario usuarios-->


		<div id="contenedor-nuevo-valor" style="display:none;">
			<div class="row">
				<div class="col-lg-8">

          	  <h5 id="titulo">REGISTRO DE VALOR CONSUMO</h5>

	          Nombre Consumo:    <br><input class="form-control" type="text" id="nombrevalor"    placeholder="Nombre"><br>
	          Valor Consumo:  <br><input class="form-control" type="number" id="valorconsumo"  placeholder="$ Valor"><br>
	          
	          <a href="#" class="btn btn-primary btn-xs" id="guardarconsumo" accion="1"> <span class="glyphicon glyphicon-floppy-disk"></span> Agregar </a>
	          <a href="#" class="btn btn-danger  btn-xs no" id="cancelarvalro"><span class=" glyphicon glyphicon-remove "></span> Cancelar </a>         
      	
		     

  				</div>
			</div>
		</div>
<br>