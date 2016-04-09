<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
 <!--formulario predios-->


<div id="contenedor-actualizar-administrador" style="display:none;">

        <h5 id="titulo">ACTUALIZAR DATOS DE LA CUENTA</h5>      	           	 

	    Nombres:<br><input class="form-control" type="text" id="nombre_administrador"    
	    placeholder="Nombre del administrador"><br>

	    Apellidos:<br><input class="form-control" type="text" id="apellido_administrador"    
	    placeholder="Apellidos del administrador"><br>

	    Correo Electronico:<br><input class="form-control" type="text" id="correo_administrador"    
	    placeholder="Correo Electronico del administrador"><br>

	    Identificacion:<br><input class="form-control" type="text" id="identificacion_administrador"    
	    placeholder="Identificacion del administrador"><br>
	         	         
	    <br>
	    <a href="#" class="btn btn-primary btn-xs" id="guardar_administrador">HECHO</a>    
	    <a href="#" class="btn btn-danger btn-xs" id="cancelar_administrador">CANCELAR</a>    
	    <hr>
</div>

