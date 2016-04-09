<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
<div id="contenedor-nuevo-productosServicios" style="display:none;">
<div class="row">
    <div class="col-lg-8">
        <h5 id="titulo">REGISTRO DE PRODUCTOS Y SERVICIOS</h5>     
        <label>Tipo de producto</label><br>
<select id="Selecttipoproducto" class="form-control">
	
</select><br>   
	          Nombre:<br><input class="form-control" type="text" id="nombre_productoServicio"    placeholder="nombre" required=""><br>
	          Detalle:<br><textarea class="form-control" rows="3" id="detalle_productoServicio"></textarea><br>
	          Valor $:<br><input class="form-control" type="text" id="valor_productoServicio" ><br>
	        
	          <a href="#" class="btn btn-primary btn-xs" id="guardar-productoServicio" accion="1">  Agregar <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
	          <a href="#" class="btn btn-danger  btn-xs" id="cancelar-productoServicio"> Cancelar   <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>         
	          <hr>

            <input type="hidden" id="_Id_Servi_Producto" value="$_POST['Id_Servi_Producto']">
            <input type="hidden" id="_accion_productoServicio"> 

        </div>
    </div>
</div>
</div>