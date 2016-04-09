
<?php 

		$nombre = $_POST['nombre'];
		require_once('../../models/crearFacturaServiProducto/crearFacturaServiProducto.php'); 
		$serviProducto = getServiProducto($nombre);

		$i = 0;
		if ($i < count($serviProducto) ) {
		for($i = 0; $i < count($serviProducto); $i++) {
		    $items = $serviProducto[$i];

		    echo  
            "
	          Nombres del Producto:<br><input class='form-control' type='text' id='nombreServiProducto_busqueda' 
	          placeholder='nombres producto' disabled='disabled' value='".$items["Nombre_Servi_Producto"]."'>


	          Descripcion:<textarea class='form-control' rows='3' id='descripcionServiProducto_busqueda'
	          placeholder='descripcion del producto' disabled='disabled'>".$items["Descripcion"]."</textarea>

	          Valor:<br><input class='form-control' type='text' id='valorServiProducto_busqueda'   
	          placeholder='valor del producto' disabled='disabled' value='".$items["Valor_Servi_Producto"]."'>	          
	          <br>
	          <a href='#' class='btn btn-warning btn-xl' id='anadirServiProducto'> 
	          	Elegir Producto 
	          </a>  	          
	          
	          <input type='hidden' id='id_Servi_Producto'   
	          value='".$items["Id_Servi_Producto"]."'>

	          <input type='hidden' id='Valor_Servi_Producto'   
	          value='".$items["Valor_Servi_Producto"]."'>

            ";

		}

	} else {
		echo "No se han encontrado resultados para ".$nombre.".";
		echo "<input id='nombreServiProducto_busqueda' type='hidden';>";
	}

?>