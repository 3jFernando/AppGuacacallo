<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
 <!--formulario predios-->


		<div id="contenedor-pago-factura-agua" style="display:none;">
			<div class="row">
				<div class="col-lg-12">

          	  <h5 id="titulo">PAGAR FACTURA</h5>

          	  Busque el usuario:<br>
          	  <div class="form-group input-group col-lg-5">
          	 
	          <span class="input-group-btn">
                             <button class="btn btn-default" type="button"><i class=" glyphicon glyphicon-search"></i>
                             </button>
                           </span> <input class="form-control" type="text" id="usuario-busqueda-factura"    
	          placeholder="busque al usuario"></div><br>

	          <div id="resultado-busqueda-factura" style="display:none;"></div><br>


	        
      		  <hr>
      		   <input type="hidden" id="_Id_Predio_Usuario" value="$_POST['Id_Predio_Usuario']">
      		    <input type="hidden" id="_Id_Usuario" value="$_POST['Id_Usuario']">
               <input type="hidden" id="_Nombre_Predio" value="$_POST['Nombre_Predio']">
              <input type="hidden" id="_Nombre_Tipo_Predio" value="$_POST['Nombre_Tipo_Predio']">
              <input type="hidden" id="_cantidadfaturas" value="$_POST['cantidadfaturas']">
  			</div>

			</div>
		</div>