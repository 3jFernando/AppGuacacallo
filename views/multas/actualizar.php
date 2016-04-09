<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
 <!--formulario multas-->


	
		<div id="contenedor-nuevo-tipomultas" style="display:none;">
			<div class="row">
				<div class="col-lg-8">

          	  <h5 id="titulo">REGISTRO DE USUARIOS</h5>

	         
	          Nombre multa:  <br><input class="form-control" type="text" id="Nombre_Multa" placeholder="nombremulta"><br>
	          valor multa:    <br><input class="form-control" type="number" id="Valor_Tipo_Multa"   placeholder="valormulta"><br>

	          <a href="#" class="btn btn-primary btn-xs" id="actualizarmultas" > actualizar </a>
	          <a href="#" class="btn btn-danger  btn-xs" id="cancelartipomulta"> - Cancelar </a>         
      	
		     
		      <input type='hidden' id='Id_Tipo_Multa' value="$_POST['Id_Tipo_Multa']"><hr>

  				</div>
			</div>
		</div>
