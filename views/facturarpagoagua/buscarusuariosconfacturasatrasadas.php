<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
 <!--formulario de faturas-->

<div  id="usuariosconfacturasatrasadas" class="row">
<label style="color:blue; text-size:15px;">Seleccione un valor para consultar los usuarios</label><br>
<div class="navbar-form navbar-left" role="search">
  <div class="form-group">

   <select id="valorconsulta" class="form-control"> 
  <option value="1">1</option> 
  <option value="2">2</option> 
  <option value="3">3</option> 
  <option value="4">4</option> 
  <option value="5">5</option> 
  <option value="6">6</option> 
  </select>
  </div>
   <button type="submit"class="btn btn-primary" id="ListarFacturasUsuarios">Consultar<span class="glyphicon glyphicon-list"></span></button>

</div>
</div>