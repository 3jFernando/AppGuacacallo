<?php 

function listado() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT * FROM valor_consumo") or die(2);

		$i = 0;
		while ($columnas = mysqli_fetch_array($consulta)) {
			
			$items = array();

			$items["Id_Valor_Consumo"] 		= $columnas["Id_Valor_Consumo"];
			$items["Nombre_Valor"] 	= $columnas["Nombre_Valor"];
			$items["Valor"]  = $columnas["Valor"];
				

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;
	};




	function insertar($nombrevalor, $valorconsumo) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "INSERT INTO valor_consumo (Nombre_Valor, Valor)
			VALUES ('$nombrevalor','$valorconsumo')") or die(3);

	};


	function eliminar($Id_Valor_Consumo) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "DELETE from valor_consumo WHERE Id_Valor_Consumo = '$Id_Valor_Consumo'") or die(3);
	};
 ?>