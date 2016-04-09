<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
<div id="contenedor-nuevo-reunion" style="display:none;">
<div class="row">
    <div class="col-lg-8">
        <h5 id="titulo">REGISTRO DE REUNIONES</h5>
	          Nombres de Reunion:<br><input class="form-control" type="text" id="nombre_reunion"    placeholder="nombre" required=""><br>
	          Detalle de Reunion:<br><textarea class="form-control" rows="3" id="detalle_reunion"></textarea><br>
	          Fecha reunion:     <br><input class="form-control" type="date" id="fecha_reunion" ><br>
	        
	          <a href="#" class="btn btn-primary btn-xs" id="guardar-reunion" accion="1">  Agregar <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
	          <a href="#" class="btn btn-danger  btn-xs" id="cancelar-reunion"> Cancelar   <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>         
	          <hr>
            <input type="hidden" id="_Id_Detalle_Reunion" value="$_POST['Id_Predio_Usuario']">
            <input type="hidden" id="_accion_reunion"> 

        </div>
    </div>
</div>
</div>
		



