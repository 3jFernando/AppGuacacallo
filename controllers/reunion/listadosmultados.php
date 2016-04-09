<br>
<form method="post" action="models/reunion/listmultadaos.php">
<h6 style="color:red;">
	Nota: Recuerde que solo se pordra guardar multa por cada reunion, asi que tenga en cuenta que deve seleccionar una reunion 
previamente creada.</h6>
<button type="submit" id="registrarmultados" class="btn btn-primary">Registrar multados</button>
<table class="table table-hover">

			<tr class="info">
				<th>Nombre </th>
				<td>Apelldio</td>
				<td>Nombre predio</td>
				<td>Nombre multa</td>
				<td>valor multa</td>
				<td>fecha multa</td>

				
				
			    
			</tr>
	<?php 

		require_once('../../models/reunion/reunion.php'); 
      $idmulta= $_POST['selectmultar'];
      $reuregistradas= $_POST['reunionesregistras'];
		$lista = listadoreunionesmultados($idmulta,$reuregistradas);

		for($i = 0; $i < count($lista); $i++) {


			$items = $lista[$i];
			echo 
			"
			<tr>
			<input type='hidden' value=".$items["Id_Usuario"]." class='form-control' name='idusuario[]' readonly>
           <td>".$items["Nombre_Usuario"]."</td>
			<td>".$items["Apellido_Usuario"]."</td>
			 <input type='hidden' value=".$items["Id_Predio_Usuario"]." class='form-control' name='idpredio[]' readonly>
			<td>".$items["Nombre_Predio"]."</td>
			<input type='hidden' value=".$items["Id_Tipo_Multa"]." class='form-control' name='idmulta[]' readonly>
			<td>".$items["Nombre_Multa"]."</td>
			<td> <input type='text' value=".$items["Valor_Tipo_Multa"]." name ='valor[]' class='form-control' readonly></td>
			<input type='hidden' value=".$items["Asistio"]." class='form-control'  name='asistio[]' readonly>
			<td> <input type='date' value=".$items["Fecha_Asistencia"]." name ='fecha[]' class='form-control' readonly></td>
			

			</tr>
			";

		}	

	?>
</table>
<?php 
echo" <input  type='hidden' value=".$items["Fecha_Asistencia"]."  name='fechamulta' size='10px' readonly>
"?>


</form>