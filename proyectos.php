<?php 
include("conexion.php");
session_start();
//error_reporting(0); activr cuando termines de depurar todo
$varsesion = $_SESSION['usuario'];


if($varsesion==null || $varsesion=''){
    echo"<script> alert('No tiene permiso para ingresar'); window.location='/gestion/index.php' </script>";
    die();
}

$consulta_proyecto= "SELECT id_proyectos,nombre,fecha_inicio,tema,sector,responsable,fecha_realizado,estado FROM proyectos";
$contador = "SELECT COUNT(*) total FROM proyectos";

$consulta_imagen="SELECT imagen FROM usuarios WHERE alias='$_SESSION[usuario]'";
$query_imagen=mysqli_query($conexion,$consulta_imagen);
$imagen=$query_imagen->fetch_array(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>


<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="far fa-clipboard"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>THI Gestión</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="panel.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Lista_Usuarios.php"><i class="fas fa-user"></i><span>Usuarios</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Proyectos.php"><i class="fas fa-table"></i><span>Proyectos</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="stock.php"><i class="fas fa-warehouse"></i><span>Recursos</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="cerrar_sesion.php"><i class="fas fa-user-circle"></i><span>Cerrar Sesión</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            
                            
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo $_SESSION['usuario'] ?></span><img class="border rounded-circle img-profile" src="<?php echo $imagen['imagen']?>"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a
                                            class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Registro de actividades</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="cerrar_sesion.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                    </div>
                    </li>
                    </ul>
            </div>
            </nav>
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Usuarios</h3>
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Nuevo Proyecto</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span></span></div>
                                    </div>
                                    <div class="col-auto"><a class="btn btn-primary" href="crear_proyecto.php"><i class="fas fa-folder-plus  text-gray-300"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-warning py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>Proyectos</span></div>
                                        
                                    </div>
                                    <div class="col-auto" style="color: darkgoldenrod;margin-right: 1rem; font-size: larger;">
                                    <?php 
                                    $result_cont = mysqli_query($conexion, $contador);
                                    $fila = mysqli_fetch_assoc($result_cont);
                                    echo "" . $fila['total'];
                                    ?>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-tasks fa-2x text-gray-300"></i></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div
                    class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Tabla general&nbsp;</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Mostrar&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm"><option value="10" selected="">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;</label></div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Buscar"></label></div>
                            </div>
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Fecha de Inicio</th>                                        
                                        <th>Tema</th> 
                                        <th>Sector</th>   
                                        <th>Responsable</th>  
                                        <th>Fecha de Fin</th> 
                                        <th>Estado</th> 
                                        <th>Detalles</th> 
                                        <th>Finalizar</th>                                  
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php $resultado=mysqli_query($conexion, $consulta_proyecto); 
                                        while($row=mysqli_fetch_assoc($resultado)){
                                        ?>
                                           <tr> 
                                            <script src="cartel.js"> </script>
                                            <td><?php echo $row["id_proyectos"] ?></td>
                                            <td><?php echo $row["nombre"] ?></td>
                                            <td><?php echo $row["fecha_inicio"] ?></td>
                                            <td><?php echo $row["tema"] ?></td>
                                            <td><?php echo $row["sector"] ?></td>
                                            <td><?php echo $row["responsable"] ?></td>
                                            <td><?php echo $row["fecha_realizado"] ?></td>
                                            <td><?php echo $row["estado"] ?></td>
                                            <td><a class="btn btn-secondary mx-auto btn-circle ml-1" onclick="return confirmBorrar()" role="button" href="detalle_proyecto.php?id=<?php echo $row["id_usuario"]; ?>"><i class="fas fa-file-alt text-white"></i></a></td>

                                            <td><a class="btn btn-success mx-auto btn-circle ml-1" role="button" href="finalizar.php?id=<?php echo $row["id_usuario"]; ?>"><i class="fas fa-clipboard-check"></i></a></td>

                                            <td><a class="btn btn-info mx-auto btn-circle ml-1" role="button" href="actualizar.php?id=<?php echo $row["id_usuario"]; ?>"><i class="fas fa-user-circle text-white"></i></a></td>
                                            <td><a class="btn btn-danger mx-auto btn-circle ml-1" onclick="return confirmBorrar()" role="button" href="eliminar.php?id=<?php echo $row["id_usuario"]; ?>"><i class="fas fa-trash text-white"></i></a></td>

                                           </tr>
                                            <?php } mysqli_free_result($resultado) ?>
                                   
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Fecha de Inicio</th>                                        
                                        <th>Tema</th> 
                                        <th>Sector</th>   
                                        <th>Responsable</th>  
                                        <th>Fecha de Fin</th> 
                                        <th>Estado</th> 
                                        <th>Detalles</th> 
                                        <th>Finalizar</th>                                  
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Mostrando 1 al 10 de 27</p>
                            </div>
                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Thi Programación</span></div>
            
            
        </div>
    </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>