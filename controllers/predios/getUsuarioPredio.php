
<?php 

		$documento = $_POST['documento'];
		require_once('../../models/predio/predio.php'); 
		$usuario = getUsuarioPredio($documento);

		$i = 0;
		if ($i < count($usuario) ) {
		for($i = 0; $i < count($usuario); $i++) {
		    $items = $usuario[$i];

		    echo  
            "

	          Nombres del usuario:<br><input class='form-control input-sm' type='text' id='nombre_usuario_busqueda' 
	          placeholder='nombres usuario' disabled='disabled' value='".$items["Nombre_Usuario"]."'><br>

	          Apellido del usuario:<br><input class='form-control input-sm' type='text' id='apellido_usuario_busqueda'   
	          placeholder='apellidos usuario' disabled='disabled' value='".$items["Apellido_Usuario"]."'>

	          <input type='hidden' id='id_usuario_busqueda'   
	          value='".$items["Id_Usuario"]."'>

            ";

		}

	} else {
		echo "No se han encontrado resultados para ".$documento. ". Por favor verifique que el usuario este activo en el sistema";
	}

?>