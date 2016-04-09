<h3>Seleccione el mes a crear las facturas</h3>

  <div class="form-group row">
    
<div class="navbar-form navbar-left" role="search">
  <div class="form-group">

   <select id="mespagoagua" class="form-control input-sm"> 
  <option value="Enero">Enero</option> 
  <option value="Febrero">Febrero</option> 
  <option value="Marzo">Marzo</option> 
  <option value="Abril">Abril</option> 
  <option value="Mayo">Mayo</option> 
  <option value="Junio">Junio</option> 
  <option value="Julio">Julio</option> 
  <option value="Agosto">Agosto</option> 
  <option value="Septiembre">Septiembre</option> 
  <option value="Octubre">Octubre</option> 
  <option value="Noviembre">Noviembre</option>
   <option value="Diciembre">Diciembre</option>  
  </select>

   <select id="anio" class="form-control input-sm"> 
  <?php
          
             for($i=date("Y")+1;1970<=$i;$i--)
    {
        echo "<option value='".$i."'>".$i."</option>";
    }
  ?>
    </select>

<button style="margin-left:20px !important;" type="submit" class="btn btn-primary btn-sm" id="crearfacturas">Crear facturas para este mes <span class="glyphicon glyphicon-list-alt"></span></button>
</div></div>
</div>
