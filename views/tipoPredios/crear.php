<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
<!--formulario tipo predios-->


		<div id="contenedor-nuevo-tipoPredio" style="display:none;">
			<div class="row">
				<div class="col-lg-8">

          	  <h5 id="titulo">REGISTRO TIPO DE PREDIOS</h5>

	           Nombre:<br><input class="form-control" type="text" id="nombre_tipo_predio"    
	          placeholder="nombre del predio"><br>
	         
	          <a href="#" class="btn btn-primary btn-xs" id="guardar_tipoPredio" accion="1"> + Agregar </a>    
	          <a href="#" class="btn btn-danger btn-xs" id="cancelar_tipoPredio"> - Cancelar </a>    
      		  <hr>
  			</div>

  			<input type="hidden" id="_tipoPredio" value="$_POST['Id_Tipo_Predio']">

			</div>
		</div>