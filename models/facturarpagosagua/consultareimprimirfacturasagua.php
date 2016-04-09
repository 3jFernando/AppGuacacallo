<?php
function listadopredios() {
		include'../../configs/conexion.php'; 
		$consulta = mysqli_query($conexion, "SELECT * FROM predio_usuario as p inner join factura as fp on p.Id_Predio_Usuario = fp.Id_Predio_Usuario inner join consumo_contador as cc on fp.Id_Factura = cc.Id_Facrura inner join tipo_predio as tp on p.Id_Tipo_Predio = tp.Id_Tipo_Predio inner join usuario as u on p.Id_Usuario = u.Id_Usuario WHERE p.Estado_predio=1 AND cc.estado_factura=1 GROUP BY fp.Id_Predio_Usuario") or die(2);

		$i = 0;
		while ($campos = mysqli_fetch_array($consulta)) {
			
			$items = array();
            $items["Id_Predio_Usuario"] 	= $campos["Id_Predio_Usuario"];
			$items["Fecha_Inscripcion"] 	= $campos["Fecha_Inscripcion"];
			$items["Id_Usuario"] 			= $campos["Id_Usuario"];	
			$items["Id_Tipo_Predio"] 		= $campos["Id_Tipo_Predio"];	
			$items["Id_Usuario"] 		= $campos["Id_Usuario"];
			$items["Nombre_Usuario"] 	= $campos["Nombre_Usuario"];
			$items["Apellido_Usuario"]  = $campos["Apellido_Usuario"];	
			$items["Documento_Usuario"]  = $campos["Documento_Usuario"];	
			$items["Telefono_Usuario"]  = $campos["Telefono_Usuario"];
			$items["Estrato_Usuario"]  = $campos["Estrato_Usuario"];
			$items["Nombre_Predio"]  = $campos["Nombre_Predio"];	
			$items["Nombre_Tipo_Predio"]  = $campos["Nombre_Tipo_Predio"];		
			$items["Alcantarillado"]  = $campos["Alcantarillado"];	

           
			$items["Tamano_Predio"]  = $campos["Tamano_Predio"];	
			$items["Valor_Hectarea"]  = $campos["Valor_Hectarea"];	
			$items["Valor_Total"]  = $campos["Valor_Total"];

			$listados[$i] = $items;
			$i++;

		}
		return @$listados;
	};

	//Modificar conexion aqui
	function getMultasUsuario($idPrediousu )  {
		///require_once('../../configs/conexion.php'); 
		//require_once('../../configs/conexion.php'); 
		include '../../configs/conexion.php';
        $conexion = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE) or die(1);
		
		$consulta = mysqli_query($conexion, "SELECT * FROM predio_usuario as pu inner join tipo_predio as tp on pu.Id_Tipo_Predio = tp.Id_Tipo_Predio  inner join multa as m on pu.Id_Predio_Usuario = m.Id_Predio_Usuario inner join tipo_multa as tm on m.Id_Tipo_Multa = tm.Id_Tipo_Multa WHERE  pu.Id_Predio_Usuario='$idPrediousu ' AND m.Estado=0 ") or die(2);

		$i = 0;
		while($campos = mysqli_fetch_array($consulta)){			
				
			$items = array();

            $items["Id_Multa"] 	= $campos["Id_Multa"];
			$items["Estado"] 	= $campos["Estado"];
			$items["Valor_Tipo_Multa"]  = $campos["Valor_Tipo_Multa"];	
			$items["Fecha_Multa"]  = $campos["Fecha_Multa"];
			$items["Nombre_Multa"]  = $campos["Nombre_Multa"];
			$items["Nombre_Predio"]  = $campos["Nombre_Predio"];		
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

//Modificar conexion aqui /*-----------------------------------------------------------------------------*/         
function calcularTotalMultas($idPrediousu)
{         //require_once('../../configs/conexion.php');     
 	//require_once('../../configs/conexion.php'); 
		include '../../configs/conexion.php';       
 $conexion = mysqli_connect($SERVER,$USERNAME, $PASSWORD, $DATABASE) or die(1);        
 $consulta = mysqli_query($conexion, "SELECT pu.Id_Predio_Usuario, SUM(tm.Valor_Tipo_Multa) AS total from
multa as m inner join tipo_multa as tm on m.Id_Tipo_Multa = tm.Id_Tipo_Multa inner join predio_usuario as pu on m.Id_Predio_Usuario = pu.Id_Predio_Usuario  WHERE
 m.Estado= 0 AND pu.Id_Predio_Usuario = '$idPrediousu'") or
die(2);

		$i = 0;
		while($campos = mysqli_fetch_array($consulta)){			
				
			$items = array();
			$items["Id_Predio_Usuario"] 	= $campos["Id_Predio_Usuario"];
			$items["total"]			= $campos["total"];
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	//Modificar conexion aqui
/*-----------------------------------------------------------------------------*/
	function getFacturasAguaByUsuario($idPrediousu)  {
		///require_once('../../configs/conexion.php'); 
	//require_once('../../configs/conexion.php'); 
		include '../../configs/conexion.php';
        $conexion = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE) or die(1);
		
		$consulta = mysqli_query($conexion, "SELECT * FROM usuario as u inner join predio_usuario as pu on u.Id_Usuario = pu.Id_Usuario inner join factura as fp on pu.Id_Predio_Usuario = fp.Id_Predio_Usuario inner join consumo_contador as cc on fp.Id_Factura = cc.Id_Facrura WHERE  fp.Id_Predio_Usuario='$idPrediousu' AND cc.estado_factura=1") or die(2);

		$i = 0;
		while($campos = mysqli_fetch_array($consulta)){			
				
			$items = array();

			$items["Id_Usuario"] 		= $campos["Id_Usuario"];
			$items["Nombre_Usuario"] 	= $campos["Nombre_Usuario"];
			$items["Apellido_Usuario"]  = $campos["Apellido_Usuario"];	
			$items["Documento_Usuario"]  = $campos["Documento_Usuario"];	

            $items["Id_Factura"] 	= $campos["Id_Factura"];
			$items["Valor_Total_Factura"] 	= $campos["Valor_Total_Factura"];
			$items["Fecha_Factura"]  = $campos["Fecha_Factura"];

			$items["Id_Consumo_Contador"]  = $campos["Id_Consumo_Contador"];
			$items["Fecha_Pago_Oportuno"]  = $campos["Fecha_Pago_Oportuno"];
			$items["Fecha_Elaboracion"]  = $campos["Fecha_Elaboracion"];
			$items["Fecha_Corte"]  = $campos["Fecha_Corte"];	
			$items["Suspendido"]  = $campos["Suspendido"];	
			$items["estado_factura"]  = $campos["estado_factura"];	
			  $items["Pago_mes_agua"]  = $campos["Pago_mes_agua"];	

			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};


	
		//Modificar conexion aqui
/*-----------------------------------------------------------------------------*/
		function calcularTotalFacturas($idPrediousu) {
		//require_once('../../configs/conexion.php'); 
    		//require_once('../../configs/conexion.php'); 
		include '../../configs/conexion.php';
        $conexion = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE) or die(1);
		$consulta = mysqli_query($conexion, "SELECT f.Id_Predio_Usuario, SUM(f.Valor_Total_Factura) AS total from factura as f inner join predio_usuario as pu on f.Id_Predio_Usuario = pu.Id_Predio_Usuario inner join consumo_contador as cc on f.Id_Factura = cc.Id_Facrura WHERE cc.estado_factura=1 AND f.Id_Predio_Usuario = '$idPrediousu' ") or die(2);
		$i = 0;
		while($campos = mysqli_fetch_array($consulta)){			
				
			$items = array();
			$items["Id_Predio_Usuario"] = $campos["Id_Predio_Usuario"];
			$items["total"]			= $campos["total"];
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	//Ultima factura usuario /*-----------------------------------------------------------------------------*/ 

	function getUltimaFacturaByUsuario($idPrediousu)  {
		///require_once('../../configs/conexion.php'); 
		include '../../configs/conexion.php';
		$consulta = mysqli_query($conexion, "SELECT cc.Fecha_Elaboracion,cc.Fecha_Corte,cc.Fecha_Pago_Oportuno,  MAX(f.Id_Factura) AS Id_Factura FROM factura AS f inner join consumo_contador as cc on f.Id_Factura = cc.Id_Facrura INNER JOIN predio_usuario AS pu ON f.Id_Predio_Usuario = pu.Id_Predio_Usuario INNER JOIN usuario AS u ON pu.Id_Usuario = u.Id_Usuario WHERE  pu.Id_Predio_Usuario = '$idPrediousu' AND u.Estado = 1 AND f.Estado_facturas_agua=1  ") or die(2);

		$i = 0;
		while($campos = mysqli_fetch_array($consulta)){			
				
			$items = array();


            $items["Id_Factura"] 	= $campos["Id_Factura"];
              $items["Fecha_Elaboracion"] 	= $campos["Fecha_Elaboracion"];
              $items["Fecha_Corte"] 	= $campos["Fecha_Corte"];
	            $items["Fecha_Pago_Oportuno"] 	= $campos["Fecha_Pago_Oportuno"];



			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	
	//Ultima factura usuario Informacion /*-----------------------------------------------------------------------------*/ 

	function getUltimaFacturaByUsuarioInfo($Id_FacturaReferenciaPago)  {
		///require_once('../../configs/conexion.php'); 
		include '../../configs/conexion.php';
		$consulta = mysqli_query($conexion, "SELECT cc.Fecha_Elaboracion,cc.Fecha_Corte,cc.Fecha_Pago_Oportuno,f.Pago_mes_agua  FROM factura AS f inner join consumo_contador as cc on f.Id_Factura = cc.Id_Facrura INNER JOIN predio_usuario AS pu ON f.Id_Predio_Usuario = pu.Id_Predio_Usuario INNER JOIN usuario AS u ON pu.Id_Usuario = u.Id_Usuario WHERE  cc.Id_Facrura = '$Id_FacturaReferenciaPago'") or die(2);

		$i = 0;
		while($campos = mysqli_fetch_array($consulta)){			
				
			$items = array();



             $items["Fecha_Elaboracion"] 	= $campos["Fecha_Elaboracion"];
              $items["Fecha_Corte"] 	= $campos["Fecha_Corte"];
	            $items["Fecha_Pago_Oportuno"] 	= $campos["Fecha_Pago_Oportuno"];
	                        $items["Pago_mes_agua"] 	= $campos["Pago_mes_agua"];



			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

//Consultar facturas pendientes o atrasos

	function contarCantidaddeFacturasPendientes($idPrediousu) {
		//require_once('../../configs/conexion.php'); 
	    include '../../configs/conexion.php';
		$consulta = mysqli_query($conexion, "SELECT pu.Id_Predio_Usuario,tp.Nombre_Tipo_Predio,u.Nombre_Usuario,u.Apellido_Usuario,pu.Fecha_Inscripcion,pu.Nombre_Predio, count(fp.Id_Predio_Usuario)  AS cantidadfaturas FROM predio_usuario as pu inner join tipo_predio as tp on pu.Id_Tipo_Predio = tp.Id_Tipo_Predio inner join usuario as u on pu.Id_Usuario = u.Id_Usuario inner join factura as fp on pu.Id_Predio_Usuario = fp.Id_Predio_Usuario inner join consumo_contador as cc on fp.Id_Factura = cc.Id_Facrura WHERE u.Estado = 1 AND  cc.estado_factura=1 AND fp.Id_Predio_Usuario = '$idPrediousu'   GROUP BY fp.Id_Predio_Usuario ") or die(2);
		$i = 0;
		while($columnas = mysqli_fetch_array($consulta)){			
				
			$items = array();
			$items["cantidadfaturas"] 		= $columnas["cantidadfaturas"];		

			$items["Id_Predio_Usuario"] 	= $columnas["Id_Predio_Usuario"];
			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

	function getUsuarioPredioAlcantarillado($idPrediousu)  {
		///require_once('../../configs/conexion.php'); 
		include '../../configs/conexion.php';
		$consulta = mysqli_query($conexion, "SELECT * FROM usuario as u inner join predio_usuario as pu on u.Id_Usuario = pu.Id_Usuario inner join tipo_predio as tp on pu.Id_Tipo_Predio = tp.Id_Tipo_Predio inner join alcantarillado_predio as ac on pu.Id_Alcantarillado = ac.Id_Alcantarillado WHERE pu.Id_Predio_Usuario = '$idPrediousu'") or die(2);

		$i = 0;
		while($campos = mysqli_fetch_array($consulta)){			
				
			$items = array();

			$items["Id_Predio_Usuario"] 	= $campos["Id_Predio_Usuario"];
			$items["Fecha_Inscripcion"] 	= $campos["Fecha_Inscripcion"];
			$items["Id_Usuario"] 			= $campos["Id_Usuario"];	
			$items["Id_Tipo_Predio"] 		= $campos["Id_Tipo_Predio"];	
			$items["Id_Usuario"] 		= $campos["Id_Usuario"];
			$items["Nombre_Usuario"] 	= $campos["Nombre_Usuario"];
			$items["Apellido_Usuario"]  = $campos["Apellido_Usuario"];	
			$items["Documento_Usuario"]  = $campos["Documento_Usuario"];	
			$items["Telefono_Usuario"]  = $campos["Telefono_Usuario"];
			$items["Estrato_Usuario"]  = $campos["Estrato_Usuario"];
			$items["Nombre_Predio"]  = $campos["Nombre_Predio"];	
			$items["Nombre_Tipo_Predio"]  = $campos["Nombre_Tipo_Predio"];

			$items["Alcantarillado"]  = $campos["Alcantarillado"];	
			$items["Nombre_Acantarillado"]  = $campos["Nombre_Acantarillado"];	
			$items["Valor_Servicio_Alcantarillado"]  = $campos["Valor_Servicio_Alcantarillado"];
           


			$items["Tamano_Predio"]  = $campos["Tamano_Predio"];	
			$items["Valor_Hectarea"]  = $campos["Valor_Hectarea"];	
			$items["Valor_Total"]  = $campos["Valor_Total"];



			$listado[$i] = $items;
			$i++;

		}
		return @$listado;
	};

		function getUsuarioPagoFactura($idPrediousu  )  {
		//require_once('../../configs/conexion.php'); 
		include '../../configs/conexion.php';
		$consulta = mysqli_query($conexion, "SELECT * FROM predio_usuario as pu inner join usuario as u on pu.Id_Usuario = u.Id_Usuario  inner join tipo_predio as tp on pu.Id_Tipo_Predio = tp.Id_Tipo_Predio  WHERE  pu.Id_Predio_Usuario='$idPrediousu' ") or die(2);

		$i = 0;
		while($campos = mysqli_fetch_array($consulta)){			
				
			$items = array();

			$items["Id_Usuario"] 		= $campos["Id_Usuario"];
			$items["Nombre_Usuario"] 	= $campos["Nombre_Usuario"];
			$items["Apellido_Usuario"]  = $campos["Apellido_Usuario"];	
			$items["Documento_Usuario"]  = $campos["Documento_Usuario"];	
			$items["Telefono_Usuario"]  = $campos["Telefono_Usuario"];
			$items["Estrato_Usuario"]  = $campos["Estrato_Usuario"];
			$items["Alcantarillado"]  = $campos["Alcantarillado"];
            
            $items["Id_Predio_Usuario"]  = $campos["Id_Predio_Usuario"];
			$items["Tamano_Predio"]  = $campos["Tamano_Predio"];	
			$items["Valor_Hectarea"]  = $campos["Valor_Hectarea"];	
			$items["Valor_Total"]  = $campos["Valor_Total"];

			$listado[$i] = $items;
			$i++;
		}
		return @$listado;
	};


	?>