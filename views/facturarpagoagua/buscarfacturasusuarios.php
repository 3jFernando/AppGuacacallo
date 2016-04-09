<div  id="facturas" class="row ">

    <div class="navbar-form navbar-left" role="search">

  <div class="form-group col-lg-12">
  <h5>Seleccione el mes a facturar</h5>
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
  </div>
  <div class="col-lg-12">
<h5>Seleccione el valor del pago</h5>
<select id="SelectValorConsumo" class="form-control input-sm">
	
</select>
<button type="submit"class="btn btn-primary btn-sm" id="ListarFacturas">Consultar Facturas <span class="glyphicon glyphicon-list"></span></button>
</div>
</div>


</div>

<hr>
