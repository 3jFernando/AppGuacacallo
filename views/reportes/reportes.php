<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
<div class="navbar-form navbar-left" role="search">
  <div class="form-group">
    
    <div class="form-group">
        <label for="exampleInputName2">Tipo de movimiento</label><br>
        <select id="tipomovimiento" class="form-control">
  	    </select>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail2">fecha inicio</label><br>
      <input type="date" id="fechaminima" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail2">fecha final</label><br>
      <input type="date" id="fechamaxima" class="form-control" required>
    </div><br><br>
<div class="form-group">
    <button type="submit" id="botonreportes" class="btn btn-primary">Consultar 
      <span class="glyphicon glyphicon-search"></span>
    </button>
    </div>
</div></div>
