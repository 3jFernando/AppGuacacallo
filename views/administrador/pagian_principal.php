<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>

<div class="contenido_pagina_principal row style:'display:none;';">
    
<!--mostrar la cantidad de usuarios registrados en el sistema-->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                         <i class="fa fa-group fa-5x"></i>                         
                    </div>
                    <div class="col-xs-9 text-right">
                    <div>USUARIOS!</div>
                    <div>
                        <br /><br />   
                        <m style="font-size:12px;">Usuarios:     <m id="cantidadUsuariosRegistrados"></m></m><br />
                        <m style="font-size:12px;">Desactivados: <m id="cantidadUsuariosDesactivadosRegistrados"></m></m>
                    </div>
                    </div>
                </div>
            </div>
            <a href="#">
            <div class="panel-footer">
                <span class="pull-left" id="informacion_Importarnte_Usuarios">Ver mas detalles</span>
                <span class="pull-right"><i class="glyphicon glyphicon-eye-open"></i></span>
                <div class="clearfix"></div>
                
            </div>
            </a>
        </div>
    </div>
<!--fin usuarios-->


<!--mostrar la candidad de facturas registradas en el sistema-->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                         <i id='verificacionFactVencidadDiaActual' 
                         class="fa fa-credit-card fa-5x"></i>
                         <img style="display:none; padding:0px; margin:0px;" id="imgCreditoVencido" 
                         src="public/img/creditoVencido.png" width="76px" height="90px" >
                    </div>
                    <div class="col-xs-9 text-right">
                    <div>FACTURAS!</div>
                    <div>
                        <br /><br />
                        <m style="font-size:12px;">Facturas: <m id="cantidadFacturasRegistradas"></m></m><br />
                        <m style="font-size:12px;">Deve: <m id="cantidadFacturasDeveRegistradas"></m></m>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#">
            <div class="panel-footer">
                <span class="pull-left" id="informacion_Importarnte_facturas">Ver mas detalles</span>
                <span class="pull-right"><i class="glyphicon glyphicon-eye-open"></i></span>
                <div class="clearfix"></div>
            </div>
            </a>
        </div>
    </div>


<!--fin facturas-->


<!--mostrar la candidad de multas registradas en el sistema-->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                         <i class="fa fa-tags fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div>MULTAS!</div>
                    <div>
                        <br /><br />
                        <m style="font-size:12px;">Multas: <m id="cantidadMultasRegistradas"></m></m><br />
                        <m style="font-size:12px;">Deve: <m id="cantidadMultasDeveRegistradas"></m></m>    
                    </div>
                    </div>
                </div>
            </div>
            <a href="#">
            <div class="panel-footer">
                <span class="pull-left" id="informacion_Importarnte_multas">Ver mas detalles</span>
                <span class="pull-right"><i class="glyphicon glyphicon-eye-open"></i></span>
                <div class="clearfix"></div>
            </div>
            </a>
        </div>
    </div>

   
<!--fin multas-->


<!--mostrar la candidad de dinero registrado en el sistema-->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                         <i class="fa fa-dollar fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div>DINERO!</div>
                    <div>                        
                        <br />
                        <m style="font-size:12px;">Dinero:    $<m id="cantidadDineroRegistrado"></m></m><br />                        
                        <m style="font-size:12px;">Deve Cred: $<m id="cantidadDineroDeveFactRegistrado"></m></m><br />
                        <m style="font-size:12px;">Deve Mult: $<m id="cantidadDineroDeveMultasRegistrado"></m></m>                                                
                    </div>
                    </div>
                </div>
            </div>
            <a href="#">
            <div class="panel-footer">
                <span class="pull-left" id="informacion_Importarnte_dinero">Ver mas detalles</span>
                <span class="pull-right"><i class="glyphicon glyphicon-eye-open"></i></span>
                <div class="clearfix"></div>
            </div>
            </a>
        </div>
    </div>

<!--fin dinero-->

</div>


