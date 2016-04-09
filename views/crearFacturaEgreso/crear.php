<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
<div>
<div class="row">
    <div class="col-lg-8">
        <h5 id="titulo">CREANDO FACTURAR DE EGRESOS</h5>     
        <label>Tipo de ServiProducto</label><br>
<select id="Selecttipoproducto" class="form-control">
	
</select><br>   
	          Nombre:<br><input class="form-control" type="text" id="nombre_productoServicio"    placeholder="nombre" required=""><br>
	          Detalle:<br><textarea class="form-control" rows="3" id="detalle_productoServicio"></textarea><br>
	          Valor Total $:<br><input class="form-control" type="text" id="valor_productoServicio" ><br>

			  Cantidad Total:<br><input class="form-control" type="text" id="cantidad_productoServicio" ><br>			        
	          
	          <a href="#" class="btn btn-primary btn-xl" id="btnCrearFacturaEgresoV2" accion="1">  Crear Factura Egreso <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </a>     
	          <hr>

              <input type="hidden" id="_Id_Servi_Producto" value="$_POST['Id_Servi_Producto']">
              <input type="hidden" id="idUltima_facturaCreadaDetipoEgreso"> 
              <input type="hidden" id="idUltimo_ServProductoCreadoDetipoEgreso"> 

        </div>
    </div>
</div>
</div>