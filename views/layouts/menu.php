<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="administracion.php"><img src="public/img/logo.png" width="54px"></a>
        <a class="navbar-brand" href="administracion.php"><b>APP GUACACALLO</b></a>
    </div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">


<?php
  if (isset($_SESSION['usuario'])) {
    ?>

    <a href="perfil.php">
        <img class='img-perfil' id='img-perfil'
        title='Aceder al perfil <?php echo $_SESSION['usuario'];?>'
        src="public/img/perfil/<?php echo $_SESSION['nombre_foto'];?>">
    </a></img>

    <?php
    echo "<m id='usuarioActivo' title='Aceder al perfil de ".$_SESSION['usuario']."'><b style='color:white;'><i class='fa fa-user fa-fw'></i>".$_SESSION['usuario']."
    <i class='glyphicon glyphicon-envelope'></i> ".$_SESSION['usuario-c']."</b></m>";

  }
?>

    <style>
        .img-perfil {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            box-shadow: 0px 0px 3px #000;
        }

        .img-perfil:hover {
            opacity: 0.4;
            filter: alpha(opacity=40);
        }

        #usuarioActivo {
            cursor: pointer;
        }

    </style>

    <script type="text/javascript">
        $("#usuarioActivo").click(function() {
            self.location='perfil.php';
        });
    </script>

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="perfil.php">
            <?php

            if (isset($_SESSION['usuario'])) {
                ?>
            </i><i class="fa fa-user fa-fw"></i> Perfil
            <?php
                echo "".$_SESSION['usuario'];
            }


            ?>

            </a></li>
        <li class="divider"></li>
            <li><a href="#" id="cerrarSesion"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesión</a></li>
        </ul>
    </li>

</ul>
<p />
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">

<!--Buscardor-->
        <div id="buscador-global-usuarios">
            <input type="text" class="form-control buscar-usuarios"    placeholder="buscador global...">
        </div>
        <div id="buscador-global-tipoPredios">
            <input type="text" class="form-control buscar-tipoPredios" placeholder="buscador global...">
        </div>
        <div id="buscador-global-predios">
            <input type="text" class="form-control buscar-predios"     placeholder="buscador global...">
        </div>
         <div id="buscador-global-predios-corte-agua">
            <input type="text" class="form-control buscar-predios-corte-agua"     placeholder="buscador global...">
        </div>
        <div id="buscador-global-tipoMovimientos">
            <input type="text" class="form-control buscar-tipoMovimientos"     placeholder="buscador global...">
        </div>
        <div id="buscador-global-tipoPagos">
            <input type="text" class="form-control buscar-tipoPagos"     placeholder="buscador global...">
        </div>
        <div id="buscador-global-reuniones">
            <input type="text" class="form-control buscar-reuniones"     placeholder="buscador global...">
        </div>
        <div id="buscador-global-productosServicio">
            <input type="text" class="form-control buscar-productosServicios"     placeholder="buscador global...">
        </div>
<!--fin buscador-->

<ul class="nav" id="side-menu">

    <li>
        <a href="#" id="usuarios-panel">
        <i class="fa fa-group fa-fw"></i></i>Usuarios</a>
    </li>

    <li>
        <a href="#" id="tipos-Predios-panel">
        <i class="fa fa-retweet fa-fw"></i></i>Tipo Predios</a>
    </li>

    <li>
        <a href="#" id="predios-panel">
        <i class="fa fa-home fa-fw"></i></i>Predios de Usuario</a>
    </li>

    <div class="panel-default">

        <div class="panel-heading">
            <a href="#" >
            <i class="fa fa-gift fa-fw"></i></i><a data-toggle="collapse"
            data-parent="#accordion" href="#collapseOne"> Venta Servicios </a>
        </div>

        <div id="collapseOne" class="panel-collapse collapse out">
            <div class="panel-body">
                <li>
                    <a href="#" id="tipos-ProductosServicios-panel">
                    </i><i class="fa fa-leaf fa-fw"></i></i>Productos y Servicios</a>
                </li>
                <li>
                    <a href="#" id="crear-facturaServiProducto-panel">
                    </i><i class="fa fa-print fa-fw"></i></i>Crear Factura Ingreso</a>
                </li>
                <li>
                    <a href="#" id="crear-facturaEgreso-panel">
                    </i><i class="fa fa-print fa-fw"></i></i>Crear Factura Egreso</a>
                </li>
								<li>
                    <a href="#" id="crear-facturaEgreso-panelUP"> 
                    </i><i class="fa fa-print fa-fw"></i></i>Crear Factura EgresoUp</a>
                </li>
                <li>
                    <a href="#" id="gestionar-facturaServiProducto-panel">
                    </i><i class="fa fa-print fa-fw"></i></i>Gestionar Facturas</a>
                </li>

            </div>
        </div>

        <!--  fin menu asistencia -->
        <div class=" panel-default">
            <div class="panel-heading">
                <a href="#">
                <i class="fa fa-text-width fa-fw"></i></i>
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Asistencia</a>
            </div>

            <div id="collapseTwo" class="panel-collapse collapse out">

                <div class="panel-body">

                        <li>
                            <a href="#" id="reunion-panel">
                            </i><i class="fa fa-bell fa-fw"></i></i>Reuniones</a>
                        </li>
                        <li>
                            <a href="#" id="select-panel">
                            </i><i class="fa fa-bullhorn fa-fw"></i></i>Llamar asistencia</a>
                        </li>

                </div>
            </div>
        </div>
<!--  fin menu asistencia -->

<!--inicio menu multas -->
        <div class=" panel-default">
            <div class="panel-heading">
                <a href="#">
                <i class="fa fa-tags fa-fw"></i></i>
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> Multas</a>
            </div>

            <div id="collapseThree" class="panel-collapse collapse out">
                <div class="panel-body">
                     <li>
                        <a href="#" id="crudmultas-panel">
                        </i><i class="fa fa-bookmark fa-fw"></i></i> Multas</a>
                    </li>

                    <li>
                        <a href="#" id="moduloMultas-panel">
                        </i><i class="fa fa-bookmark fa-fw"></i></i>Pagar Multas</a>
                    </li>
                    <li>
                        <a href="#" id="multas-panel">
                        </i><i class="fa fa-briefcase fa-fw"></i></i>Multar usuarios</a>
                    </li>
                </div>
            </div>
        </div>
<!--  fin menu multas -->

<!--  menu Reportes de ingresos y egresos-->
        <div class=" panel-default">
            <div class="panel-heading">
                <a href="#">
                <i class="fa fa-print fa-fw"></i></i>
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"> Reportes.</a>
            </div>

            <div id="collapse3" class="panel-collapse collapse out">
                <div class="panel-body">
                    <li>
                        <a href="#" id="reportes-panel">
                        </i><i class="fa fa-search fa-fw"></i></i>Consultar reportes</a>
                    </li>
                     <li>
                        <a href="#" id="egresos-panel">
                        </i><i class="fa fa-search fa-fw"></i></i>Egresos</a>
                    </li>

                    <li>
                        <a href="#" id="matriculas-panel">
                        </i><i class="fa fa-search fa-fw"></i></i>Venta de matriculas de agua</a>
                    </li>
                </div>
            </div>
        </div>
<!--   fin menu Reportes de ingresos y egresos-->
<!--   inicio menu menu pagos de agua-->

   <div class=" panel-default">
            <div class="panel-heading">
                <a href="#">
                <i class="fa fa-dollar fa-fw "></i></i>
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse9"> Pagos Agua</a>
            </div>

            <div id="collapse9" class="panel-collapse collapse out">
                <div class="panel-body">
                <li>
                <a href="#" id="valor-panel">
                   <i class="fa fa-dollar fa-fw"></i></i>Valor Consumo</a>
                </li>
                     <li>
                            <a href="#" id="factura-agua-panel">
                             </i><i class="fa fa-print fa-fw"></i></i>
                            Facturar Pagos</a>
                        </li>
                         <li>
                            <a href="#" id="agregar-pagos-panel">
                            <span class="glyphicon glyphicon-plus"></span>
                            Agregar Pagos de Agua a los Usuarios</a>
                        </li>
                         <li>

                            <a href="#" id="pagar-facturas-panel">
                             </i><i class="fa fa-dollar fa-fw"></i></i>
                            Pagar y consultar facturas del los usuarios</a>
                        </li>
                          <li>

                            <a href="#" id="consultar-facturasusuarios-panel">
                             <span class="glyphicon glyphicon-search"></span>
                        Facturas Proximas a corte de agua</a>
                        </li>
                        <li>
                            <a href="#" id="consultar-predio-corteagua-agua-panel">
                               <span class="glyphicon glyphicon-search"></span>
                            Consultar predios con corte de agua</a>
                        </li>

                        <li>
                            <a href="#" id="imprimir-factura-agua-panel">
                             <i class="fa fa-print fa-fw"></i>
                            Inprimir Faturas</a>
                        </li>

                </div>
            </div>
        </div>

 <!--   fin menu menu pagos de agua-->

    </div>
</ul>

</div>
</div>

 <!--barra de cargado-->
    <center>
    <div id="cargando" style="display:none;">
        <img src="public/img/cargando.gif" width="30px;">
        <label style="color:white; font-size:12px;">Por favor espere...</label>
    </div>
    </center>

</nav>
