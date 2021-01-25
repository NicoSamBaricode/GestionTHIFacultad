<?php 
include("conexion.php")
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="Administrador.html"><i class="fas fa-tachometer-alt"></i><span>Administrador</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Jefe_division.html"><i class="fas fa-user"></i><span>Jefe de División</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Taller.html"><i class="fas fa-table"></i><span>Taller</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Agente.html"><i class="fas fa-warehouse"></i><span>Agente</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href=""><i class="fas fa-user-circle"></i><span>Cerrar Sesión</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                  <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Inicio</h3></div>  
            </nav>
            <div class="container-fluid">
                
                
                <div class="row">
                    
                <div class="col-auto col-lg-6 mx-auto mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary font-weight-bold m-0">Pagina de Prueba de Sistema de Gestión de THI</h6>
                        </div>
                        <div class="card-body">
                            <h4 class="large font-weight-bold">Presione alguno de los usuarios que se encuentran en la barra lateral</h4>
                            <div class="text-center">
                                <img src="assets/img/logo-cnea2.png" class="rounded" alt="...">
                              </div> 
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
</body>

</html>