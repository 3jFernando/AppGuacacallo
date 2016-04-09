<p><br>
<a href="#" class="btn btn-primary btn-xl" id="btn-agregar-usuario" accion="1"> + Agregar un usuario</a>   
<hr>
<table class="table table-hover">

			<tr class="info">
				<th>NIT </th>
				<th>NOMBRES</th>
				<th>APELLIDOS</th>
				<th>TELEFONO</th>
				<th>DOCUMENTO</th>
				<th>ESTADO</th>
				<th>ESTRATO</th>
				<th class="text-center">ACCION</th>
			</tr>
	<?php 

		$nombre = $_POST['nombre'];
		require_once('../../models/usuario/usuario.php'); 

			$usuario = getUsuario($nombre);

			$i = 0;
		  	if ($i < count($usuario) ) {
		  		
		  	for($i = 0; $i < count($usuario); $i++) {
		    	$items = $usuario[$i];

		    $estado_ = '';
			if($items["Estado"] == 1) {
					$estado_ =  "Activo";
					$estado_usuario = "Desactivar";	
				} else {
					$estado_ = "Inactivo";	
					$estado_usuario = "Activar";	
				}

			echo 
			"
			<tr>
				<td>".$items["Id_Usuario"]."</td>
				<td>".$items["Nombre_Usuario"]."</td>
				<td>".$items["Apellido_Usuario"]."</td>
				<td>".$items["Telefono_Usuario"]."</td>
				<td>".$items["Documento_Usuario"]."</td>
				<td>".$estado_."</td>
				<td>".$items["Estrato_Usuario"]."</td>
				
				<td>
				<button class='actualizar btn btn-primary btn-xs'
					nombre='".$items["Nombre_Usuario"]."' 
					apellido='".$items["Apellido_Usuario"]."' 
					telefono='".$items["Telefono_Usuario"]."' 
					documento='".$items["Documento_Usuario"]."' 
					estrato='".$items["Estrato_Usuario"]."' 
					usuario-id='".$items["Id_Usuario"]."'> Actualizar </button>
				<button class='desactivar btn btn-warning btn-xs'
					usuario-id='".$items["Id_Usuario"]."' estado_='".$estado_usuario."'> ".$estado_usuario." </button>					
				</td>		
			</tr>
			";

		}
		} else {

			echo "No se han encontrado resultados para ".$nombre;

		}	

	?>
</table>
