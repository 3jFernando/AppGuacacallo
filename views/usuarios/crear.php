<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
<!--formulario usuarios-->


		<div id="contenedor-nuevo-usuario" style="display:none;">
			<div class="row">
				<div class="col-lg-8">

          	  <h5 id="titulo">REGISTRO DE USUARIOS</h5>

	          Nombres:    <br><input class="form-control" type="text" id="nombre"    placeholder="nombre"><br>
	          Apellidos:  <br><input class="form-control" type="text" id="apellido"  placeholder="apellido"><br>
	          Telefono:   <br><input class="form-control" type="text" id="telefono"  placeholder="telefono"><br>
	          Documento:  <br><input class="form-control" type="text" id="documento" placeholder="documento"><br>
	          Estrato:    <br><input class="form-control" type="text" id="estrato"   placeholder="estrato"><br>

	          <a href="#" class="btn btn-primary btn-xs" id="guardar" accion="1"> + Agregar </a>
	          <a href="#" class="btn btn-danger  btn-xs" id="cancelar"> - Cancelar </a>         
      	
		      <input type='hidden' id='_accion' value="1">
		      <input type='hidden' id='_usuarioId' value="$_POST['Id_Usuario']"><hr>

  				</div>
			</div>
		</div>
