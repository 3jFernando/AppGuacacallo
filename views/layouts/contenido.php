<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['SESSION'])
)
header("location:inicio.html");
?>
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">


                    <!-- contenido -->
                    <br><div class="row">
                        <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li><a href="">Inicio</a></li>
                            <li><a href="">AppGuacacallo</a></li>
                            <li class="active">
                                <b id="proceso_activo">Sistema de Gestion y Facturación</b>
                            </li>
                        </ol>
                        </div>
                    </div>

                    <!--pagina principal del sistema-->
                    <div id="pagina_principal"></div>

                    <div class="tab-content">   
                    <!--multas-->
                     <div id="tipomulta-actualizar"></div>
                           
                        <!--Usuarios-->                      
                            <div id="usuarios-agregar"></div>
                            <div id="admin-agregar"></div>
                        <!--Tipo de predios-->                            
                            <div id="tipoPredios-agregar"></div>
                        <!--Predios-->       
                            <div id="predios-agregar"></div>
                        <!--Tipo de Movimientos-->  
                            <div id="tipoMovimientos-agregar"></div> 
                        <!--Tipo de Pagos-->  
                            <div id="tipoPagos-agregar"></div> 
                        <!--Reuniones-->  
                            <div id="reunion-agregar"></div>
                        <!--Productos Servicios--> 
                            <div id="valor-agregar"></div>                              
                            <div id="contenedor-nuevo-productosServicios"></div>
                        <!--Crear factura-->
                            <div id="facturaServiProducto-agregar"></div>
                        <!--crear facturas tipo egreso-->
                            <div id="facturasEgresov2-agregar"></div>
                        <!--Gestionar factura-->
                            <div id="facturaServiProducto-gestionar"></div>
                        <!--Completar factura ServiProductos-->
                            <div id="completarFacturaServiProducto-agregar"></div>
                        <!--Completar factura ServiProductos de Credito-->                        
                            <div id="completarFacturaServiProducto-credito"></div>
                            <div id="contenedor-CargarDatosfactServiProductosCredito"></div>                                                                                                        
                            <div id="cargarModuloMultas"></div>                        
                        <!--Listados-->
                            <div id="listados-global"></div>  
                        <!--Se utlizara para colocar todos los totales de las facturaciones-->
                            <div id="obtenerTotalFactura"></div>  
                            <div id="repotes"></div>           
                        <!--select reuniones-->  
                            <div id="reunion-select"></div>                           
                            <div id="reportesdetallado"></div>
                            <div id="listados-multados"></div>
                            <!--Reportes-->
                             <div id="listados-egresos"></div> 
                             <div id="listados-matriculas"></div> 

                            <!--FACTURAS DE AGUA-->

                           <!--Crear pagos de agua-->
                        <div id="crear-facturas-agua"></div>
                           <!--Crear pagos de agua-->
                        <div id="listar-predios-usuarios"></div>
                            <!--Facturar pagos agua-->
                        <div id="facturar-pagos-agua"></div>
                         <!--select reuniones-->  
                        <div id="select-facturas-agua"></div>   
                         <!--Pagare factura-->
                        <div id="facturaAgua-pagar"></div>
                         <!--Pagare factura-->
                        <div id="facturaseleccionada-usuario"></div>
                        <!--consultar usuarios con mas de 3 facturas-->
                        <div id="usuario-con-mas-tres-facturas"></div>
                        <!--listado usuarios con mas de 3 facturas-->
                         <div id="listado-usuario-con-mas-tres-facturas"></div>
                            <!--imprimir facturas usuarios-->
                       
                          <div id="boton-consultar-facturas-imprimir"></div>

                            <div id="listado-imprimir-facturas"></div>

                            

                       

                        </div>    
                    </div>        

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->