
<?php 

		$documento = $_POST['documento'];
		require_once('../../models/crearFacturaServiProducto/crearFacturaServiProducto.php'); 
		$usuario = getUsuarioFacturaServiProducto($documento);

		$i = 0;
		if ($i < count($usuario) ) {
		for($i = 0; $i < count($usuario); $i++) {
		    $items = $usuario[$i];

		    echo  
            "

	          Nombres del usuario:<br><input class='form-control' type='text' id='nombre_usuario_busquedaServiProducto' 
	          placeholder='nombres usuario' disabled='disabled' value='".$items["Nombre_Usuario"]."'><br>

	          Apellido del usuario:<br><input class='form-control' type='text' id='apellido_usuario_busquedaServiProducto'   
	          placeholder='apellidos usuario' disabled='disabled' value='".$items["Apellido_Usuario"]."'>

	          <input type='hidden' id='id_usuario_busquedaServiProducto'   
	          value='".$items["Id_Usuario"]."'>

            ";

		}

	} else {
		echo "No se han encontrado resultados para ".$documento. ". Por favor verifique que el usuario este activo en el sistema";
		echo "<input id='nombre_usuario_busquedaServiProducto' type='hidden';>";
	}

?>