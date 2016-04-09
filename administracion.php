<?php
    session_start();
    extract($_SESSION);
    if(!isset($_SESSION['SESSION'])
    )
    header("location:inicio.html");
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <title>AppGuacacallo</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- jQuery -->
    <script src="public/js/jquery-1.11.2.min.js"></script>
    <!--alertas-->
    <script type="text/javascript" src="public/js/toastr.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="public/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="public/dist/js/sb-admin-2.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="public/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="public/bower_components/stylos.css" rel="stylesheet" media="screen">
    <link href="public/bower_components/bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet" media="screen">
    <link href="public/bower_components/bootswatch/cerulean/bootstrap.css" rel="stylesheet" media="screen">
    <!-- MetisMenu CSS -->
    <link href="public/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet" media="screen">
    <!-- Custom CSS -->
    <link href="public/dist/css/sb-admin-2.css" rel="stylesheet" media="screen">
    <!-- Custom Fonts -->
    <link href="public/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen">
    <!--alertas-->
    <link rel="stylesheet" type="text/css" href="public/js/toastr.css" media="screen">
    <!-- imprimir -->
    <link href="public/bower_components/bootstrap/dist/css/print.css" rel="stylesheet" media="print">


    <style type="text/css">

        #mostarListadoFacturasTipoContadoServiPorductos:hover {
            cursor: pointer;
        }

        #ocultarListadoFacturasTipoCreditoServiPorductos:hover {
            cursor: pointer;
        }

        #mostarListadoFacturasTipoCreditoServiPorductos:hover {
            cursor: pointer;
        }

        #ocultarListadoFacturasTipoContadoServiPorductos:hover {
            cursor: pointer;
        }


    </style>

</head>

<body>

    <div id="wrapper" class="container">

           <!--menu de la pagina-->
           <div id="menu-pagina"></div>

           <!--contenido de la pagina-->
           <div id="contenido-pagina"></div>

           <!--contenido de la pagina-->
           <div id="pie-pagina"></div>

    </div>

<!--codigo script-->
<script type="text/javascript">

//propiedades de la pagina
/*-----------------------------------------------------------------------------*/

        //se ejecuta cuando la pagina se carga
        cargarMenu();
        cargarContenido();
        msg();
        cargarPiepagina();
        var proceso = 0;
        var datos = null;

        setTimeout("cargarDatosPrincipales()", 300);

        //codigo de imprimir usuarios
        function printdiv(printpage) {

            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;

            document.body.innerHTML = headstr+newstr+footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;

        }

        function cargarDatosPrincipales() {
            cargarPagianPrincipal();
            verDet_CantidadUsuarios();
            verDet_CantidadUsuariosDesactivados();
            verDet_CantidadFacturas();
            verDet_CantidadDeveFacturas();
            verDet_CantidadMultas();
            verDet_CantidadMultasDeve();
            verDet_CantidadDinero();
            verDet_CantidadDineroDeve();
            verDet_CantidadDineroMultasDeve();
            verificarVencimientoFacturasPorDiaActual();
        };

        //carga el menu de la pagina
        function cargarMenu() {

            $.ajax({
                url: 'views/layouts/menu.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#menu-pagina").html(data);
                    $("#buscador-global-usuarios").css('display','none');
                    $("#buscador-global-tipoPredios").css('display','none');
                    $("#buscador-global-predios").css('display','none');
                    $("#buscador-global-tipoMovimientos").css('display','none');
                    $("#buscador-global-tipoPagos").css('display','none');
                    $("#buscador-global-reuniones").css('display','none');
                    $("#buscador-global-productosServicio").css('display','none');
                }
            });

        };

        //carga el contenido de la pagina
        function cargarContenido() {

            $.ajax({
                url: 'views/layouts/contenido.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#contenido-pagina").html(data);
                }
            });

        };

        //configuracion de las notificaciones
        function msg() {

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "300",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "slideDown",
                "hideMethod": "slideUp"
              };

        };

        //carga el pie de la pagina
        function cargarPiepagina() {

            $.ajax({
                url: 'views/layouts/piepagina.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#pie-pagina").html(data);
                }
            });

        };

        //cargar la pagina principal
        function cargarPagianPrincipal() {

            $.ajax({
                url: 'views/administrador/pagian_principal.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#pagina_principal").html(data);
                    $(".contenido_pagina_principal").slideDown('slow');
                }
            });

        };

        $(document).on('click','#cerrarSesion', function() {
            toastr.warning("Seguro que desea cerrar su sesion<br><button type='button' class='btn clear confirmar'>Confirmar Cerrar</button> ", "CUENTA ADMINISTRATIVA");
        });

         //btn que elimina
        $(document).on('click', '.confirmar',function() {
            self.location='public/login/cerrar.php';
        });

        //inicio usuarios

        function verDet_CantidadUsuarios() {

            $.ajax({
                url: 'controllers/usuarios/cantidadUsuariosRegistrados.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#cantidadUsuariosRegistrados").html(data);
                }
            });

        };

         function verDet_CantidadUsuariosDesactivados() {

            $.ajax({
                url: 'controllers/usuarios/cantidadUsuariosDesactivadosRegistrados.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#cantidadUsuariosDesactivadosRegistrados").html(data);
                }
            });

        };

        $(document).on('click','#informacion_Importarnte_Usuarios', function() {
            panelUsuariosClick();
        });

        //fin usuarios


        //inicio facturas

        function verDet_CantidadFacturas() {

            $.ajax({
                url: 'controllers/reportes/cantidadFacturasRegistradas.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#cantidadFacturasRegistradas").html(data);
                }
            });

        };

        function verDet_CantidadDeveFacturas() {

            $.ajax({
                url: 'controllers/reportes/cantidadFacturasDeveRegistradas.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#cantidadFacturasDeveRegistradas").html(data);
                }
            });

        };

        $(document).on('click','#informacion_Importarnte_facturas', function() {
            gestionarFacturasClickPanel();
        });

        //verificar si hay facturas que se vensan en el dia actual
        function verificarVencimientoFacturasPorDiaActual() {

            $.ajax({
                url: 'controllers/reportes/verfFactVencDiaAcual.php',
                data: null,
                method: 'post',
                success:function(data) {
                    datos = data;
                    setTimeout("ver()",1);
                }
            });

        };

        function ver() {
            if(datos <  0 || datos == '') {
                $("#verificacionFactVencidadDiaActual").attr('class','fa fa-credit-card fa-5x');
            } else {
                $("#imgCreditoVencido").slideDown('slow');
                $("#verificacionFactVencidadDiaActual").slideUp('slow');
            }
        };

        //fin facturas


        //inicio multas

        function verDet_CantidadMultas() {

            $.ajax({
                url: 'controllers/reportes/cantidadMultasRegistradas.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#cantidadMultasRegistradas").html(data);
                }
            });

        };

        function verDet_CantidadMultasDeve() {

            $.ajax({
                url: 'controllers/reportes/cantidadMultasDeveRegistradas.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#cantidadMultasDeveRegistradas").html(data);
                }
            });

        };

        $(document).on('click','#informacion_Importarnte_multas', function() {
            cargarDatosPanelModuloMultas();
        });

        //fin multas


        //inicio dinero

        function verDet_CantidadDinero() {

            $.ajax({
                url: 'controllers/reportes/cantidadDineroRegistrado.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#cantidadDineroRegistrado").html(data);
                    setTimeout("ejecutarAnalisisTotalDinero()", 400);
                }
            });

        };

        function ejecutarAnalisisTotalDinero() {
            var totalDinero   = $("#cantidadDineroRegistrado").text();
            var totalDineFact = $("#cantidadDineroDeveFactRegistrado").text();

            var total = totalDinero - totalDineFact;
            $("#cantidadDineroRegistrado").text(total);
        };

        function verDet_CantidadDineroDeve() {

            $.ajax({
                url: 'controllers/reportes/cantidadDineroDeveRegistrado.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#cantidadDineroDeveFactRegistrado").html(data);
                }
            });

        };

        function verDet_CantidadDineroMultasDeve() {

            $.ajax({
                url: 'controllers/reportes/cantidadDineroDeveMultasRegistradas.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#cantidadDineroDeveMultasRegistrado").html(data);
                }
            });

        };

        $(document).on('click','#informacion_Importarnte_dinero', function() {
            cargarDatosPanelReportes();
        });

        //fin dinero



//final propiedades de la pagina
/*-----------------------------------------------------------------------------*/
//inicio propiedades del modulo usuarios
/*-----------------------------------------------------------------------------*/

        function panelUsuariosClick() {

            $('#proceso_activo').text('Usuarios');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nueva-facturaServiProducto').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#resultadoConsultaCargarDatosfactServiProductosCredito").slideUp('slow');
            $('#contenedor-CargarDatosfactServiProductosCredito').slideUp('slow');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');


               // pagos de agua
              $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');
            cargarListadoUsuarios();
            cargarFormularioNuevoUsuario();

        };

        //muestra el listado de usuarios
        $(document).on('click', '#usuarios-panel',function() {

            panelUsuariosClick();

        });


        //carga el listado de usuarios
        function cargarListadoUsuarios() {

            $.ajax({
                url: 'controllers/usuarios/listar.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#listados-global").html(data);
                    $("#buscador-global-usuarios").css('display','block');
                    $("#buscador-global-tipoPredios").css('display','none');
                    $("#buscador-global-predios").css('display','none');
                    $("#buscador-global-tipoMovimientos").css('display','none');
                    $("#buscador-global-tipoPagos").css('display','none');
                    $("#buscador-global-reuniones").css('display','none');
                    $("#buscador-global-productosServicio").css('display','none');
                      $("#buscador-global-predios-corte-agua").css('display','none');
                    $(".buscar-usuarios").val('');
                }
            });

        };

        //muestra el formulario de registro de usuarios
        $(document).on('click', '#btn-agregar-usuario', function() {

            $('#contenedor-nuevo-usuario').slideDown('slow', function() {
                $('#btn-agregar-usuario').attr('disabled','true');
                $('.actualizar').attr('disabled','true');
                $('.desactivar').attr('disabled','true');
                limpiarFormulario();
            });

        });

        //carga el formulario de nuevo usuario
        function cargarFormularioNuevoUsuario() {

            $.ajax({
                url: 'views/usuarios/crear.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#usuarios-agregar").html(data);
                }
            });

        };

        //vacia los campos del formulario
        function limpiarFormulario() {

            $("#nombre").val('');
            $("#apellido").val('');
            $("#telefono").val('');
            $("#documento").val('');
            $("#estrato").val('');

        };

        //cancelar registro de usuarios
        $(document).on('click', '#cancelar', function() {

            $('#contenedor-nuevo-usuario').slideUp('slow');
            cargarListadoUsuarios();
            limpiarFormulario();

        });

        //guardar usuarios y actualizar
        $(document).on('click', '#guardar', function() {

            var nombre     = $("#nombre").val();
            var apellido   = $("#apellido").val();
            var telefono   = $("#telefono").val();
            var documento  = $("#documento").val();
            var estado     = 1;
            var estrato    = $("#estrato").val();
            var Id_Usuario = $("#_usuarioId").val();

            if($("#_accion").val() == 1) {

                $.ajax({
                    url: 'controllers/usuarios/crear.php',
                    data: {
                       nombre:nombre,
                       apellido:apellido,
                       telefono:telefono,
                       documento:documento,
                       estado:estado,
                       estrato:estrato,
                   },
                   method: 'post',
                   success: function(data) {
                        toastr.info("Usuario " + $("#nombre").val() + " agregado(a) exitosamente :)"," Usuarios");
                        $('#contenedor-nuevo-usuario').slideUp('slow');
                        cargarListadoUsuarios();
                        limpiarFormulario();

                   }
                });

            }
            else if($("#_accion").val() == 2) {

                $.ajax({
                    url: 'controllers/usuarios/actualizar.php',
                    data: {
                       nombre:nombre,
                       apellido:apellido,
                       telefono:telefono,
                       documento:documento,
                       estado:estado,
                       estrato:estrato,
                       Id_Usuario:Id_Usuario,
                   },
                   method: 'post',
                   success: function(data) {
                        toastr.info("Usuario " + $("#nombre").val() + " actualizado(a) exitosamente :)"," Usuarios");
                        $('#contenedor-nuevo-usuario').slideUp('slow');
                        cargarListadoUsuarios();
                        limpiarFormulario();

                   }
                });

            }

        });

        //captuara el usuario para ser actualizado
        $(document).on('click', '.actualizar', function() {

            $("#nombre").val($(this).attr('nombre'));
            $("#apellido").val($(this).attr('apellido'));
            $("#telefono").val($(this).attr('telefono'));
            $("#documento").val($(this).attr('documento'));
            $("#estrato").val($(this).attr('estrato'));
            $("#_usuarioId").val($(this).attr('usuario-id'));

            $('#contenedor-nuevo-usuario').slideDown('slow', function() {

                $("#guardar").text('* Actualizar');
                $("#_accion").val(2);
                $('#btn-agregar-usuario').attr('disabled','true');
                $('.actualizar').attr('disabled','true');
                $('.desactivar').attr('disabled','true');

            });

        });

        //cambia el estado de los usuarios a activos o inactivos
        $(document).on('click', '.desactivar', function() {

            $("#_usuarioId").val($(this).attr('usuario-id'));
            var Id_Usuario    = $("#_usuarioId").val();

            if($(this).attr('estado_') == 'Activar') {

               $.ajax({
                    url: 'controllers/usuarios/activar.php',
                    data: {
                        Id_Usuario:Id_Usuario
                    },
                    method: 'post',
                    success:function(data) {
                        toastr.info("Usuario activado(a) exitosamente :)"," Usuarios");
                        cargarListadoUsuarios();
                    }
                });

            } else if($(this).attr('estado_') == 'Desactivar') {

                $.ajax({
                    url: 'controllers/usuarios/desactivar.php',
                    data: {
                        Id_Usuario:Id_Usuario
                    },
                    method: 'post',
                    success:function(data) {
                        toastr.warning("Usuario desactivado(a) exitosamente :)"," Usuarios");
                        cargarListadoUsuarios();
                    }
                });

            }

        });

        //buscador
        $(document).on('keyup','.buscar-usuarios', function() {

            if($(".buscar-usuarios").val() == '') {
                cargarListadoUsuarios();
            } else {

                if($(this).val().length >= 3) {

                    var nombre = $(".buscar-usuarios").val();

                    $.ajax({
                        url: 'controllers/usuarios/getUsuario.php',
                        data: {
                            nombre:nombre
                        },
                        method: 'post',
                        success: function(data) {
                            $("#listados-global").html(data);
                        }
                    });
                }
            }

        });

//final propiedades del modulo usuarios
/*-----------------------------------------------------------------------------*/
//inicio propiedades del modulo tipo de predios
/*-----------------------------------------------------------------------------*/

        //btn carga formulario de registro de tipo de predios
        $(document).on('click','#tipos-Predios-panel', function() {

            $('#proceso_activo').text('Tipo Predios');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nueva-facturaServiProducto').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#resultadoConsultaCargarDatosfactServiProductosCredito").slideUp('slow');
            $('#contenedor-CargarDatosfactServiProductosCredito').slideUp('slow');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');

    // pagos de agua
              $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');

            cargarListadoTipoPredios();
            cargarFormularioNuevoTipoPredio();

        });

         //carga el listado de tipo de predios
        function cargarListadoTipoPredios() {

            $.ajax({
                url: 'controllers/tipoPredios/listar.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#listados-global").html(data);
                    $("#buscador-global-tipoPredios").css('display','block');
                    $("#buscador-global-usuarios").css('display','none');
                    $("#buscador-global-predios").css('display','none');
                    $("#buscador-global-tipoMovimientos").css('display','none');
                    $("#buscador-global-tipoPagos").css('display','none');
                    $("#buscador-global-reuniones").css('display','none');
                    $("#buscador-global-productosServicio").css('display','none');
                      $("#buscador-global-predios-corte-agua").css('display','none');
                    $(".buscar-tipoPredios").val('');
                }
            });

        };


        //cargar el formulario de nuevo tipo de predio
        function cargarFormularioNuevoTipoPredio() {

            $.ajax({
                url: 'views/tipoPredios/crear.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#tipoPredios-agregar").html(data);
                }
            });

        };




          //btn muestra formulario nuevo tipo predio
        $(document).on('click', '#btn-agregar-tipoPredio', function() {

            $('#contenedor-nuevo-tipoPredio').slideDown('slow');

        });

        //cancela y oculta el formulario nuevo tipo predio
        $(document).on('click', '#cancelar_tipoPredio', function() {

            $('#contenedor-nuevo-tipoPredio').slideUp('slow', function(){
                $("#nombre_tipo_predio").val('');
            });

        });

        //btn que guarda tipo de predios
        $(document).on('click', '#guardar_tipoPredio', function() {

            var nombre = $("#nombre_tipo_predio").val();

            $.ajax({
                url: 'controllers/tipoPredios/crear.php',
                data: {
                    nombre:nombre
                },
                method: 'post',
                success:function(data) {
                    toastr.info("El predio: " + $("#nombre_tipo_predio").val() + " se registro con exito.", "Predios");
                    $('#contenedor-nuevo-tipoPredio').slideUp('slow', function(){
                        $("#nombre_tipo_predio").val('');
                        cargarListadoTipoPredios();
                    });

                }
            });

        });

        //btn eliminar tipos de predios
        $(document).on('click','.eliminar', function() {

            $("#_tipoPredio").val($(this).attr('tipoPredio-id'));
            toastr.error("Seguro que desea eliminar el Tipo de Predio<br><button type='button' class='btn clear confirmar-eliminar-tipoPredio'>Confirmar eliminar</button> ", "Predios");

        });

        //btn confirma eliminacion de predios
        $(document).on('click', '.confirmar-eliminar-tipoPredio',function() {

            var tipoPredioId    = $("#_tipoPredio").val();

            $.ajax({
                url: 'controllers/tipoPredios/eliminar.php',
                data: {
                    tipoPredioId:tipoPredioId,
                },
                method: 'post',
                success:function(data) {
                    cargarListadoTipoPredios();
                }
            });

        });

        //buscador
        $(document).on('keyup','.buscar-tipoPredios', function() {

            if($(".buscar-tipoPredios").val() == '') {
                cargarListadoTipoPredios();
            } else {

                if($(this).val().length >= 3) {

                    var nombre = $(".buscar-tipoPredios").val();

                        $.ajax({
                            url: 'controllers/tipoPredios/getTipoPredio.php',
                            data: {
                                nombre:nombre
                            },
                            method: 'post',
                            success: function(data) {
                                $("#listados-global").html(data);
                            }
                    });
                }
            }

        });

//final propiedades del modulo tipo de predios
/*-----------------------------------------------------------------------------*/


//inicio propiedades del modulo predios de usuarios
/*-----------------------------------------------------------------------------*/

        //btn carga formulario de registro de predios
        $(document).on('click','#predios-panel', function() {

            $('#proceso_activo').text('Predios de Usuario');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nueva-facturaServiProducto').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#resultadoConsultaCargarDatosfactServiProductosCredito").slideUp('slow');
            $('#contenedor-CargarDatosfactServiProductosCredito').slideUp('slow');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');


              // pagos de agua
            $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
            $('#usuario-con-mas-tres-facturas').slideUp('slow');

            cargarListadoPredios();
            cargarFormularioNuevoPredio();
            cargarTiposPrediosUsuarios();

        });

        //carga el listado de predios
        function cargarListadoPredios() {

            $.ajax({
                url: 'controllers/predios/listar.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#listados-global").html(data);
                    $("#buscador-global-predios").css('display','block');
                    $("#buscador-global-usuarios").css('display','none');
                    $("#buscador-global-tipoPredios").css('display','none');
                    $("#buscador-global-tipoMovimientos").css('display','none');
                    $("#buscador-global-tipoPagos").css('display','none');
                    $("#buscador-global-reuniones").css('display','none');
                    $("#buscador-global-productosServicio").css('display','none');
                      $("#buscador-global-predios-corte-agua").css('display','none');
                    $(".buscar-predios").val('');
                }
            });

        };

        //btn agregar nuevo predio
        $(document).on('click', '#btn-agregar-predio', function() {

            $('#contenedor-nuevo-predio').slideDown('slow', function() {
                $('#btn-agregar-predio').attr('disabled','true');
                $('.actualizar-predio').attr('disabled','true');

                $('.eliminar-predio').attr('disabled','true');
                $("#guardar_predio").text('* Agregar');
                $("#_accion_predios").val(1);
                cargarTiposPrediosUsuarios();

            });

        });

        //cargar el formulario de nuevo predio
        function cargarFormularioNuevoPredio() {

            $.ajax({
                url: 'views/predios/crear.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#predios-agregar").html(data);
                }
            });

        };

        //cargar Tipos de predios
        function cargarTiposPrediosUsuarios() {

            $.ajax({
                url: 'controllers/predios/listarTipoPredio.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#select-tipoPredio").html(data);
                }
            });

        };

        /*
          $("#miselect").change(function() {
            alert("Han cambiado mi valor");
        });*/
        /*
        $(".rg").change(function () {

if ($("#r1").attr("checked")) {
            $('#r1edit:input').removeAttr('disabled');
        }
        else {
            $('#r1edit:input').attr('disabled', 'disabled');
        }
                    });*/



        //cancelar registro de predios
        $(document).on('click', '#cancelar_predio', function() {

            $('#contenedor-nuevo-predio').slideUp('slow', function(){
                $("#nombre_predio").val('');
                $("#usuario-busqueda").val('');
                $("#nombre_usuario_busqueda").val('');
                $("#apellido_usuario_busqueda").val('');
                $("#resultado-busquedad-usuarioPredio").slideUp('slow');
                cargarListadoPredios();
            });

        });




        //btn guarda predios
        $(document).on('click', '#guardar_predio', function() {

            var Id_Predio_Usuario = $("#_Id_Predio_Usuario").val();
            var idTipoPredio      = $("#select-tipoPredio").val();
            var idUsuario         = $("#id_usuario_busqueda").val();
            var nombrePredio      = $("#nombre_predio").val();
            var fechaInscripcion  = $("#fecha_predio").val();
            var alcantarillado= $("#alcantarillado").val();
           // var idalcantarillado=  $("#_Id_Alcantarillado").val();
            var cantidad         = $("#cantidad").val();
            var valor           = $("#valor").val();
            var total         = $("#total").val();



           if($("#_accion_predios").val() == 1) {

                $.ajax({
                    url: 'controllers/predios/crear.php',
                    data: {
                        idTipoPredio:idTipoPredio,
                        idUsuario:idUsuario,
                        nombrePredio:nombrePredio,
                        fechaInscripcion:fechaInscripcion,
                        alcantarillado:alcantarillado,
                        cantidad:cantidad,
                        valor:valor,
                        total:total,
                    },
                    method: 'post',
                    success: function(data) {
                        toastr.info("Predio " + $("#nombrePredio").val() + " agregado(a) exitosamente :)"," Predios");
                        $('#contenedor-nuevo-predio').slideUp('slow', function(){
                            $("#nombre_predio").val('');
                            $("#usuario-busqueda").val('');
                            $("#nombre_usuario_busqueda").val('');
                            $("#apellido_usuario_busqueda").val('');
                            $("#resultado-busquedad-usuarioPredio").slideUp('slow');
                            $("#Id_Predio_Usuario").val('');
                            cargarListadoPredios();
                        });

                   }
                });

            }
            else if($("#_accion_predios").val() == 2) {

                $.ajax({
                    url: 'controllers/predios/actualizar.php',
                    data: {
                        Id_Predio_Usuario:Id_Predio_Usuario,
                        idTipoPredio:idTipoPredio,
                        nombrePredio:nombrePredio,
                        fechaInscripcion:fechaInscripcion,
                         alcantarillado:alcantarillado,
                       // idalcantarillado:idalcantarillado,
                        cantidad:cantidad,
                        valor:valor,
                        total:total,


                    },
                    method: 'post',
                    success: function(data) {
                        toastr.info("Predio actualizado exitosamente :)"," Predios");
                        $('#contenedor-nuevo-predio').slideUp('slow', function(){
                            $("#nombre_predio").val('');
                            $("#usuario-busqueda").val('');
                            $("#nombre_usuario_busqueda").val('');
                            $("#apellido_usuario_busqueda").val('');
                            $("#resultado-busquedad-usuarioPredio").slideUp('slow');
                            $("#tipo_predio_usuarios").val('');
                            $("#_predio").val('');
                            $("#id_usuario_busqueda").val('');
                            cargarListadoPredios();
                        });

                   }
                });

            }

        });

         //captuara el predios para ser actualizado
        $(document).on('click', '.actualizar-predio', function() {

            $("#_Id_Predio_Usuario").val($(this).attr('Id_Predio_Usuario'));
            $("#select-tipoPredio").val($(this).attr('id_tipo_predio'));
            $("#id_usuario_busqueda").val($(this).attr('Id_Usuario'));
            $("#nombre_predio").val($(this).attr('Nombre_Predio'));
            $("#fecha_predio").val($(this).attr('Fecha_Inscripcion'));
            $("#alcantarillado").val($(this).attr('Alcantarillado'));
           // $("#_Id_Alcantarillado").val($(this).attr('Id_Alcantarillado'));
             $("#cantidad").val($(this).attr('Tamano_Predio'));
              $("#valor").val($(this).attr('Valor_Hectarea'));
               $("#total").val($(this).attr('Valor_Total'));


            $("#nombre_usuario_busqueda").val($(this).attr('nombre_usuario_busqueda'));
            $("#apellido_usuario_busqueda").val($(this).attr('apellido_usuario_busqueda'));
            $("#usuario-busqueda").val($(this).attr('nombre_usuario_busqueda'));

            $('#contenedor-nuevo-predio').slideDown('slow', function() {

                $("#guardar_predio").text('* Actualizar');
                $("#_accion_predios").val(2);
                $('#btn-agregar-predio').attr('disabled','true');
                $('.actualizar-predio').attr('disabled','true');
                $('.eliminar-predio').attr('disabled','true');

            });

        });
        //buscador deusuarios para el registro predios
        $(document).on('keyup','#usuario-busqueda', function() {

            if($("#usuario-busqueda").val() == '') {
                $("#resultado-busquedad-usuarioPredio").slideUp('slow');
            } else {

              if($(this).val().length >= 4) {

                  var documento = $("#usuario-busqueda").val();

                  $.ajax({
                      url: 'controllers/predios/getUsuarioPredio.php',
                      data: {
                        documento:documento
                      },
                      method: 'post',
                      success: function(data) {
                        $("#resultado-busquedad-usuarioPredio").slideDown('slow', function(){
                            $("#resultado-busquedad-usuarioPredio").html(data);
                        });

                      }
                  });

              }
            }

        });

        //btn que genera la aleta de eliminacion
        $(document).on('click','.eliminar-predio', function() {

            $("#_Id_Predio_Usuario").val($(this).attr('Id_Predio_Usuario'));
            toastr.error("Seguro que desea eliminar el Predio<br><button type='button' class='btn clear confirmar-eliminar-Predio'>Confirmar eliminar</button> ", "Predios");

        });

         //btn que elimina
        $(document).on('click', '.confirmar-eliminar-Predio',function() {

            var idPredio    = $("#_Id_Predio_Usuario").val();

            $.ajax({
                url: 'controllers/predios/eliminar.php',
                data: {
                    idPredio:idPredio,
                },
                method: 'post',
                success:function(data){

                    cargarListadoPredios();
                      $("#facturaseleccionada-usuario").html(data);
                   $('#facturaseleccionada-usuario').slideDown('slow');
                }
            });
        });

        //buscador
        $(document).on('keyup','.buscar-predios', function() {

            if($(".buscar-predios").val() == '') {
                cargarListadoPredios();
            } else {

            if($(this).val().length >= 3) {

                var nombre = $(".buscar-predios").val();

                $.ajax({
                    url: 'controllers/predios/getPredio.php',
                    data: {
                        nombre:nombre
                    },
                    method: 'post',
                    success: function(data) {
                        $("#listados-global").html(data);
                    }
                });
            }
            }

        });
//final propiedades del modulo predios de usuario
/*-----------------------------------------------------------------------------*/

//inicio propiedades del modulo reunion
/*-----------------------------------------------------------------------------*/


        $(document).on('click','#reunion-panel', function() {

            $("#proceso_activo").text('Reuniones');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nueva-facturaServiProducto').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#resultadoConsultaCargarDatosfactServiProductosCredito").slideUp('slow');
            $('#contenedor-CargarDatosfactServiProductosCredito').slideUp('slow');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');


               // pagos de agua
            $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');

            cargarListadoReuniones();
            cargarFormularioNuevaReunion();

        });

        function cargarListadoReuniones() {

            $.ajax({
                url: 'controllers/reunion/listar.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#listados-global").html(data);
                    $("#buscador-global-reuniones").css('display','block');
                    $("#buscador-global-tipoPagos").css('display','none');
                    $("#buscador-global-tipoMovimientos").css('display','none');
                    $("#buscador-global-usuarios").css('display','none');
                    $("#buscador-global-tipoPredios").css('display','none');
                    $("#buscador-global-predios").css('display','none');
                    $("#buscador-global-productosServicio").css('display','none');
                     $("#buscador-global-predios-corte-agua").css('display','none');

                    $("#buscar-reuniones").val('');
                }
            });

        };

        function cargarFormularioNuevaReunion() {

             $.ajax({
                url: 'views/reunion/crear.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#reunion-agregar").html(data);
                }
            });

        };

        $(document).on('click', '#btn-agregar-reunion', function() {

            $('#contenedor-nuevo-reunion').slideDown('slow', function() {
                $('.actualizar-reunion').attr('disabled','true');
                $('.eliminar-reunion').attr('disabled','true');
                $('#btn-agregar-reunion').attr('disabled','true');
                $('#_accion_reunion').val(1);
            });

        });

        $(document).on('click','#guardar-reunion', function() {

            var nombre_reunion    = $('#nombre_reunion').val();
            var detalle_reunion   = $('#detalle_reunion').val();
            var fecha_reunion     = $('#fecha_reunion').val();
            var Id_Detalle_Reunion= $('#_Id_Detalle_Reunion').val();

            if($("#_accion_reunion").val() == 1) {

                $.ajax({
                    url: 'controllers/reunion/crear.php',
                    data: {
                        nombre_reunion:nombre_reunion,
                        detalle_reunion:detalle_reunion,
                        fecha_reunion:fecha_reunion,
                    },
                    method: 'post',
                    success:function(data) {
                        $('#contenedor-nuevo-reunion').slideUp('slow', function() {
                            $('#nombre_reunion').val('');
                            $('#detalle_reunion').val('');
                            $('#fecha_reunion').val('');
                            cargarListadoReuniones();
                        });
                    }
                });

            } else if($("#_accion_reunion").val() == 2) {

                $.ajax({
                    url: 'controllers/reunion/actualizar.php',
                    data: {
                        Id_Detalle_Reunion:Id_Detalle_Reunion,
                        detalle_reunion:detalle_reunion,
                        nombre_reunion:nombre_reunion,
                        fecha_reunion:fecha_reunion,
                    },
                    method: 'post',
                    success:function(data) {
                        $('#contenedor-nuevo-reunion').slideUp('slow', function() {
                            $('#nombre_reunion').val('');
                            $('#detalle_reunion').val('');
                            $('#fecha_reunion').val('');
                            cargarListadoReuniones();
                        });
                    }
                });

            }

        });

        //captuara el reuniones para ser actualizadas
        $(document).on('click', '.actualizar-reunion', function() {

            $('#nombre_reunion').val($(this).attr('Nombre_Reunion'));
            $('#detalle_reunion').val($(this).attr('Detalle_Reunion'));
            $('#fecha_reunion').val($(this).attr('Fecha_Reunion'));
            $('#_Id_Detalle_Reunion').val($(this).attr('Id_Detalle_Reunion'));

            $('#contenedor-nuevo-reunion').slideDown('slow', function() {

               $('#guardar-reunion').text("Actualizar");
               $('#_accion_reunion').val(2);
               $('.actualizar-reunion').attr('disabled','true');
               $('.eliminar-reunion').attr('disabled','true');
               $('#btn-agregar-reunion').attr('disabled','true');

            });

        });

        $(document).on('click', '#cancelar-reunion', function() {

            $('#contenedor-nuevo-reunion').slideUp('slow', function() {
                $('#nombre_reunion').val('');
                $('#detalle_reunion').val('');
                $('#fecha_reunion').val('');
                cargarListadoReuniones();
            });

        });

        //btn que genera la aleta de eliminacion de tipo de movimientos
        $(document).on('click','.eliminar-reunion', function() {

            $("#_Id_Detalle_Reunion").val($(this).attr('Id_Detalle_Reunion'));
            toastr.error("Seguro que desea eliminar la reunion<br><button type='button' class='btn clear confirmar-eliminar-reunion'>Confirmar eliminar</button> ", "Reuniones");

        });

        //btn que elimina tipo de movimientos
        $(document).on('click', '.confirmar-eliminar-reunion',function() {

            var Id_Detalle_Reunion    = $("#_Id_Detalle_Reunion").val();

            $.ajax({
                url: 'controllers/reunion/eliminar.php',
                data: {
                    Id_Detalle_Reunion:Id_Detalle_Reunion,
                },
                method: 'post',
                success:function(data){
                    cargarListadoReuniones();
                }
            });

        });

         //buscador
        $(document).on('keyup','.buscar-reuniones', function() {

            if($(".buscar-reuniones").val() == '') {
                cargarListadoReuniones();
            } else {

            if($(this).val().length >= 3) {

                var nombre = $(".buscar-reuniones").val();

                $.ajax({
                    url: 'controllers/reunion/getReunion.php',
                    data: {
                        nombre:nombre
                    },
                    method: 'post',
                    success: function(data) {
                        $("#listados-global").html(data);
                    }
                });
            }
            }

        });

//final propiedades del modulo reuniones
/*-----------------------------------------------------------------------------*/
//inicio propiedades del modulo productos y servicios
/*-----------------------------------------------------------------------------*/

        //click en el paner de productos y servicios
        $(document).on('click', '#tipos-ProductosServicios-panel',function() {

            $("#proceso_activo").text('Productos y Servicios');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-nueva-facturaServiProducto').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#resultadoConsultaCargarDatosfactServiProductosCredito").slideUp('slow');
            $('#contenedor-CargarDatosfactServiProductosCredito').slideUp('slow');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');


               // pagos de agua
             $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');

            cargarListadoProductosServicios();
            cargarFormularioNuevoProductosServicios();
            MontarSelectTipoServiProducto();

        });

        //listado de productos y servicios
        function cargarListadoProductosServicios() {

            $.ajax({
                url: 'controllers/productosServicios/listar.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#listados-global").html(data);
                    $("#buscador-global-productosServicio").css('display','block');
                    $("#buscador-global-reuniones").css('display','none');
                    $("#buscador-global-tipoPagos").css('display','none');
                    $("#buscador-global-tipoMovimientos").css('display','none');
                    $("#buscador-global-usuarios").css('display','none');
                    $("#buscador-global-tipoPredios").css('display','none');
                    $("#buscador-global-predios").css('display','none');
                      $("#buscador-global-predios-corte-agua").css('display','none');

                    $("#buscar-productosServicios").val('');
                }
            });

        };

        //formulario de nuevo productos y servicios
        function cargarFormularioNuevoProductosServicios() {

             $.ajax({
                url: 'views/productosServicios/crear.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#reunion-agregar").html(data);
                }
            });

        };

         // mostrar listado de tipo de productos
         function MontarSelectTipoServiProducto() {

            $.ajax({
                url: 'controllers/productosServicios/selecttiposerviproducto.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#Selecttipoproducto").html(data);

                }
            });
        };

        //bn de agregar productos y servicios
        $(document).on('click','#btn-agregar-productoServicio', function() {

            $('#contenedor-nuevo-productosServicios').slideDown('slow', function() {
                $('.actualizar-productoServicio').attr('disabled','true');
                $('.eliminar-productoServicio').attr('disabled','true');
                $('#btn-agregar-productoServicio').attr('disabled','true');
                $('#_accion_productoServicio').val(1);
            });

        });

        //btn cancelar productos y servicios
        $(document).on('click', '#cancelar-productoServicio', function() {

            $('#contenedor-nuevo-productosServicios').slideUp('slow', function() {
                $('#nombre_productoServicio').val('');
                $('#detalle_productoServicio').val('');
                $('#valor_productoServicio').val('');
                $('#guardar-productoServicio').text("Agregar");
                cargarListadoProductosServicios();
            });

        });

        //btn agregar productos y servicios
        $(document).on('click','#guardar-productoServicio', function() {

            var nombre_productoServicio     =    $('#nombre_productoServicio').val();
            var detalle_productoServicio    =    $('#detalle_productoServicio').val();
            var valor_productoServicio      =    $('#valor_productoServicio').val();
            var Id_Servi_Producto           =    $('#_Id_Servi_Producto').val();

            if($("#_accion_productoServicio").val() == 1) {

                $.ajax({
                    url: 'controllers/productosServicios/crear.php',
                    data: {
                        nombre_productoServicio:nombre_productoServicio,
                        detalle_productoServicio:detalle_productoServicio,
                        valor_productoServicio:valor_productoServicio,
                    },
                    method: 'post',
                    success:function(data) {
                        $('#contenedor-nuevo-productosServicios').slideUp('slow', function() {
                            $('#nombre_productoServicio').val('');
                            $('#detalle_productoServicio').val('');
                            $('#valor_productoServicio').val('');
                            cargarListadoProductosServicios();
                        });
                    }
                });

            } else if($("#_accion_productoServicio").val() == 2) {

                $.ajax({
                    url: 'controllers/productosServicios/actualizar.php',
                    data: {
                        Id_Servi_Producto:Id_Servi_Producto,
                        nombre_productoServicio:nombre_productoServicio,
                        detalle_productoServicio:detalle_productoServicio,
                        valor_productoServicio:valor_productoServicio,
                    },
                    method: 'post',
                    success:function(data) {
                        $('#contenedor-nuevo-productosServicios').slideUp('slow', function() {
                            $('#nombre_productoServicio').val('');
                            $('#detalle_productoServicio').val('');
                            $('#valor_productoServicio').val('');
                            cargarListadoProductosServicios();
                        });
                    }
                });

            }

        });

        //captuara el productoServicio para ser actualizado
        $(document).on('click', '.actualizar-productoServicio', function() {

            $('#nombre_productoServicio').val($(this).attr('Nombre_Servi_Producto'));
            $('#detalle_productoServicio').val($(this).attr('Descripcion'));
            $('#valor_productoServicio').val($(this).attr('Valor_Servi_Producto'));
            $('#_Id_Servi_Producto').val($(this).attr('Id_Servi_Producto'));

            $('#contenedor-nuevo-productosServicios').slideDown('slow', function() {

               $('#guardar-productoServicio').text("Actualizar");
               $('#_accion_productoServicio').val(2);
               $('.actualizar-productoServicio').attr('disabled','true');
               $('.eliminar-productoServicio').attr('disabled','true');
               $('#btn-agregar-productoServicio').attr('disabled','true');

            });

        });

         //btn que genera la aleta de eliminacion de productos y servicios
        $(document).on('click','.eliminar-productoServicio', function() {

            $("#_Id_Servi_Producto").val($(this).attr('Id_Servi_Producto'));
            toastr.error("Seguro que desea eliminar el producto y servicio<br><button type='button' class='btn clear confirmar-eliminar-productoServicio'>Confirmar eliminar</button> ", "Productos y Servicios");

        });

        //btn que elimina tipo de productos y servicios
        $(document).on('click', '.confirmar-eliminar-productoServicio',function() {

            var Id_Servi_Producto    = $("#_Id_Servi_Producto").val();

            $.ajax({
                url: 'controllers/productosServicios/eliminar.php',
                data: {
                    Id_Servi_Producto:Id_Servi_Producto,
                },
                method: 'post',
                success:function(data){
                    cargarListadoProductosServicios();
                }
            });

        });

        //buscador
        $(document).on('keyup','.buscar-productosServicios', function() {

            if($(".buscar-productosServicios").val() == '') {
                cargarListadoProductosServicios();
            } else {

            if($(this).val().length >= 3) {

                var nombre = $(".buscar-productosServicios").val();

                $.ajax({
                    url: 'controllers/productosServicios/getProductoServicio.php',
                    data: {
                        nombre:nombre
                    },
                    method: 'post',
                    success: function(data) {
                        $("#listados-global").html(data);
                    }
                });
            }
            }

        });


//final propiedades del modulo productos y servicios
/*-----------------------------------------------------------------------------*/
//inicio propiedades del modulo crear factura serviproductos
/*-----------------------------------------------------------------------------*/

        //click en el paner de productos y servicios
        $(document).on('click', '#crear-facturaServiProducto-panel',function() {

            $("#proceso_activo").text('Crear Factura de Servicios y Productos');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#listados-global").html('');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');


                // pagos de agua
             $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');

            //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
            $('#boton-consultar-facturas-imprimir').slideUp('slow');
             $("#buscador-global-predios-corte-agua").slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');

            cargarFormularioNuevaFacturaServiProducto();
            proceso = 1;


        });



        //cargar el formulario para el registro de nuevas facturas
        function cargarFormularioNuevaFacturaServiProducto() {

            $.ajax({
                url: 'views/crearFacturaServiProducto/crear.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $('#facturaServiProducto-agregar').html(data);
                    $('#contenedor-nueva-facturaServiProducto').slideDown('slow');
                    cargarTiposPagosFacturacionServiProcutos();
                }
            });

        };

        //buscador de usuarios para la creacion de la factura de serviProductos
        $(document).on('keyup','#usuario-busqueda-facturaServiProducto', function() {

            if($("#usuario-busqueda-facturaServiProducto").val() == '') {
                $("#resultado-busqueda-facturaServiProducto").slideUp('slow', function() {
                    $("#crear_facturaServiPreoducto").slideUp('slow');
                });
            } else {

              if($(this).val().length >= 3) {

                  var documento = $("#usuario-busqueda-facturaServiProducto").val();

                  $.ajax({
                      url: 'controllers/crearFacturaServiProducto/getUsuarioFacturaServiProductos.php',
                      data: {
                        documento:documento
                      },
                      method: 'post',
                      success: function(data) {
                        $("#resultado-busqueda-facturaServiProducto").slideDown('slow', function(){
                            $("#resultado-busqueda-facturaServiProducto").html(data);
                        });
                        $("#crear_facturaServiPreoducto").slideDown('slow');
                      }
                  });

              }
            }

        });

        //cargar tipos de pagos para la facturacion de serviPorductos
        function cargarTiposPagosFacturacionServiProcutos() {

            $.ajax({
                url: 'controllers/crearFacturaServiProducto/listarTipoPagosFactServiProcutos.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#select-tipoPagoFacturaServiPorductos").html(data);
                }
            });

        };


        //btn que crea las facturas
        $(document).on('click','#crear_facturaServiPreoducto', function() {

            var idtipoPagoFacturaServiPorductos = $("#select-tipoPagoFacturaServiPorductos").val();
            var Id_Usuario                      = $("#id_usuario_busquedaServiProducto").val();
            var fecha_factura                   = $("#fecha_factura").val();

            $.ajax({
                url: 'controllers/crearFacturaServiProducto/crear.php',
                data: {
                    idtipoPagoFacturaServiPorductos:idtipoPagoFacturaServiPorductos,
                    Id_Usuario:Id_Usuario,
                    fecha_factura:fecha_factura,
                },
                method: 'post',
                success:function(data) {
                    cargarFormularioCompletarFacturaServiProducto();
                    toastr.info("La factura ha sido creada exitosamente, por favor si desea agrege productos o servicios a su factura","Facturacion");
                }
            });

        });

        //buscador servicios para la creacion de la factura
        $(document).on('keyup','#serviProducto-busqueda-facturaServiProducto', function() {

            if($("#serviProducto-busqueda-facturaServiProducto").val() == '') {
                $("#resultado-serviProducto-busqueda-facturaServiProducto").slideUp('slow');
            } else {

              if($(this).val().length >= 3) {

                  var nombre = $("#serviProducto-busqueda-facturaServiProducto").val();

                  $.ajax({
                      url: 'controllers/crearFacturaServiProducto/getServiProductos.php',
                      data: {
                        nombre:nombre,
                      },
                      method: 'post',
                      success: function(data) {
                        $("#resultado-serviProducto-busqueda-facturaServiProducto").slideDown('slow', function(){
                            $("#resultado-serviProducto-busqueda-facturaServiProducto").html(data);
                        });
                      }
                  });

              }
            }

        });

        //listado de productos y servicios en la creacion de una factura de serviprodcutos
        function cargarListadoCrearFacturaProductosServicios() {

            var Id_Factura = $('#Id_Factura_CreadaServiProductos').val();
            cargarTotalServiProductosAgregados();

            $.ajax({
                url: 'controllers/crearFacturaServiProducto/listarServiProductoFactura.php',
                data: {
                    Id_Factura:Id_Factura,
                },
                method: 'post',
                success:function(data) {
                    $("#listados-global").html(data);
                    $("#buscador-global-productosServicio").css('display','none');
                    $("#buscador-global-reuniones").css('display','none');
                    $("#buscador-global-tipoPagos").css('display','none');
                    $("#buscador-global-tipoMovimientos").css('display','none');
                    $("#buscador-global-usuarios").css('display','none');
                    $("#buscador-global-tipoPredios").css('display','none');
                    $("#buscador-global-predios").css('display','none');
                }
            });

        };

        //metodo carga el total de los servicio agregados hasta el momento
        function cargarTotalServiProductosAgregados() {

            var Id_Factura = $('#Id_Factura_CreadaServiProductos').val();

            $.ajax({
                url: 'controllers/crearFacturaServiProducto/totalServiProductosFactura.php',
                data: {
                    Id_Factura:Id_Factura,
                    },
                method: 'post',
                success: function(data) {
                    $('#obtenerTotalFactura').html(data);
                    $('#obtenerTotalFactura').slideDown('slow');
                }
            });

        };

          //agregar serviproductos a una factura
        function cargarFormularioCompletarFacturaServiProducto() {

             $.ajax({
                url: 'views/crearFacturaServiProducto/completarFacturaServiProductos.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $('#completarFacturaServiProducto-agregar').html(data);
                    $('#contenedor-nueva-facturaServiProducto').slideUp('slow');
                    $('#contenedor-completar-facturaServiProducto').slideDown('slow');
                    procedimientoFacuracionServiProductos();
                }
            });

        };

        //btn añadir servi producto al listado
        $(document).on('click', '#anadirServiProducto', function() {

            var valorServiProducto  = $('#Valor_Servi_Producto').val();
            var Id_Servi_Producto   = $('#id_Servi_Producto').val();
            var Id_Factura          = $('#Id_Factura_CreadaServiProductos').val();

            if(proceso == 1) {

            console.log('agregar para ingreso');
            $.ajax({
                url: 'controllers/crearFacturaServiProducto/agregarServiProduto.php',
                data: {
                valorServiProducto:valorServiProducto,
                Id_Factura:Id_Factura,
                Id_Servi_Producto:Id_Servi_Producto,
                },
                method: 'post',
                success: function(data) {
                    toastr.info("Producto agregado con exito","Productos y Servicios");
                    cargarFormularioCompletarFacturaServiProducto();
                    cargarListadoCrearFacturaProductosServicios();
                    $('#Valor_Servi_Producto').val('');
                    $('#id_Servi_Producto').val('');
                }
            });

            } else if(proceso == 2) {

                $('#idServiPOrductoEscogidoEgreso').val(Id_Servi_Producto);
                toastr.warning("¿Esta seguro que desea crear la factura de tipo egreso?<br><button class='btn clear btnconfirmarCrearFacturaEgreso'>Confirmar crear</button>","CREAR FACTURA TIPO EGRESO");

            }

        });



        //btn que genera la aleta de eliminacion de productos y servicios de la factura
        $(document).on('click','.eliminar-productoServicioFactura', function() {

            $("#id_detalle_factura").val($(this).attr('id_detalle_factura'));
            toastr.error("Seguro que desea eliminar el producto y servicio<br><button type='button' class='btn clear confirmar-eliminar-productoServicioFactura'>Confirmar eliminar</button> ", "Productos y Servicios");

        });

        //btn que elimina productos y servicios de la factura
        $(document).on('click', '.confirmar-eliminar-productoServicioFactura',function() {

            var Id_Detalle_Factura    = $("#id_detalle_factura").val();

            $.ajax({
                url: 'controllers/crearFacturaServiProducto/eliminarServiProducto.php',
                data: {
                    Id_Detalle_Factura:Id_Detalle_Factura,
                },
                method: 'post',
                success:function(data){
                    cargarListadoCrearFacturaProductosServicios();
                }
            });

        });

          //metodo que busca la ultima factura creada
        function procedimientoFacuracionServiProductos() {

            $.ajax({
                url: 'controllers/crearFacturaServiProducto/buscarFacturaCreada.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $('#Id_Factura_CreadaServiProductos').val(data);
                }
            });

        };


         //btn terminar la facturacion de los servicios y productos
        $(document).on('click', '#terminar-FacturacionServiProductos', function() {

            var Id_Factura          = $('#Id_Factura_CreadaServiProductos').val();
            var totalValoCapturado  = $('#totalValorCapturado').val();

            $.ajax({
                url: 'controllers/crearFacturaServiProducto/actualizarValorFactura.php',
                data: {
                    Id_Factura:Id_Factura,
                    totalValoCapturado:totalValoCapturado,
                },
                method: 'post',
                success:function(data){
                    toastr.info("La facturacion se realizo con exito.","FACTURACION TERMINADA");

                    //datos estaticos
                    if($("#select-tipoPagoFacturaServiPorductos").val() == 9) {


                        setTimeout("cargarFormularioCompletarFacturaCredito()", 2000);
                        cargeDatosFactServiProductosCredito(Id_Factura);
                        $('#contenedor-completar-facturaServiProducto').slideUp('slow');
                        $('#obtenerTotalFactura').slideUp('slow');
                        $("#listados-global").html('');

                    } else {

                        $("#cargando").slideDown('slow');
                        setTimeout("procesoFinalizado()", 3000);

                    }

                }
            });

        });

        //proceso finalizado de crear factura de tipo contado
        function procesoFinalizado() {
            self.location='administracion.php';
        };

        //metodo que busca el ultimo credio creado
        function procedimientoFacuracionServiProductosCredito() {

            $.ajax({
                url: 'controllers/crearFacturaServiProducto/buscarCreditoCreado.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $('#id_ultimoCreditoCreado').val(data);
                }
            });

        };

        //carga el formulario para agregar creditos a una factura
        function cargarFormularioCompletarFacturaCredito() {

            $.ajax({
                url: 'views/crearFacturaServiProducto/facturaCredito.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $('#contenedor-nueva-facturaServiProducto').slideUp('slow');
                    $("#completarFacturaServiProducto-credito").html(data);
                }
            });

        };

        /*carga los datos de la ultmafactura creada para realizarle el credito en caso que aya sido
        seleccioinada como factura de credito*/
        function cargeDatosFactServiProductosCredito(Id_Factura) {

            $.ajax({
                url: 'controllers/crearFacturaServiProducto/cargarDatosFacturaCredito.php',
                data: {
                    Id_Factura:Id_Factura,
                },
                method: 'post',
                success:function(data) {
                    $("#contenedor-CargarDatosfactServiProductosCredito").html(data);
                    $("#resultadoConsultaCargarDatosfactServiProductosCredito").slideDown('slow');
                }
            });

        };

        //operacion para obtener el valor total de la deuda de una factura tipo credito
        $(document).on('keyup','#valorAvonoFact', function() {

            console.log('calculando valor total de la deuda.');

            var valTotalfact  = $("#valorTotalFact").val();
            var valTotalAvono = $("#valorAvonoFact").val();

            var total = valTotalfact - valTotalAvono;
            $("#valorDeudaFact").val(total);

        });

        //crea el credito para una factura tipo credito
        $(document).on('click', '#finalizarFactServiPorductosCredito', function() {

            var IdFactCredito           = $("#id_factCredito").val();
            var fechaFactCredito        = $("#fecha_factCredito").val();
            var fechaVencFactCredito    = $("#fecha_factCreditoVencimiento").val();
            var valorTotFactCredito     = $("#valorTotalFact").val();
            var valorTotDeudaFactCredito= $("#valorDeudaFact").val();

            $.ajax({
                url: 'controllers/crearFacturaServiProducto/crearCreditoFacServiProductos.php',
                data: {

                    IdFactCredito:IdFactCredito,
                    fechaFactCredito:fechaFactCredito,
                    fechaVencFactCredito:fechaVencFactCredito,
                    valorTotFactCredito:valorTotFactCredito,
                    valorTotDeudaFactCredito:valorTotDeudaFactCredito,
                },
                method: 'post',
                success:function(data){

                    $("#cargando").slideDown('slow');

                    toastr.info("La FACTURACION de tipo CREDITO se realizo con exito.","FACTURACION TERMINADA");
                    procedimientoFacuracionServiProductosCredito();
                    setTimeout("registroDetalleFactCredito()", 3000);
                }
            });

        });

        //metodo que registra los detalles del credito
        function registroDetalleFactCredito() {

            var idCredito               = $("#id_ultimoCreditoCreado").val();
            var valorAvonoFactCredito   = $("#valorAvonoFact").val();
            var fechaAvonoFactCredito   = $("#fecha_factCredito").val();

            $.ajax({
                url: 'controllers/crearFacturaServiProducto/crearDetalleCreditoFacServiProductos.php',
                data: {
                    idCredito:idCredito,
                    fechaAvonoFactCredito:fechaAvonoFactCredito,
                    valorAvonoFactCredito:valorAvonoFactCredito,
                },
                method: 'post',
                success:function(data){
                    self.location='administracion.php';
                    setTimeout("cargarFormularioNuevaFacturaServiProducto()", 2000);
                }
            });

        };



//final propiedades del modulo crear factura serviproductos
/*-----------------------------------------------------------------------------*/
//inicial propiedades del modulo gestionar factura serviproductos
/*-----------------------------------------------------------------------------*/

        function gestionarFacturasClickPanel() {

            $("#proceso_activo").text('Gestionar Factura de Servicios y Productos');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#contenedor-nueva-facturaServiProducto').slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $("#listados-global").html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');

            //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
             $("#buscador-global-predios-corte-agua").slideUp('slow');


               // pagos de agua
              $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');

            cargarFormularioGestionarFacturasServiPorductosDeUsuario();
            cargarFormularioGestionarFacturaCreditoServiProducto();

        };

        //click en el panel de productos y servicios gestionar facturas
        $(document).on('click', '#gestionar-facturaServiProducto-panel',function() {

            gestionarFacturasClickPanel();

        });

        //cargar el formulario de buscar usuario para la gestion de facturas
        function cargarFormularioGestionarFacturasServiPorductosDeUsuario() {

            $.ajax({
                url: 'views/gestionarFacturaServiProducto/gestionarFacturaCreditoServiProducto.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#facturaServiProducto-gestionar").html(data);
                    $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideDown('slow');
                }
            });

        };

        //buscador usuario para la gestion de facturas
        $(document).on('keyup','#documentoUsuarioGestionarFacturasServiProductos', function() {

            if($("#documentoUsuarioGestionarFacturasServiProductos").val() == '') {
                $("#resultado-busqueda-facturaServiProductoDeUsuario").slideUp('slow');
                $("#ActualizarFacturaCreditoServiProductoDeUsuario").slideUp('slow');
            } else {

              if($(this).val().length >= 3) {

                var documento = $("#documentoUsuarioGestionarFacturasServiProductos").val();
                cargarListadoFacturasCreditoServiProductoDeUsuario(documento);
                cargarListadoFacturasContadoServiProductoDeUsuario(documento);

              }
            }

        });

        function cargarListadoFacturasCreditoServiProductoDeUsuario(documento) {

            $.ajax({
                      url: 'controllers/gestionarFacturaServiProducto/buscarUsuarioGestionarFacturaCreditoServiProducto.php',
                      data: {
                        documento:documento,
                      },
                      method: 'post',
                      success: function(data) {
                        $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideDown('slow', function(){
                            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").html(data);
                        });
                      }
                  });

        };

        //carga el listado de facturas de tipo contado por numero de documento de usuario
        function cargarListadoFacturasContadoServiProductoDeUsuario(documento) {

            $.ajax({
                url: 'controllers/gestionarFacturaServiProducto/buscarUsuarioGestionarFacturaContadoServiProducto.php',
                data: {
                    documento:documento,
                },
                method: 'post',
                success: function(data) {
                    $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideDown('slow', function(){
                    $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").html(data);
                    $("#abonoFacturaCreditoServiPorcutos").val('');
                    });
                }
            });

        };

        //cargar formulario gestionar facturas de tipo credito
        function cargarFormularioGestionarFacturaCreditoServiProducto() {

            $.ajax({
                url: 'views/gestionarFacturaServiProducto/complegarGestinarFacturaCreditoServiPorducto.php',
                data: null,
                method: 'post',
                success: function(data) {
                    $("#ActualizarFacturaCreditoServiProductoDeUsuario").html(data);
                    $("#AbonoPagadoFacturaCreditoServiProductoDeUsuario").html(data);
                    $("#abonoFacturaCreditoServiPorcutos").val('');
                }
            });

        };

        //btn gestionar factura de credito
        $(document).on('click','#gestionarFacturaCredito', function() {

            $("#totalValorFacturaCreditoServiPorcutos").val($(this).attr('valor_total_factura'));
            $("#totalDeudaFacturaCreditoServiPorcutos").val($(this).attr('valor_total_deuda'));
            $("#idCreditoFacturaCreditoServiPorcutos").val($(this).attr('Id_Credito'));
            $("#fechaFacturaCreditoServiPorcutos").val($(this).attr('fecha'));

            $("#ActualizarFacturaCreditoServiProductoDeUsuario").slideDown('slow');
            $("#gestionarFacturaCreditoServiPorducto").slideDown('slow');

            var idCredito = $("#idCreditoFacturaCreditoServiPorcutos").val();
            cargarListadoAbonosFacturaCreditoServiPorductos(idCredito);
            $("#listadoAbonosDeFacturasPorCredito").slideDown('slow');

            $(".gestionarFacturaCredito").attr('disabled','true');
            $(".VerAbonosCreditoPagadoFacturaServiProdcutos").attr('disabled','true');

        });

        function cargarListadoAbonosFacturaCreditoServiPorductos(idCredito) {

            $.ajax({
                url: 'controllers/gestionarFacturaServiProducto/listadoAbonosFacturaCreditoServiPordcutos.php',
                data: {
                    idCredito:idCredito,
                },
                method: 'post',
                success:function(data) {
                    $("#listadoAbonosDeFacturasPorCredito").html(data);
                    $("#AbonoPagadoFacturaCreditoServiProductoDeUsuario").html(data);
                }
            });

        };

        //ver abonos de factura tipo credito pagada
        $(document).on("click", "#VerAbonosCreditoPagadoFacturaServiProdcutos", function() {

            $("#idCreditoFacturaCreditoServiPorcutos").val($(this).attr('Id_Credito'));
            var idCredito = $("#idCreditoFacturaCreditoServiPorcutos").val();
            $("#AbonoPagadoFacturaCreditoServiProductoDeUsuario").slideDown('slow');
            cargarListadoAbonosFacturaCreditoServiPorductos(idCredito);

            $(".gestionarFacturaCredito").attr('disabled','true');
            $(".VerAbonosCreditoPagadoFacturaServiProdcutos").attr('disabled','true');

        });

        //ocultar listado abonos de factura tipo credito pagada
        $(document).on("click", "#ocultarListadoAbonosDeFactCreditoPagada", function() {

            $("#AbonoPagadoFacturaCreditoServiProductoDeUsuario").slideUp('slow', function() {
                var documento = $("#documentoUsuarioGestionarFacturasServiProductos").val();
                cargarListadoFacturasCreditoServiProductoDeUsuario(documento);
                cargarListadoFacturasContadoServiProductoDeUsuario(documento);
            });

        });

        //operacion para agregar un nuevo abono la deuda de una factura tipo credito
        $(document).on('change','#abonoFacturaCreditoServiPorcutos', function() {

            toastr.info("¿Esta seguro que desea agregar el abono a la factura seleccioinada?<br><button class='btn btn-primary btn-xl confirmarRegistroDeAbonoServiProducto'>Confirmar</button>","FACTURACION SERVICIOS Y PRODUCTOS");

        });

        //confirmar abono serviPorducto
        $(document).on("click",".confirmarRegistroDeAbonoServiProducto", function() {

            var idCredito           = $("#idCreditoFacturaCreditoServiPorcutos").val();
            var valTotaldeuda       = $("#totalDeudaFacturaCreditoServiPorcutos").val();
            var valTotalAvono       = $("#abonoFacturaCreditoServiPorcutos").val();
            var fecha               = $("#fechaFacturaCreditoServiPorcutos").val();

            var total = valTotaldeuda - valTotalAvono;
            $("#totalDeudaFacturaCreditoServiPorcutos").val(total);
            guardarDetalleCreditoGestionarFacturacionServiPorductos(idCredito, valTotalAvono, fecha);
            actualizarValorTotalDeudaFacuraCreditoServiProductos(idCredito, total);
            var idCredito = $("#idCreditoFacturaCreditoServiPorcutos").val();
            cargarListadoAbonosFacturaCreditoServiPorductos(idCredito);

        });

        //metodo que guarda datos en la tabla detalle de credito
        function guardarDetalleCreditoGestionarFacturacionServiPorductos(idCredito, valTotalAvono, fecha) {

            $.ajax({
                url:'controllers/gestionarFacturaServiProducto/crearDetalleCreditoFacturaServiProducto.php',
                data:{
                    idCredito:idCredito,
                    valTotalAvono:valTotalAvono,
                    fecha:fecha,
                },
                method: 'post',
                success:function(data) {
                    toastr.info("Abono agregado con exito","GESTIONAR FACTURACION TIPO CREDITO");
                }
            });

        };

        //metodo que actualiza el credito
        function actualizarValorTotalDeudaFacuraCreditoServiProductos(idCredito, total) {

            $.ajax({
                url:'controllers/gestionarFacturaServiProducto/actualizarCreditoFacturaServiProducto.php',
                data:{
                    idCredito:idCredito,
                    total:total,
                },
                method: 'post',
                success:function(data) {
                    $("#abonoFacturaCreditoServiPorcutos").val('');
                }
            });

        };

        //limpiarFormulariosYCampos
        function limpiarFormularioGestionarFacturaCreditoSeriProducto() {

            $("#totalDeudaFacturaCreditoServiPorcutos").val('');
            $("#totalValorFacturaCreditoServiPorcutos").val('');
            $("#abonoFacturaCreditoServiPorcutos").val('');
            $("#ActualizarFacturaCreditoServiProductoDeUsuario").slideUp('slow');

            var documento = $("#documentoUsuarioGestionarFacturasServiProductos").val();
            cargarListadoFacturasCreditoServiProductoDeUsuario(documento);
            cargarListadoFacturasContadoServiProductoDeUsuario(documento);

        };

        //cancelar gestion de facturas tipo credito
        $(document).on('click','#cancelarGestionarFactiurasServiProductos', function() {

            limpiarFormularioGestionarFacturaCreditoSeriProducto();

        });

        //mostrar listado facturas tipo contado de servi Porductos
        $(document).on("click", "#mostarListadoFacturasTipoContadoServiPorductos", function() {

            $(".ListadoFacturasTipoContadoServiPorductos").slideDown('slow');
            $("#mostarListadoFacturasTipoContadoServiPorductos").slideUp('slow');
            $("#ocultarListadoFacturasTipoContadoServiPorductos").slideDown('slow');

        });

        //ocultar listado facturas tipo contado de servi Porductos
        $(document).on("click", "#ocultarListadoFacturasTipoContadoServiPorductos", function() {

            $(".ListadoFacturasTipoContadoServiPorductos").slideUp('slow');
            $("#ocultarListadoFacturasTipoContadoServiPorductos").slideUp('slow');
            $("#mostarListadoFacturasTipoContadoServiPorductos").slideDown('slow');

        });

        //mostrar listado facturas tipo credito de servi Porductos
        $(document).on("click", "#mostarListadoFacturasTipoCreditoServiPorductos", function() {

            $(".ListadoFacturasTipoCreditoServiPorductos").slideDown('slow');
            $("#mostarListadoFacturasTipoCreditoServiPorductos").slideUp('slow');
            $("#ocultarListadoFacturasTipoCreditoServiPorductos").slideDown('slow');

        });

        //ocultar listado facturas tipo credito de servi Porductos
        $(document).on("click", "#ocultarListadoFacturasTipoCreditoServiPorductos", function() {

            $(".ListadoFacturasTipoCreditoServiPorductos").slideUp('slow');
            $("#ocultarListadoFacturasTipoCreditoServiPorductos").slideUp('slow');
            $("#mostarListadoFacturasTipoCreditoServiPorductos").slideDown('slow');

        });


//final propiedades del modulo gestionar factura serviproductos
/*-----------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------*/
//inicio propiedades del modulo Asistencia


  $(document).on('click', '#select-panel',function() {


            $("#proceso_activo").text('Gestionar Reuniones');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#contenedor-nueva-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#resultadoConsultaCargarDatosfactServiProductosCredito").slideUp('slow');
            $('#contenedor-CargarDatosfactServiProductosCredito').slideUp('slow');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $("#listados-global").html('');
            $("#reunion-select").html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');


           // pagos de agua
            $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');

            //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
            $('#boton-consultar-facturas-imprimir').slideUp('slow');
             $("#buscador-global-predios-corte-agua").slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');

            cargarSelectReuniones();
            MontarSelect();

        });

        //select selecionar reunion para llamar asistencia
        function cargarSelectReuniones() {

            $.ajax({
                url: 'views/reunion/select.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#listados-global").html(data);

                }
            });
        };


        // monstar listado de reuines en select
        function MontarSelect() {

            $.ajax({
                url: 'controllers/reunion/SelectReuniones.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#SelectReunion").html(data);

                }
            });
        };

      // botn de llamar asistencia

     $(document).on('click', '#ListarAsistencia',function() {

            var SelectReunion    = $("#SelectReunion").val();

            $.ajax({
                url: 'controllers/reunion/listarusuariosreuniones.php',
                data: {
                   SelectReunion:SelectReunion,
                },
                method: 'post',
                success:function(data){

                  $("#reunion-select").html(data);
                }
            });

        });


        // monstar listado de reuines en select
        function llamarlistado() {

            $.ajax({
                url: 'controllers/reunion/listarusuariosreuniones.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#reunion-select").html(data);

                }
            });
        };

//----------------------Fin reunion reportes-------------------//
//----------------------Inicion modulo multar usuarIOS---------------------------------------//

        //Agreagr multas por inasistencia a reuniones
        $(document).on('click', '#multas-panel',function() {

            $("#proceso_activo").text('Reuniones');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');

            //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
             $("#buscador-global-predios-corte-agua").slideUp('slow');


                // pagos de agua
             $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');

            cargarSelectMultas();
            MontarSelecttipomultas();
            reunionregistradas();

        });

        //select selecionar reunion para llamar asistencia
        function cargarSelectMultas() {

            $.ajax({
                url: 'views/reunion/selectmultas.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#listados-global").html(data);

                }
            });
        };


          // monstar listado de reuines registrdas en select
         function MontarSelecttipomultas() {

            $.ajax({
                url: 'controllers/reunion/selectmultados.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#selectmultar").html(data);

                }
            });
        };


        // montar listado de reuines registradas en select
        function reunionregistradas() {

            $.ajax({
                url: 'controllers/reunion/reunionesregistradas.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#reunionesregistras").html(data);

                }
            });
        };



      // boton de registrar asistencia

     $(document).on('click', '#multados',function() {

            var selectmultar         = $("#selectmultar").val();
            var reunionesregistras   = $("#reunionesregistras").val();

            $.ajax({
                url: 'controllers/reunion/listadosmultados.php',
                data: {
                   selectmultar:selectmultar,
                   reunionesregistras:reunionesregistras,
                },
                method: 'post',
                success:function(data){

                  $("#listados-multados").html(data);
                }
            });

        });


       // montar listado de reuines en select
         function listarmultados() {

            $.ajax({
                url: 'controllers/reunion/listadosmultados.php',
                data: null,
                method: 'get',
                success:function(data) {
                    $("#listados-multados").html(data);

                }
            });
        };



//----------------------Fin modulo  Asistencia-------------------//
//----------------------inicio modulo reportes-------------------//

        //cargar datos de reportes
        function cargarDatosPanelReportes() {

            $("#proceso_activo").text('Reportes');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#contenedor-nueva-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#resultadoConsultaCargarDatosfactServiProductosCredito").slideUp('slow');
            $('#contenedor-CargarDatosfactServiProductosCredito').slideUp('slow');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $("#listados-global").html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');

            //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
             $("#buscador-global-predios-corte-agua").slideUp('slow');


                // pagos de agua
            $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');

            cargarreportes();
            cargarreportesdetalle();
            cargarselectMovimeintos();

        };

        //click en el panel de repostes
        $(document).on('click', '#reportes-panel',function() {

            cargarDatosPanelReportes();

        });

        //cargar select tipo de movimeinto
        function cargarreportes() {

            $.ajax({
                url: 'views/reportes/reportes.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#listados-global").html(data);

                }
            });
        };


        //cargar select tipo de movimeinto
        function cargarreportesdetalle() {

            $.ajax({
                url: 'controllers/reportes/reportedetallado.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#reportesdetallado").html(data);

                }
            });
        };


        //montar selec tipos de movimeinto
        function cargarselectMovimeintos() {

            $.ajax({
                url: 'controllers/reportes/SelectTipoReportes.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#tipomovimiento").html(data);

                }
            });
        };

        // boton de registrar asistencia
        $(document).on('click', '#botonreportes', function() {

            var tipomovimiento    = $("#tipomovimiento").val();
            var fechaminima       = $("#fechaminima").val();
            var fechamaxima       = $("#fechamaxima").val();

            $.ajax({
                url: 'controllers/reportes/listreportes.php',
                data: {
                    tipomovimiento:tipomovimiento,
                    fechaminima:fechaminima,
                    fechamaxima:fechamaxima,
                },
                method: 'post',
                success:function(data){
                    $("#repotes").html(data);
                    $("#tablaReportes").slideDown('slow');
                }
            });

        });



//----------------------Fin modulo  reportes-------------------//


//----------------------Inicio modulo resportes egresos -------//


 //click en el panel de reporte de eregrsos
        $(document).on('click', '#egresos-panel',function() {

            $("#proceso_activo").text('Crear Factura de Servicios y Productos');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#listados-global").html('');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');


                // pagos de agua
             $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');

            //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
            $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');
             $("#buscador-global-predios-corte-agua").slideUp('slow');



            reportesegresos();



        });



        //cargar el formulario de consulta de egresos
        function reportesegresos() {

            $.ajax({
                url: 'views/reportes/egresos.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $('#listados-global').html(data);

                }
            });

        };


         // boton de registrar asistencia
        $(document).on('click', '#btn-egresos', function() {

            var fechaminima       = $("#fechaminima").val();
            var fechamaxima       = $("#fechamaxima").val();

            $.ajax({
                url: 'controllers/reportes/reporteegresos.php',
                data: {

                    fechaminima:fechaminima,
                    fechamaxima:fechamaxima,
                },
                method: 'post',
                success:function(data){
                     $('#listados-egresos').html(data);

                }
            });

        });





        //cargar el formulario de consulta de egresos
        function listadoegresos() {

            $.ajax({
                url: 'controllers/reportes/reporteegresos.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $('#listados-egresos').html(data);

                }
            });

        };





//----------------------fin modulo resportes egresos -------//


//----------------------inicio modulo resportes matriculas de agua -------//


 //click en el panel de matriculas
        $(document).on('click', '#matriculas-panel',function() {

            $("#proceso_activo").text('Reporte de matriculas de agua');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#listados-global").html('');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');


               // pagos de agua
             $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');

            //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
            $('#boton-consultar-facturas-imprimir').slideUp('slow');
             $("#buscador-global-predios-corte-agua").slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');


            reportesmatriculas();



        });



        //cargar el formulario de consulta de egresos
        function reportesmatriculas() {

            $.ajax({
                url: 'views/reportes/matriculas.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $('#listados-global').html(data);

                }
            });

        };






  // boton de registrar asistencia
        $(document).on('click', '#btn-matriculas', function() {

            var fechaminima       = $("#fechaminima").val();
            var fechamaxima       = $("#fechamaxima").val();

            $.ajax({
                url: 'controllers/reportes/reportematriculas.php',
                data: {

                    fechaminima:fechaminima,
                    fechamaxima:fechamaxima,
                },
                method: 'post',
                success:function(data){
                     $('#listados-matriculas').html(data);

                }
            });

        });
        //cargar el formulario de consulta de egresos
        function listadomatriculas() {

            $.ajax({
                url: 'controllers/reportes/reportematriculas.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $('#listados-matriculas').html(data);

                }
            });

        };


//----------------------fin modulo resportes matriculas de agua -------//
//-------------------------------------------------------------//
//----------------------inicio modulo multas-------------------//

    //cargar datos de reportes
        function cargarDatosPanelModuloMultas() {

            $("#proceso_activo").text('Multas');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#contenedor-nueva-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#resultadoConsultaCargarDatosfactServiProductosCredito").slideUp('slow');
            $('#contenedor-CargarDatosfactServiProductosCredito').slideUp('slow');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $("#listados-global").html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');

            //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
             $("#buscador-global-predios-corte-agua").slideUp('slow');


               // pagos de agua
            $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');

            cargarFormularioNuevaMulta();

        };

        //click en el panel de repostes
        $(document).on('click', '#moduloMultas-panel',function() {

            cargarDatosPanelModuloMultas();

        });

        //cargar el formulario para el registro de la multas
        function cargarFormularioNuevaMulta() {

            $.ajax({
                url: 'views/multas/crear.php',
                data: null,
                method: 'post',
                success: function(data) {
                    $("#cargarModuloMultas").html(data);
                    $("#contenedor-nueva-multa").slideDown('slow');
                }
            });

        };

        //buscador deusuarios para el registro multas
        $(document).on('keyup','#usuario-busqueda-multas', function() {

            if($("#usuario-busqueda-multas").val() == '') {
                $("#resultado-busqueda-usuarioMultas").slideUp('slow');
            } else {

              if($(this).val().length >= 4) {

                  var documento = $("#usuario-busqueda-multas").val();
                  buscarUsuarioModuloMultas(documento);

              }
            }

        });

        function buscarUsuarioModuloMultas(documento) {

            $.ajax({
                url: 'controllers/multas/getUsuarioMultas.php',
                data: {
                    documento:documento
                },
                method: 'post',
                success: function(data) {
                    $('#listados-global').html(data);
                }
            });

        };

         //btn pagar modulo multa
        $(document).on('click', '.pagarModuloMulta', function() {

            //datos estaticos
            $("#Id_Tipo_Pago_Multas").val(8);
            $("#Id_Tipo_Mvimiento_Multas").val(19);
            $("#fechaCreacion").val($(this).attr('Fecha_Multa'));
            $("#valor_total").val($(this).attr('Valor_Multa'));
            $("#Id_Usuario").val($(this).attr('Id_Usuario'));
            $("#Id_Multa_Multas").val($(this).attr('Id_Multa'));
            $("#usuario-busqueda-multas").val($(this).attr('Nombre_Usuario'));

            toastr.warning("¿Esta seguro que desea pargar la multa?<br /><button class='btn clear' href='#' id='confirmar-pagarModuloMulta'>Confirmar</button>","PAGAR MULTAS");

        });

        //confirmar pagar mudulo multas
        $(document).on('click','#confirmar-pagarModuloMulta', function() {

            var Id_TipoPago         = $("#Id_Tipo_Pago_Multas").val();
            var Id_TipoMovimiento   = $("#Id_Tipo_Mvimiento_Multas").val();
            var fechaCreacion       = $("#fechaCreacion").val();
            var valorMulta          = $("#valor_total").val();
            var Id_Usuario          = $("#Id_Usuario").val();
            var Id_Multa            = $("#Id_Multa_Multas").val();
            var Nombre_Usuario      = $("#usuario-busqueda-multas").val();

            $.ajax({
                url: 'controllers/multas/pagarModuloMulta.php',
                data: {
                    Id_TipoPago:Id_TipoPago,
                    Id_TipoMovimiento:Id_TipoMovimiento,
                    fechaCreacion:fechaCreacion,
                    valorMulta:valorMulta,
                    Id_Usuario:Id_Usuario,
                },
                method:'post',
                success:function(data) {
                    $('#listados-global').html('');
                    $("#cargando").slideDown('slow');
                    toastr.info('Se realizo con exito el pago de la multa','MULTA PAGADA EXITOSAMENTE');
                    setTimeout("cargarFuncion()", 2000);
                }
            });

        });

        //cargar funcion para mostrar la barra de cargado
        function cargarFuncion() {
            var Id_Multa = $("#Id_Multa_Multas").val();
            actualizarEstadoMultaPagada(Id_Multa);
        };

        //acutualizar el estado de la multa pagada
        function actualizarEstadoMultaPagada(Id_Multa) {

            $.ajax({
                url: 'controllers/multas/actualizarEstadoMulta.php',
                data: {
                    Id_Multa:Id_Multa,
                },
                method:'post',
                success:function(data) {
                    var Nombre_Usuario      = $("#usuario-busqueda-multas").val();
                    buscarUsuarioModuloMultas(Nombre_Usuario);
                    $("#cargando").slideUp('slow');
                }
            });

        };



//----------------------Fin modulo multas-------------------//
//-------------------------------------------------------------//

//inicio propiedades del modulo facturas egresos v2
/*-----------------------------------------------------------------------------*/

        //click en el paner de productos y servicios


        $(document).on('click', '#crear-facturaEgreso-panel',function() {

            $("#proceso_activo").text('Agregar factura egreso');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#listados-global").html('');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaServiProducto").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');

            //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
             $("#buscador-global-predios-corte-agua").slideUp('slow');

             //ocultar formularios para pagos de agua
            $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
              $('#facturaseleccionada-usuario').slideUp('slow');
               $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');


            cargarFormularioAgregarFacturarEgreso();
            MontarSelectTipoServiProducto();

        });


        //formulario de nueva factura egreso
        function cargarFormularioAgregarFacturarEgreso() {

             $.ajax({
                url: 'views/crearFacturaEgreso/crear.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#facturasEgresov2-agregar").html(data);
                      $('#facturasEgresov2-agregar').slideDown('slow');
                }
            });

        };

         // mostrar listado de tipo de productos
         function MontarSelectTipoServiProducto() {

            $.ajax({
                url: 'controllers/productosServicios/selecttiposerviproducto.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#Selecttipoproducto").html(data);

                }
            });
        };

        $(document).on('click','#btnCrearFacturaEgresoV2',function() {

            var nombre              =    $('#nombre_productoServicio').val();
            var detalle             =    $('#detalle_productoServicio').val();
            var valor               =    $('#valor_productoServicio').val();
            var tipo                =    $('#Selecttipoproducto').val();
            var cantidad            =    $('#cantidad_productoServicio').val();

            $.ajax({
                url: 'controllers/crearFacturaEgreso/crearServiPorducto.php',
                data: {
                    nombre:nombre,
                    detalle:detalle,
                    valor:valor,
                    tipo:tipo,
                    cantidad:cantidad,
                },
                method: 'post',
                success: function(data) {
                    $("#cargando").slideDown('slow');
                    CrearFacturaEgreso();
                }
            });

        });

        function CrearFacturaEgreso() {

            var valor    = $('#valor_productoServicio').val();
           // var cantidad =    $('#cantidad_productoServicio').val();

           // var valorTotal = valor * cantidad;

            console.log('agregar para egreso');
            $.ajax({
                url: 'controllers/crearFacturaEgreso/crearFactEgreso.php',
                data: {
                    valor:valor,
                },
                method: 'post',
                success: function(data) {
                    console.log('agregar para egreso');
                    completarProcedimientoEgresoBuscandoFactura();
                    completarProcedimientoEgresoBuscandoServiPorducto();
                    setTimeout("terminarElProcesoEgreso()",500);
                }
            });

        };

        function completarProcedimientoEgresoBuscandoFactura() {

            $.ajax({
                url: 'controllers/crearFacturaEgreso/buscarFacturaCreada.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $('#idUltima_facturaCreadaDetipoEgreso').val(data);
                }
            });

        };

        function completarProcedimientoEgresoBuscandoServiPorducto() {

            $.ajax({
                url: 'controllers/crearFacturaEgreso/buscarServiProducto.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $('#idUltimo_ServProductoCreadoDetipoEgreso').val(data);
                }
            });

        };

        function terminarElProcesoEgreso() {

            var idFactura = $('#idUltima_facturaCreadaDetipoEgreso').val();
            var idSerProd = $("#idUltimo_ServProductoCreadoDetipoEgreso").val();
            var valor     = $('#valor_productoServicio').val();
            var cantidad  = $('#cantidad_productoServicio').val();

            $.ajax({
                url: 'controllers/crearFacturaEgreso/crearDetalleFacturaEgreso.php',
                data: {
                    idFactura:idFactura,
                    idSerProd:idSerProd,
                    valor:valor,
                    cantidad:cantidad,
                },
                method: 'post',
                success:function(data) {
                    toastr.info("Felicitaciones el proceso de crear factura tipo egreso se completo exitosamente","PORCESO TERMINADO");
                    setTimeout("procesoCompletadoEgreso()",3000);
                }
            });

        }

        function procesoCompletadoEgreso() {
             self.location='administracion.php';
        }


//final propiedades del modulo facturas egresos v2
/*-----------------------------------------------------------------------------*/

//----------------------inicio modulo Valor Consumo-------------------//

        $(document).on('click', '#valor-panel',function() {

            $("#proceso_activo").text(' - Valor Consumo');
             $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#listados-global").html('');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaServiProducto").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');

            //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
             $("#buscador-global-predios-corte-agua").slideUp('slow');

             //ocultar formularios para pagos de agua
            $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');


          listadoValorConsumo ();
        });

        //cargar listado admin
        function listadoValorConsumo() {

            $.ajax({
                url: 'controllers/ValorConsumo/listvalorconsumo.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#listados-global").html(data);

                }
            });
        };

        //muestra el formulario de registro de usuarios
        $(document).on('click', '#btn-agregar-valor', function() {

             cargarFormularioNuevoValor();


        });

        //carga el formulario de nuevo valor
        function cargarFormularioNuevoValor() {

            $.ajax({
                url: 'views/valorconsumo/create.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#valor-agregar").html(data);
                    $("#contenedor-nuevo-valor").slideDown('slow');
                }
            });

        };

        // metodo que carga el formulario nuevo valor
        $(document).on('click','.no',function() {

            $("#contenedor-nuevo-valor").slideUp('slow');

        });

        //btn que guarda Valor consumo
        $(document).on('click', '#guardarconsumo', function() {

            var nombrevalor = $("#nombrevalor").val();
            var valorconsumo = $("#valorconsumo").val();

            $.ajax({
                url: 'controllers/ValorConsumo/crear.php',
                data: {
                    nombrevalor:nombrevalor,
                    valorconsumo:valorconsumo
                },
                method: 'post',
                success:function(data) {
                    toastr.info("El Valor Consumo: " + $("#nombrevalor").val() + '--' + $("#valorconsumo").val() +" se registro con exito.", "Valor Consumo");
                    $('#contenedor-nuevo-valor').slideUp('slow', function(){
                        $("#nombrevalor").val('');
                        listadoValorConsumo();
                    });

                }
            });

        });

        //btn que genera la aleta de eliminacion de tipo de movimientos
        $(document).on('click','.eliminar-valor', function() {

            $("#Id_Valor_Consumo").val($(this).attr('Id_Valor_Consumo'));
            toastr.error("Seguro que desea eliminar valor consumo<br><button type='button' class='btn clear confirmar-eliminar-valor'>Confirmar eliminar</button> ", "Valor");

        });

        //btn que elimina tipo de movimientos
        $(document).on('click', '.confirmar-eliminar-valor',function() {

            var Id_Valor_Consumo    = $("#Id_Valor_Consumo").val();

            $.ajax({
                url: 'controllers/ValorConsumo/eliminar.php',
                data: {
                    Id_Valor_Consumo:Id_Valor_Consumo,
                },
                method: 'post',
                success:function(data){
                    listadoValorConsumo();
                }
            });

        });

//----------------------fin modulo Valor Consumo-------------------//
//inicio propiedades del modulo  facturar pagos agua
/*-----------------------------------------------------------------------------*/

 //click en el panel de facturas pagos de agua
        $(document).on('click', '#factura-agua-panel',function() {

            $("#proceso_activo").text(' - Facturar Pagos Agua');
             $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#listados-global").html('');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaServiProducto").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');

         //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
             $("#buscador-global-predios-corte-agua").slideUp('slow');

             //ocultar formularios para pagos de agua
            $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
              $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');
           // cargarListadoDePrediosDeUsuarios();
           cargarVistaCrearFacturasAgua();

        });

        //listado de predios de los usuarios
      //cargar el formulario para el registro de nuevas facturas
        function cargarVistaCrearFacturasAgua() {

            $.ajax({
                url: 'views/facturarpagoagua/crearfacturasdeagua.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $('#crear-facturas-agua').html(data);
                    $('#crear-facturas-agua').slideDown('slow');
                }
            });

        };

          // btn listar predios

     $(document).on('click', '#crearfacturas',function() {
            var mespagoagua    = $("#mespagoagua").val();
            var anio           =  $("#anio").val();


            $.ajax({
                url: 'controllers/facturarpagosagua/listarpredios.php',
                data: {
                  mespagoagua:mespagoagua,
                   anio:anio,


                },
                method: 'post',
                success:function(data){
                   $("#listar-predios-usuarios").html(data);
                   $('#listar-predios-usuarios').slideDown('slow');


                }
            });

        });
           // mostr

//final propiedades del modulo facturar pagos agua
/*-----------------------------------------------------------------------------*/

//inicio propiedades del modulo agregar pago a las facturas de agua creadas
/*-----------------------------------------------------------------------------*/
  $(document).on('click', '#agregar-pagos-panel',function() {

            $("#proceso_activo").text(' - Agregar Valor a facturas');
             $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#listados-global").html('');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaServiProducto").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');

            //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
             $("#buscador-global-predios-corte-agua").slideUp('slow');

             //ocultar formularios para pagos de agua
            $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
              $('#facturaseleccionada-usuario').slideUp('slow');
               $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');

            cargarFormularioBuscarFacturas();

            MontarSelectValorConsumo();


        });

        //cargar formulario para buscar facturas creadas
        function cargarFormularioBuscarFacturas() {

            $.ajax({
                url: 'views/facturarpagoagua/buscarfacturasusuarios.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#listados-global").html(data);
                }
            });
        };

      // btn consultar facturas

     $(document).on('click', '#ListarFacturas',function() {

            var mespagoagua    = $("#mespagoagua").val();
             var valorpago    = $("#SelectValorConsumo").val();
               var anio    = $("#anio").val();


            $.ajax({
                url: 'controllers/facturarpagosagua/listarfacturascreadas.php',
                data: {
                   mespagoagua:mespagoagua,
                   valorpago:valorpago,
                   anio:anio,


                },
                method: 'post',
                success:function(data){

                   $("#select-facturas-agua").html(data);
                   $('#select-facturas-agua').slideDown('slow');
                   $('#facturas').slideDown('slow');


                }
            });

        });
           // mostrar listado de valores de consumo en el select
         function MontarSelectValorConsumo() {

            $.ajax({
                url: 'controllers/facturarpagosagua/selectvalorconsumo.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#SelectValorConsumo").html(data);

                }
            });
        };

//fin propiedades del modulo agregar pago a las facturas de agua creadas
/*-----------------------------------------------------------------------------*/

//inicio propiedades del modulo pagar facturas
/*-----------------------------------------------------------------------------*/
  //click en el paner de productos y servicios
        $(document).on('click', '#pagar-facturas-panel',function() {

            $("#proceso_activo").text(' - Pagar Facturas de agua');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#listados-global").html('');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaServiProducto").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');

             //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
             $("#buscador-global-predios-corte-agua").slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');

            $('#select-facturas-agua').slideUp('slow');
            $("#listados-global").html('');

             //ocultar formularios para pagos de agua
            $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
              $('#facturaseleccionada-usuario').slideUp('slow');
               $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
            $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');
            cargarFormularioBuscarUsuario();

        });
         //cargar el formulario para el registro de nuevas facturas
        function cargarFormularioBuscarUsuario() {

            $.ajax({
                url: 'views/facturarpagoagua/pagofactura.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $('#facturaAgua-pagar').html(data);
                    $('#contenedor-pago-factura-agua').slideDown('slow');
                }
            });

        };

             //buscador deusuarios para el pago de factura de agua
        $(document).on('keyup','#usuario-busqueda-factura', function() {

            if($("#usuario-busqueda-factura").val() == '') {
                $("#resultado-busqueda-factura").slideUp('slow', function() {
                    $("#pagar_facturaServiPreoducto").slideUp('slow');
                     $("#facturaseleccionada-usuario").slideUp('slow');
                });
            } else {

              if($(this).val().length >= 3) {

                  var documento = $("#usuario-busqueda-factura").val();

                  $.ajax({
                      url: 'controllers/facturarpagosagua/getUsuarioPagoFactura.php',
                      data: {
                        documento:documento
                      },
                      method: 'post',
                      success: function(data) {
                        $("#resultado-busqueda-factura").slideDown('slow', function(){
                            $("#resultado-busqueda-factura").html(data);
                        });
                        if($("#nombre_usuario_busquedaServiProducto").val() != documento) {
                             $("#pagar_facturaServiPreoducto").slideDown('slow');
                             $("#facturaseleccionada-usuario").slideUp('slow');
                        } else {
                            $("#pagar_facturaServiPreoducto").slideDown('slow');

                        }
                      }
                  });

              }
            }

        });

          //btn que genera la aleta de eliminacion
        $(document).on('click','.verfactura-predio', function() {

            $("#_Id_Predio_Usuario").val($(this).attr('Id_Predio_Usuario'));
             $("#_Id_Usuario").val($(this).attr('Id_Usuario'));
               $("#_Nombre_Predio").val($(this).attr('Nombre_Predio'));
                 $("#_Nombre_Tipo_Predio").val($(this).attr('Nombre_Tipo_Predio'));
                   $("#_cantidadfaturas").val($(this).attr('cantidadfaturas'));
            toastr.error("Ver factura de este predio<br><button type='button' class='btn clear confirmar-ver-factura'>Ver Factura</button> ", "Predios");

        });

         //btn que deja ver detalle de la factura seleccionada
        $(document).on('click', '.confirmar-ver-factura',function() {

            var Id_Predio_Usuario    = $("#_Id_Predio_Usuario").val();
            var Id_Usuario = $("#_Id_Usuario").val();
             var Nombre_Predio    = $("#_Nombre_Predio").val();
            var Nombre_Tipo_Predio = $("#_Nombre_Tipo_Predio").val();
            var cantidadfaturas = $("#_cantidadfaturas").val();

            $.ajax({
                url: 'controllers/facturarpagosagua/detallefacturaseleccionada.php',
                data: {
                    Id_Predio_Usuario:Id_Predio_Usuario,
                    Id_Usuario:Id_Usuario,
                    Nombre_Tipo_Predio:Nombre_Tipo_Predio,
                    Nombre_Predio:Nombre_Predio,
                    cantidadfaturas:cantidadfaturas

                },
                method: 'post',
                success:function(data){
                   $("#facturaseleccionada-usuario").html(data);
                   $('#facturaseleccionada-usuario').slideDown('slow');

                }
            });
        });
        //Fin propiedades del modulo pagar facturas
/*-----------------------------------------------------------------------------*/
 //Inicio propiedades del modulo de usuarios que deben mas de 3 facturas
/*-----------------------------------------------------------------------------*/
 $(document).on('click', '#consultar-facturasusuarios-panel',function() {

            $("#proceso_activo").text(' - Pagar Facturas de agua');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#listados-global").html('');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaServiProducto").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');

             //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
             $("#buscador-global-predios-corte-agua").slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');

            $('#select-facturas-agua').slideUp('slow');
            $("#listados-global").html('');

             //ocultar formularios para pagos de agua
            $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');

             $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');
              cargarFormularioBuscarUsuariosConFacturas();
        });
               //cargar el formulario para el registro de nuevas facturas
        function cargarFormularioBuscarUsuariosConFacturas() {

            $.ajax({
                url: 'views/facturarpagoagua/buscarusuariosconfacturasatrasadas.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $('#usuario-con-mas-tres-facturas').html(data);
                    $('#usuario-con-mas-tres-facturas').slideDown('slow');
                }
            });

        };

          // btn consultar facturas

     $(document).on('click', '#ListarFacturasUsuarios',function() {

            var valorconsulta    = $("#valorconsulta").val();


            $.ajax({
                url: 'controllers/facturarpagosagua/consultarfacturasatrasadas.php',
                data: {
                   valorconsulta:valorconsulta,

                },
                method: 'post',
                success:function(data){

                   $("#listado-usuario-con-mas-tres-facturas").html(data);
                   $('#listado-usuario-con-mas-tres-facturas').slideDown('slow');

                }
            });

        });


    //Fin propiedades del modulo de usuarios que deben mas de 3 facturas
/*-----------------------------------------------------------------------------*/



//Inicio propiedades del modulo conulta  de predios con corte de agua
/*-----------------------------------------------------------------------------*/
 $(document).on('click', '#consultar-predio-corteagua-agua-panel',function() {

            $("#proceso_activo").text(' - Predios con corte de agua');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#listados-global").html('');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaServiProducto").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
            $('#facturasEgresov2-agregar').slideUp('slow');

             //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');

            $('#select-facturas-agua').slideUp('slow');
            $("#listados-global").html('');

             //ocultar formularios para pagos de agua
            $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');

             $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');
              cargarListadoPrediosConCorteAgua();
        });
                 //carga el listado de predios con corte de agua
        function cargarListadoPrediosConCorteAgua() {

            $.ajax({
                url: 'controllers/facturarpagosagua/prediosconcorteagua.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#listados-global").html(data);

                     $("#buscador-global-predios-corte-agua").css('display','block');
                    $("#buscador-global-predios").css('display','none');
                    $("#buscador-global-usuarios").css('display','none');
                    $("#buscador-global-tipoPredios").css('display','none');
                    $("#buscador-global-tipoMovimientos").css('display','none');
                    $("#buscador-global-tipoPagos").css('display','none');
                    $("#buscador-global-reuniones").css('display','none');
                    $("#buscador-global-productosServicio").css('display','none');
                    $(".buscar-predios-corte-agua").val('');
                }
            });

        };
         //buscador
        $(document).on('keyup','.buscar-predios-corte-agua', function() {

            if($(".buscar-predios-corte-agua").val() == '') {
                cargarListadoPrediosConCorteAgua();
            } else {

            if($(this).val().length >= 3) {

                var nombre = $(".buscar-predios-corte-agua").val();

                $.ajax({
                    url: 'controllers/facturarpagosagua/getPrediosconcorteagua.php',
                    data: {
                        nombre:nombre
                    },
                    method: 'post',
                    success: function(data) {
                        $("#listados-global").html(data);
                    }
                });
            }
            }

        });


//Inicio propiedades del modulo conulta  de predios con corte de agua
/*-----------------------------------------------------------------------------*/

  //Inicio propiedades del modulo de imprimir facturas usuarios
/*-----------------------------------------------------------------------------*/
 $(document).on('click', '#imprimir-factura-agua-panel',function() {

            $("#proceso_activo").text(' - Imprimir Facturas');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#listados-global").html('');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaServiProducto").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');
             $('#facturasEgresov2-agregar').slideUp('slow');

             //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
              $("#buscador-global-predios-corte-agua").slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');


            $('#select-facturas-agua').slideUp('slow');
            $("#listados-global").html('');

             //ocultar formularios para pagos de agua
            $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
              $('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
             $('#usuario-con-mas-tres-facturas').slideUp('slow');
             $('#boton-consultar-facturas-imprimir').slideUp('slow');
            $('#listado-imprimir-facturas').slideUp('slow');


              listarFacturasImprimir();
        });
               //cargar el formulario para el registro de nuevas facturas
        function listarFacturasImprimir() {

            $.ajax({
                url: 'views/facturarpagoagua/imprimirfacturas.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $('#boton-consultar-facturas-imprimir').html(data);
                    $('#boton-consultar-facturas-imprimir').slideDown('slow');
                }
            });

        };

          // btn consultar facturas

     $(document).on('click', '#ListarFacturasImprimir',function() {

            $.ajax({
                url: 'controllers/facturarpagosagua/consultareimprimirfacturasagua.php',
                data: {


                },
                method: 'post',
                success:function(data){

                   $("#listado-imprimir-facturas").html(data);
                   $('#listado-imprimir-facturas').slideDown('slow');

                }
            });

        });


    //Fin propiedades del modulo de usuarios que deben mas de 3 facturas
/*-----------------------------------------------------------------------------*/


    //Suma de valor de por hectarea de predio
/*-----------------------------------------------------------------------------*/
 function sumar() {
var n1 = parseInt(document.MyForm.numero1.value);
var n2 = parseInt(document.MyForm.numero2.value);
document.MyForm.resultado.value=n1 * n2;
}







 // inicio listar y actualzar multas
/*-----------------------------------------------------------------------------*/



$(document).on('click', '#crudmultas-panel',function() {

            $("#proceso_activo").text(' - Multas');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-productosServicios').slideUp('slow');
            $('#contenedor-nuevo-predio').slideUp('slow');
            $('#contenedor-nuevo-tipoPredio').slideUp('slow');
            $('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
            $('#contenedor-nuevo-tipoPago').slideUp('slow');
            $('#contenedor-nuevo-usuario').slideUp('slow');
            $('#contenedor-nuevo-reunion').slideUp('slow');
            $('#contenedor-completar-facturaServiProducto').slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');
            $("#listados-global").html('');
            $("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
            $("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
            $("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
            $("#listados-multados").html('');
            $("#repotes").html('');
            $("#reportesdetallado").html('');
            $('#reunion-select').html('');
            $(".contenido_pagina_principal").slideUp('slow');
            $("#contenedor-nueva-multa").slideUp('slow');
            $("#contenedor-nueva-facturaServiProducto").slideUp('slow');
            $("#contenedor-nueva-facturaEgreso").slideUp('slow');

             //ocultar buscadores
            $("#buscador-global-usuarios").slideUp('slow');
            $("#buscador-global-tipoPredios").slideUp('slow');
            $("#buscador-global-predios").slideUp('slow');
            $("#buscador-global-tipoMovimientos").slideUp('slow');
            $("#buscador-global-tipoPagos").slideUp('slow');
            $("#buscador-global-reuniones").slideUp('slow');
            $("#buscador-global-productosServicio").slideUp('slow');
            $('#obtenerTotalFactura').slideUp('slow');

            $('#select-facturas-agua').slideUp('slow');
            $("#listados-global").html('');

             //ocultar formularios para pagos de agua
            $('#select-facturas-agua').slideUp('slow');
            $('#contenedor-pago-factura-agua').slideUp('slow');
            $('#facturaseleccionada-usuario').slideUp('slow');
            $('#crear-facturas-agua').slideUp('slow');
            $('#listar-predios-usuarios').slideUp('slow');
             $('#facturasEgresov2-agregar').slideUp('slow');

              crudtipomultas();
              cargarFormulariotipomultas();
        });
               //cargar el formulario para el registro de nuevas facturas
        function crudtipomultas() {

            $.ajax({
                url: 'controllers/multas/crudmultas.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#listados-global").html(data);
                }
            });
        };





          //cargar el formulario de nuevo tipo de multa
        function cargarFormulariotipomultas() {

            $.ajax({
                url: 'views/multas/actualizar.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#tipomulta-actualizar").html(data);
                }
            });

        };



          //captuara los tipo de multa para actualizar
        $(document).on('click', '.actualizar-tipomulta', function() {

            $("#Id_Tipo_Multa").val($(this).attr('Id_Tipo_Multa'));
            $("#Nombre_Multa").val($(this).attr('Nombre_Multa'));
            $("#Valor_Tipo_Multa").val($(this).attr('Valor_Tipo_Multa'));

          $('#contenedor-nuevo-tipomultas').slideDown('slow', function() {


        });

        });


        //cancelar ACTUALIZACION DE TIPO MULTAS
        $(document).on('click', '#cancelartipomulta', function() {

            $('#contenedor-nuevo-tipomultas').slideUp('slow');

           });





 // boton de actualizar usuarios

     $(document).on('click', '#actualizarmultas',function() {

            var Id_Tipo_Multa         = $("#Id_Tipo_Multa").val();
            var Nombre_Multa           = $("#Nombre_Multa").val();
            var Valor_Tipo_Multa            = $("#Valor_Tipo_Multa").val();

            $.ajax({
                url: 'controllers/multas/actualizar.php',
                data: {
                   Id_Tipo_Multa:Id_Tipo_Multa,
                   Nombre_Multa:Nombre_Multa,
                   Valor_Tipo_Multa:Valor_Tipo_Multa
                },
                method: 'post',
                success:function(data){
 									toastr.info("tipo de multa actualizado:)"," multa");
                        $('#contenedor-nuevo-tipomultas').slideUp('slow');
                        crudtipomultas();

                }
            });

        });


/*inicio modulo de facturas de egreso*/

$(document).on('click', '#crear-facturaEgreso-panelUP',function() {

		$("#proceso_activo").text('Agregar factura egreso');
		$('#contenedor-nuevo-productosServicios').slideUp('slow');
		$('#contenedor-nuevo-productosServicios').slideUp('slow');
		$('#contenedor-nuevo-predio').slideUp('slow');
		$('#contenedor-nuevo-tipoPredio').slideUp('slow');
		$('#contenedor-nuevo-tipoMovimiento').slideUp('slow');
		$('#contenedor-nuevo-tipoPago').slideUp('slow');
		$('#contenedor-nuevo-usuario').slideUp('slow');
		$('#contenedor-nuevo-reunion').slideUp('slow');
		$('#contenedor-completar-facturaServiProducto').slideUp('slow');
		$('#obtenerTotalFactura').slideUp('slow');
		$("#listados-global").html('');
		$("#resultado-busqueda-facturaCreditoServiProductoDeUsuario").slideUp('slow');
		$("#resultado-busqueda-facturaContadoServiProductoDeUsuario").slideUp('slow');
		$("#contenedor-gestionar-facturaServiProductoDeUsuario").slideUp('slow');
		$("#listados-multados").html('');
		$("#repotes").html('');
		$("#reportesdetallado").html('');
		$('#reunion-select').html('');
		$(".contenido_pagina_principal").slideUp('slow');
		$("#contenedor-nueva-multa").slideUp('slow');
		$("#contenedor-nueva-facturaServiProducto").slideUp('slow');
		$("#contenedor-nueva-facturaEgreso").slideUp('slow');
		$('#facturasEgresov2-agregar').slideUp('slow');

		//ocultar buscadores
		$("#buscador-global-usuarios").slideUp('slow');
		$("#buscador-global-tipoPredios").slideUp('slow');
		$("#buscador-global-predios").slideUp('slow');
		$("#buscador-global-tipoMovimientos").slideUp('slow');
		$("#buscador-global-tipoPagos").slideUp('slow');
		$("#buscador-global-reuniones").slideUp('slow');
		$("#buscador-global-productosServicio").slideUp('slow');
		 $("#buscador-global-predios-corte-agua").slideUp('slow');

		 //ocultar formularios para pagos de agua
		$('#select-facturas-agua').slideUp('slow');
		$('#contenedor-pago-factura-agua').slideUp('slow');
			$('#facturaseleccionada-usuario').slideUp('slow');
			 $('#crear-facturas-agua').slideUp('slow');
		$('#listar-predios-usuarios').slideUp('slow');
		$('#listado-usuario-con-mas-tres-facturas').slideUp('slow');
		 $('#usuario-con-mas-tres-facturas').slideUp('slow');
		 $('#boton-consultar-facturas-imprimir').slideUp('slow');
		$('#listado-imprimir-facturas').slideUp('slow');

		cargarFormularioAgregarFacturasTipoEgreso();

});

$(document).on('click','#iniciarProceso',function() {
	//creando factura egreso
	$('#contenedor').slideDown('slow');
	$('#iniciarProceso').slideUp('slow');
	setTimeout("crear()", 1000);
});

function crear() {

	var fechaActual = '2016-02-16';
	var movimeinto  = 20;

	$.ajax({
			url: 'controllers/crearFacturaEgresoUp/crearFacturaEgresoUp.php',
			data: {
				movimeinto:movimeinto,
				fechaActual:fechaActual,
			},
			method: 'post',
			success:function(data) {
				console.log('factura creada');
				setTimeout("procedimientoFacuracionServiProductos()", 1000);
				setTimeout("cargarListadoEgresos()", 800);
			}
	});
};

//metodo que busca la ultima factura creada
function procedimientoFacuracionServiProductos() {

	$.ajax({
			url: 'controllers/crearFacturaServiProducto/buscarFacturaCreada.php',
			data: null,
			method: 'post',
			success:function(data) {
					$('#ultimaFactEgresoCreada').val(data);
			}
	});

};

function cargarListadoEgresos() {

	var Id_Factura = $('#ultimaFactEgresoCreada').val();

	$.ajax({
			url: 'controllers/crearFacturaEgresoUp/listadoEgresoUp.php',
			data: {
					Id_Factura:Id_Factura,
			},
			method: 'post',
			success:function(data) {
					$("#contenido_egresoUp").html(data);
					setTimeout("cargarTotalEgreso()", 800);
			}
	});

};

function cargarTotalEgreso() {

		var Id_Factura = $('#ultimaFactEgresoCreada').val();

		$.ajax({
				url: 'controllers/crearFacturaEgresoUp/calcularTotalEgreso.php',
				data: {
						Id_Factura:Id_Factura,
						},
				method: 'post',
				success: function(data) {
						$('#contenido_egresoUpTotal').html(data);
						$('#contenido_egresoUpTotal').slideDown('slow');
				}
		});

};

function  cargarFormularioAgregarFacturasTipoEgreso(){

		 $.ajax({
				url: 'views/crearFacturaEgresoUp/crear.php',
				data: null,
				method: 'post',
				success:function(data) {
						$("#facturasEgresov2-agregar").html(data);
						$('#facturasEgresov2-agregar').slideDown('slow');
				}
		});

};

function borrarCampos() {
	$("#cNombre").val('');
	$("#cValor").val('');
	$("#cCantidad").val('');
	$("#cDescripcion").val('');
};


$(document).on('click','#guardarDatos',function() {

	var cNombre 			= $("#cNombre").val();
	var cValor 				= $("#cValor").val();
	var cCantidad 		= $("#cCantidad").val();
	var cDescripcion  = $("#cDescripcion").val();
	var Id_Factura    = $('#ultimaFactEgresoCreada').val();

	$.ajax({
			url: 'controllers/crearFacturaEgresoUp/crear.php',
			data: {
				cNombre:cNombre,
				cValor:cValor,
				cCantidad:cCantidad,
				cDescripcion:cDescripcion,
				Id_Factura:Id_Factura,
			},
			method: 'post',
			success:function(data) {
					setTimeout("borrarCampos()", 1000);
					cargarListadoEgresos();
			}
	});

});

$(document).on('click', '#terminarProcesoEgresoUp', function() {

		var Id_Factura    = $('#ultimaFactEgresoCreada').val();
		var totalDineroEgreso    = $('#totalDineroEgreso').text();

			$.ajax({
					url:'controllers/crearFacturaEgresoUp/actualizarTotalFacturaEgreso.php',
					data:{
							Id_Factura:Id_Factura,
							totalDineroEgreso:totalDineroEgreso,
					},
					method: 'post',
					success:function(data) {
							$('#cargando').slideDown('slow');
							toastr.info('Se realizo el proceso exitosamente','PROCESO TERMINADO');
							setTimeout("terminarProceso()", 3000);
					}
			});

});

function terminarProceso() {
	$('#cargando').slideUp('slow');
	self.location='administracion.php';
};

/*fin modulo de facturas de egreso*/

</script>
</body>
</html>
