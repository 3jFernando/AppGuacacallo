<style type="text/css">

  .color {
    background-color: #FFFFCF;
    color: #000000;
    font-family: Arial;
    font-size: 12px;
  }

  input.color1 {
    background-color: #00CC99; font-weight: bold; font-size: 12px; color: white;
  }

</style>

<?php

session_start();

require_once('../../configs/conexion.php'); 


$nombre=$_POST['nombre'];
$contrasena=$_POST['contrasena'];


$registros = mysqli_query($conexion,"SELECT * FROM administrador AS ad INNER JOIN foto_perfil AS fp ON ad.Id_Administrador = fp.Id_Administrador
WHERE Correo = '$nombre' AND contrasena = '$contrasena'") or die(mysqli_error($conexion));

if ($reg=mysqli_fetch_array($registros)) {
  
  $_SESSION['login']              =$nombre;
 
  $_SESSION['usuario']            =$reg['Nombre'];
  $_SESSION['usuario-apellidos']  =$reg['Apellidos'];
  $_SESSION['usuario-c']          =$reg['Correo'];
  $_SESSION['usuario-i']          =$reg['contrasena'];
  $_SESSION['usuario-id']         =$reg['Identificacion'];
  $_SESSION['id']                 =$reg['Id_Administrador'];

  $_SESSION['foto']         =$reg['Foto'];
  $_SESSION['id_foto']      =$reg['Id_Foto'];  
  $_SESSION['nombre_foto']  =$reg['Nombre_Foto'];  

  $_SESSION['SESSION']      =$_SESSION;
  echo"<script>self.location='../../perfil.php';</script>";
 
 } else {
			
		echo"<script language= 'javascript' >
			alert('Datos incorrectos porfavor verifique Correo y contraseña')
			self.location='../../inicio.html';
			</script>";
		  
}
?>