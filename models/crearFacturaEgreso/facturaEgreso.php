<?php

function insertar($nombre,$detalle,$valor,$tipo,$cantidad) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "INSERT INTO servi_productos (Nombre_Servi_Producto,Descripcion,Valor_Servi_Producto,
			Id_Tipo_Servi_Producto, cantidad)
			VALUES ('$nombre','$detalle','$valor','$tipo','$cantidad')") or die(3);
	};

function crearFactEgreso($valor) {
		$fechaActual = date('Y/m/d');
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "INSERT INTO factura(Id_Tipo_Pago, Id_Tipo_Movimiento, Fecha_Factura, Valor_Total_Factura) 
			VALUES (8,20,'$fechaActual','$valor')") or die(3);
	};

function buscarServiProducto() {
		require_once('../../configs/conexion.php'); 
		$consulta = mysqli_query($conexion, "SELECT MAX(Id_Servi_Producto) as Id_Servi_Producto FROM servi_productos") or die(2);

		$i = 0;
		while($campo = mysqli_fetch_array($consulta)){			
				
			$item = array();
			$item["Id_Servi_Producto"]  = $campo["Id_Servi_Producto"];	
			$listado[$i] = $item;
			$i++;

		}
		return @$listado;
	};	

function crearDetalleFacturaEgreso($idFactura, $idSerProd, $valor, $cantidad) {
		require_once('../../configs/conexion.php'); 
		mysqli_query($conexion, "INSERT INTO detalle_factura (Id_Factura, Id_Servi_Producto, Cantidad, Precio_Unitario) 
			VALUES ('$idFactura','$idSerProd','$cantidad','$valor')") or die(3);
	};

?>