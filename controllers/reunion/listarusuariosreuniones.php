<form method="post" action="models/reunion/list.php"> 
<table class="table table-hover">

			<tr class="info">
				<th>NIT REUNION</th>
				<th>NOMBRE REUNION</th>
				<th>NIT USUARIO</th>
				<th>NOMBRE</th>
				<th>APELLIDO</th>
				<TH>DOCUMENTO</TH>
				<TH>ASISTENCIA</TH>
			</tr>
	<?php 

		require_once('../../models/reunion/reunion.php'); 
      $select=$_POST['SelectReunion'];	

	$lista = listadousuariosreuniones($select);

		for($i = 0; $i < count($lista); $i++) {

			$items = $lista[$i];
			echo 
			"<tr>

				
				<td>  <input value=".$items["Id_Detalle_Reunion"]." class='form-control' name='idreu[]'   size='10' readonly> </td>
				<td>".$items["Nombre_Reunion"]."</td>
                 <td>  <input value= ".$items["Id_Usuario"]." class='form-control' name='idusu[]'  size='10' readonly> </td>
				
				<td>".$items["Nombre_Usuario"]."</td>
				<td>".$items["Apellido_Usuario"]."</td>
				<td>".$items["Documento_Usuario"]."</td>
			
           <td> <select  name='SINO[]' class='form-control'>
    <option   value='1'>asistio</option>
    <option  value='0'>no asistio </option>
  
  </select></td>
           </tr>
			";

		}	

	?>
</table>
<?php 
echo" <input  type='hidden' value=".$items["Id_Detalle_Reunion"]."  name='ensayo' size='10px' readonly>
"?>
<button type="submit" class="btn btn-primary" id="RegistrarReunion">Guardar <span class="glyphicon glyphicon-floppy-disk"></span></button>
</form>