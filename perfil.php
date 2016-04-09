<?php
    
    session_start();
    extract($_SESSION);
    if(!isset($_SESSION['SESSION']))
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
    <link href="public/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="public/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="public/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="public/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--alertas-->
    <link rel="stylesheet" type="text/css" href="public/js/toastr.css">

    <style type="text/css">



        .img-perfil {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            box-shadow: 0px 0px 12px #000;
        }

        .img-perfil:hover {
            opacity: 0.5;
            filter: alpha(opacity=40);
        }

        /* Estilo del área del input[file] */


        .drag-drop span.desc {
            color: #000;
        }
            

        input[type="file"] {
                height: 250px;
                width: 250px; 
                top: 20px;
                left: 0;
                right:0;
                position: absolute;
                opacity: 0;
                z-index: 3;
                border-radius: 50%;
                margin-left: auto;
                margin-right: auto;
                cursor: pointer;
        }

        #administrar {
                cursor: pointer;   
        }
       
    </style>


</head>
<form action="perfil.php" method="post" enctype="multipart/form-data">
<body style="color:#000; background-color:#FFF !important; padding:0px !important; margin:0px !important;">

<center>
    <br>
    <?php 

        if (isset($_SESSION['usuario'])) {
            echo "<div class='fondo-img-perfil' title='Fotografia del perfil de ".$_SESSION['usuario']."'><img class='img-perfil' id='img-perfil' src='public/img/perfil/".$_SESSION['nombre_foto']."'></img></div>";
        }
    ?>
    <div class="drag-drop" >
        <input  type="file" multiple="multiple" name="image" />
        <h6 class="desc" id="texto-foto-estado" style="font-size:10px;">
            pulse en la imagen para seleccionar una nueva foto de perfil. <br>
            Luego presione establecer foto seleccionada para completar la accion..
        </h6>
        <input type="submit" title="presione establecer foto seleccionada y completar la accion" class="btn btn-primary btn-xs"value="Establecer foto seleccionada" name="upload" id="upload"> 
    </div>
   

    <?php

    if(isset($_POST['upload'])) {

        $foto_nombre       = $_FILES['image']['name'];
        $foto_tipo         = $_FILES['image']['type'];
        $foto_tamanio      = $_FILES['image']['size'];
        $foto_nombre_temp  = $_FILES['image']['tmp_name'];

        if($foto_nombre == '') {
            ?>
            <script>
                toastr.warning('recuerde que deve seleccionar una imagen primero','configuracion del perfil');
            </script>
            <?php
        } else {

            if ($_FILES["image"]["type"]=="image/jpeg" || 
                $_FILES["image"]["type"]=="image/pjpeg" || 
                $_FILES["image"]["type"]=="image/gif" || 
                $_FILES["image"]["type"]=="image/bmp" || 
                $_FILES["image"]["type"]=="image/png") {
                            

                move_uploaded_file($foto_nombre_temp, 'public/img/perfil/'.$foto_nombre);

                if (isset($_SESSION['usuario'])) {

                    require_once('configs/conexion.php'); 
                    mysqli_query($conexion, "UPDATE foto_perfil SET Id_Administrador = '".$_SESSION['id']."',
                        Nombre_Foto = '$foto_nombre', Tamanio_Foto = '$foto_tamanio', Temp_Foto = '$foto_nombre_temp', 
                        Tipo_Foto = '$foto_tipo', Foto = '$foto_nombre_temp' WHERE Id_Foto = '".$_SESSION['id_foto']."'");
                }

                //actualizo la variables de la sesion 
                $_SESSION['nombre_foto'] = $foto_nombre;
                $Id_Administrador = $_SESSION['id'];

                ?>
                <script>
                    $('#img-perfil').attr('src','public/img/perfil/<?php echo $foto_nombre; ?>');
                    toastr.info('foto actualizada exitosamente','configuracion del perfil');                    
                </script>
                <?php
                $foto_nombre = '';

            
            } else {

                ?>
                <script>
                    toastr.warning('recuerde que deve seleccionar una imagen valida','configuracion del perfil');
                </script>
                <?php

            }

        }

    }

    ?>

    <b href="#" id='administrar' style="font-size:30px; color:#008;">
    <img src="public/img/logo.png" title="Acceder a la administracion">
    <m title="Acceder a la administracion">Administrar Sistema AppGuacacallo</b>
    <div> 
    <a id="bienvenido"><b>Bienvenido 
    
    <?php 

    if (isset($_SESSION['usuario'])) {
        echo " ".$_SESSION['usuario'];
        echo " ".$_SESSION['usuario-apellidos']."</a></b><br>";
        echo " Correo Electronico: ".$_SESSION['usuario-c']."<br>";
        echo " Identificacion: ".$_SESSION['usuario-id']."<br>";
        echo "<input id='id-admin' value='".$_SESSION['id']."' type='hidden'>";
        echo " Contraseña: 
        <b class='clave-clave'>&&&&&&</b> 
        <b class='clave-normal' style='display:none;'>".$_SESSION['usuario-i']."</b>
        <a class='ver-clave'>ver..</a>
        <a class='ver-ocultar' style='display:none;'>ocultar..</a><br>";        
        }

    ?>
</div>

<hr>

<center>
<div class="container">
    <div class="row">
        <div class="center-block">
            <div  id="contenedor-actualizar"></div>
        </div>
    </div>
</div>
</center>


<div style="padding-top:10px;">
<a id='btn-actualizar' class="btn btn-primary btn-xs">Actulizar datos</a> | <a id='salir' class="btn btn-warning btn-xs">Cerrar mi sesion</a>
<br>
<img src="public/img/social/facebook.png" width="30px">
<img src="public/img/social/google.png" width="30px">
<img src="public/img/social/twitter.png" width="30px">
</div>
</center>
<script type="text/javascript">
    
    msg();
    cargarContenedorActualizarAdministrador();

    $("#administrar").click(function() {  

        $("#administrar").text('Accediendo a la administracion, por favor espere......');
        setTimeout("administrar()", 300);      
        
    });

    function administrar() {
        self.location='administracion.php';
    };
    
    $(".ver-clave").click(function() {
        
        $(".ver-ocultar").slideDown('slow')
        $(".clave-normal").slideDown('slow');
        $(".ver-ocultar").slideDown('slow');                        
        $(".clave-clave").slideUp('slow');
        $(".ver-clave").slideUp('slow');
        
    });   

    $(".ver-ocultar").click(function() {
        
        
        $(".ver-ocultar").slideUp('slow');                        
        $(".clave-clave").slideDown('slow');
        $(".ver-clave").slideDown('slow');
        $(".ver-ocultar").slideUp('slow')
        $(".clave-normal").slideUp('slow');
        
    });   

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

        $("#salir").click(function() {
            toastr.warning("Seguro que desea cerrar su sesion<br><button type='button' class='btn clear confirmar'>Confirmar Cerrar</button> ", "CUENTA ADMINISTRATIVA");
        });

         //btn que elimina
        $(document).on('click', '.confirmar',function() {
            self.location='public/login/cerrar.php';        
        });

        $('#btn-actualizar').click(function() {
            $('#contenedor-actualizar-administrador').slideDown('slow', function() {
                $('#btn-actualizar').slideUp('slow');
                $('#salir').slideUp('slow');
            });
        });

        function cargarContenedorActualizarAdministrador() {
            $.ajax({
                url: 'views/administrador/crear.php',
                data: null,
                method: 'post',
                success:function(data) {
                    $("#contenedor-actualizar").html(data);
                }
            });
        };

        function limpiarCampos() {
            $("#nombre_administrador").val('');
            $("#apellido_administrador").val('');
            $("#correo_administrador").val('');
            $("#identificacion_administrador").val('');
        };

        $(document).on('click', '#cancelar_administrador', function() {
            $('#contenedor-actualizar-administrador').slideUp('slow', function(){
                $('#btn-actualizar').slideDown('slow');
                $('#salir').slideDown('slow');
            });
        });

        $(document).on('click', '#guardar_administrador', function() {

            var Id_Administrador                = $("#id-admin").val();
            var nombre_administrador            = $("#nombre_administrador").val();
            var apellido_administrador          = $("#apellido_administrador").val();
            var correo_administrador            = $("#correo_administrador").val();
            var identificacion_administrador    = $("#identificacion_administrador").val();

             $.ajax({
                url: 'controllers/administrador/actulizar.php',
                data: {
                    Id_Administrador:Id_Administrador,
                    nombre_administrador:nombre_administrador,
                    apellido_administrador:apellido_administrador,
                    correo_administrador:correo_administrador,
                    identificacion_administrador:identificacion_administrador,
                },
                method: 'post',
                success:function(data) {
                    toastr.info('Datos actualizados','Administacion AppGuacacallo');
                    $('#contenedor-actualizar-administrador').slideUp('slow', function() {
                        limpiarCampos();
                        $('#btn-actualizar').slideDown('slow');
                        $('#salir').slideDown('slow');
                    });
                }
            });
        });


</script>
 </form> 
</body>
</html>
