<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
 <!--formulario predios-->


<form name="MyForm">
		<div id="contenedor-nuevo-predio" style="display:none;">
			<div class="row">
				<div class="col-lg-8">

          	  <h5 id="titulo">REGISTRO DE PREDIOS</h5>

          	  Busque el usuario:<br>
          	  <input class="form-control input-sm" type="text" id="usuario-busqueda"    
	          placeholder="busque al usuario"><br>

	          <div id="resultado-busquedad-usuarioPredio" style="display:none;"></div><br>

	          <?php $fecha = date("Y/m/d"); 
		          echo "
		          Fehca de inscripcion:<br><input type='text' id='fecha_predio' class='form-control input-sm' disabled='disabled'
		          value='".$fecha."'><br>
		          ";
	          ?>

          	  Tipo Predio:<br>
          	  <select id="select-tipoPredio"  class="form-control input-sm">
          	  	         	  	          	  
          	  </select><br>  
          	   Servicio Alcantarillado:<br>
          	   <select  id="alcantarillado" class="form-control input-sm ">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
                </select> <br>

            
	          Nombre:<br><input class="form-control input-sm" type="text" id="nombre_predio"    
	          placeholder="nombre del predio"><br>


 valor de cada hectarea:<br> <input type="number" class="form-control input-sm" id="valor"
              placeholder="valor por cada hectarea" name="numero2" onchange="sumar()"  >
 


             cantidad de hectareas:<br> <input type="number" class="form-control input-sm" id="cantidad"
             placeholder "cantidad de hectareas del predio" name="numero1" onchange="sumar()" >

  
             Total Precio:<br> <input type="text" name="resultado" class="form-control input-sm" id="total" readonly>
	         	         
	          <br>
	          <a href="#" class="btn btn-primary btn-xs" id="guardar_predio" accion="1"> + Agregar </a>    
	          <a href="#" class="btn btn-danger btn-xs" id="cancelar_predio"> - Cancelar </a>    
      		  <hr>
  			</div>

  			 <input type="hidden" id="_Id_Predio_Usuario" value="$_POST['Id_Predio_Usuario']">
           <input type="hidden" id="_Id_Alcantarillado" value="$_POST['Id_Alcantarillado']">
  			 <input type="hidden" id="_accion_predios"> 
			</div>
		</div>

</form>