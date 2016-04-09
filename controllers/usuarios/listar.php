 
<div class="highlight"> 
<a href="#" class="btn btn-primary btn-xl" id="btn-agregar-usuario" accion="1"> <span class="glyphicon glyphicon-plus"></span> Agregar un usuario</a> 
<a href="#" id="btnImprimirSocios"  class="btn btn-success pull-right"   onClick="printdiv('conten');" ><span class="glyphicon glyphicon-print"></span> imprimir reporte</a>
</div>



 
<hr>
<div id="conten">      
<table class="table table-hover">

			<tr class="info">
				<th>NIT </th>
				<th>NOMBRES</th>
				<th>APELLIDOS</th>
				<th>TELEFONO</th>
				<th>DOCUMENTO</th>
				<th>ESTADO</th>
				<th>ESTRATO</th>
				<th class="text-center" id="accion">ACCION</th>
			</tr>
	<?php 

		require_once('../../models/usuario/usuario.php'); 

		$lista = listado();

		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];

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
				<button id='accion' class='actualizar btn btn-primary btn-xs' 
					nombre='".$items["Nombre_Usuario"]."' 
					apellido='".$items["Apellido_Usuario"]."' 
					telefono='".$items["Telefono_Usuario"]."' 
					documento='".$items["Documento_Usuario"]."' 
					estrato='".$items["Estrato_Usuario"]."' 
					usuario-id='".$items["Id_Usuario"]."'> Actualizar <span class='glyphicon glyphicon-pencil'></span></button>
				<button id='accion' class='desactivar btn btn-warning btn-xs'
					usuario-id='".$items["Id_Usuario"]."' estado_='".$estado_usuario."'> ".$estado_usuario."  <span class='glyphicon glyphicon-remove'></span></button>					
				</td>		
			</tr>
			";

		}	

	?>
</table>

</div>


