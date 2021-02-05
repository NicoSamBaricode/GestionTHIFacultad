
<?php 
include("conexion.php");
session_start();
//error_reporting(0); activr cuando termines de depurar todo
$varsesion = $_SESSION['usuario'];


if($varsesion==null || $varsesion=''){
    echo"<script> alert('No tiene permiso para ingresar'); window.location='/gestion/index.php' </script>";
    die();
}

$consulta_rol="SELECT rol FROM usuarios WHERE alias='$_SESSION[usuario]'";
$rol_array=mysqli_query($conexion,$consulta_rol);
$rol = $rol_array->fetch_array(MYSQLI_ASSOC);//convierte el tipo de dato mysqli a array
//printf ("%s \n", $rol["rol"]);
$consulta_imagen="SELECT imagen FROM usuarios WHERE alias='$_SESSION[usuario]'";
$query_imagen=mysqli_query($conexion,$consulta_imagen);
$imagen=$query_imagen->fetch_array(MYSQLI_ASSOC);

//$consulta_proyecto= "SELECT identificador,nombre,fecha_inicio,tema,sector,responsable,fecha_realizado,estado FROM proyectos";
$contador_p = "SELECT COUNT(*) total FROM proyectos";
$contador_u = "SELECT COUNT(*) total FROM usuarios";

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
                <!-- arranca admin -->  
            <?php if ( 'admin' == $rol["rol"] ) {?>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="panel.php"><i class="fas fa-tachometer-alt"></i><span>Panel Principal</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Lista_Usuarios.php"><i class="fas fa-user"></i><span>Usuarios</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Proyectos.php"><i class="fas fa-table"></i><span>Proyectos</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Lista_Recursos.php"><i class="fas fa-warehouse"></i><span>Recursos</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="cerrar_sesion.php"><i class="fas fa-user-circle"></i><span>Cerrar Sesión</span></a></li>
                <?php }?> <!-- termina admin -->
                 <!-- arranca jefe -->  
            <?php if ( 'jefe' == $rol["rol"] ) {?>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="panel.php"><i class="fas fa-tachometer-alt"></i><span>Panel Principal</span></a></li>                    
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Proyectos.php"><i class="fas fa-table"></i><span>Proyectos</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Lista_Recursos.php"><i class="fas fa-warehouse"></i><span>Recursos</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="cerrar_sesion.php"><i class="fas fa-user-circle"></i><span>Cerrar Sesión</span></a></li>
                <?php }?> <!-- termina jefe -->

            <!-- arranca taller -->
            <?php if ( 'taller' == $rol["rol"] ) {?>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="panel.php"><i class="fas fa-tachometer-alt"></i><span>Panel Principal</span></a></li>                    
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Proyectos.php"><i class="fas fa-table"></i><span>Proyectos</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Lista_Recursos.php"><i class="fas fa-warehouse"></i><span>Recursos</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="cerrar_sesion.php"><i class="fas fa-user-circle"></i><span>Cerrar Sesión</span></a></li>
                <?php }?> <!-- termina taller -->

               <!-- arranca agente -->
                <?php if ( 'agente' == $rol["rol"] ) {?>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="panel.php"><i class="fas fa-tachometer-alt"></i><span>Panel Principal</span></a></li>                    
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Proyectos.php"><i class="fas fa-table"></i><span>Proyectos</span></a></li>                    
                    <li class="nav-item" role="presentation"><a class="nav-link" href="cerrar_sesion.php"><i class="fas fa-user-circle"></i><span>Cerrar Sesión</span></a></li>
                <?php }?> 
                <!-- termina agente -->
                    
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
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Editar perfil</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a
                                            class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Registro de actividades</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="cerrar_sesion.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Cerrar Sesion</a></div>
                    </div>
                    </li>
                    </ul>
            </div>
            </nav>
             
             <!-- arranca Admin -->  
            <?php if ( 'admin' == $rol["rol"] ) {?>      
                    
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Panel principal</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generar Reporte</a></div>
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-info py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Usuarios Registrados</span></div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php 
                                    $result_cont_u = mysqli_query($conexion, $contador_u);
                                    $fila = mysqli_fetch_assoc($result_cont_u);
                                    echo "" . $fila['total'];
                                    ?></span></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
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
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php 
                                    $result_cont = mysqli_query($conexion, $contador_p);
                                    $fila = mysqli_fetch_assoc($result_cont);
                                    echo "" . $fila['total'];
                                    ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-xl-4">
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="text-primary font-weight-bold m-0">Ocupación del personal</h6>
                                
                            </div>
                            <div class="card-body">
                                <div class="chart-area"><canvas data-bs-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Direct&quot;,&quot;Social&quot;,&quot;Referral&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;50&quot;,&quot;30&quot;,&quot;15&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{}}}"></canvas></div>
                                <div
                                    class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>&nbsp;Proyectos</span><span class="mr-2"><i class="fas fa-circle text-success"></i>&nbsp;Libres</span><span class="mr-2"><i class="fas fa-circle text-info"></i>&nbsp;Otros</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-auto col-lg-6 mx-auto mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary font-weight-bold m-0">Proyectos</h6>
                        </div>
                        <div class="card-body">
                        
                        <?php $contador_Cancel = "SELECT COUNT(*) total FROM proyectos WHERE estado= 'Cancelado' ";
                              $resultado=mysqli_query($conexion, $contador_Cancel); 
                                        while($row=mysqli_fetch_assoc($resultado)){
                                        ?>
                                           <?php  
                                           $porcentaje=($row['total']*100)/ $fila['total'];
                                           
                                           ?>
                                           <h4 class="small font-weight-bold">Cancelados<span class="float-right"><?php echo  $porcentaje."%"; ?></span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" aria-valuenow="<?php echo "" . $row['total']; ?>" aria-valuemin="0" aria-valuemax="100%" style="width:<?php echo  $porcentaje; ?>%"><span class="sr-only"></span></div>
                            </div> 


                                   <?php } mysqli_free_result($resultado); unset($porcentaje); ?>

                                            <!-- Termina cancelados -->
                                                    
                              <?php $contador_realizados = "SELECT COUNT(*) total FROM proyectos WHERE estado= 'Realizado' ";
                                        $resultado=mysqli_query($conexion, $contador_realizados); 
                                        while($row=mysqli_fetch_assoc($resultado)){
                                        ?>
                                           <?php  
                                           $porcentaje=($row['total']*100)/ $fila['total'];
                                           
                                           ?>
                                           <h4 class="small font-weight-bold">Realizados<span class="float-right"><?php echo  $porcentaje."%"; ?></span></h4>
                                            <div class="progress mb-4">
                                            <div class="progress-bar bg-success" aria-valuenow="<?php echo "" . $row['total']; ?>" aria-valuemin="0" aria-valuemax="100%" style="width:<?php echo  $porcentaje; ?>%"><span class="sr-only"></span></div>
                                            </div> 


                                   <?php } mysqli_free_result($resultado); unset($porcentaje); ?>
                                    <!-- Termina realizados -->
                                                    
                              <?php $contador_proceso = "SELECT COUNT(*) total FROM proyectos WHERE estado= 'En proceso' ";
                                        $resultado=mysqli_query($conexion, $contador_proceso); 
                                        while($row=mysqli_fetch_assoc($resultado)){
                                        ?>
                                           <?php  
                                           $porcentaje=($row['total']*100)/ $fila['total'];
                                           
                                           ?>
                                           <h4 class="small font-weight-bold">En proceso<span class="float-right"><?php echo  $porcentaje."%"; ?></span></h4>
                                            <div class="progress mb-4">
                                            <div class="progress-bar bg-primary" aria-valuenow="<?php echo "" . $row['total']; ?>" aria-valuemin="0" aria-valuemax="100%" style="width:<?php echo  $porcentaje; ?>%"><span class="sr-only"></span></div>
                                            </div> 


                                   <?php } mysqli_free_result($resultado); unset($porcentaje); ?>
                            <!-- Termina en proceso -->
                                   <?php $contador_pendiente = "SELECT COUNT(*) total FROM proyectos WHERE estado= 'Pendiente' ";
                                        $resultado=mysqli_query($conexion, $contador_pendiente); 
                                        while($row=mysqli_fetch_assoc($resultado)){
                                        ?>
                                           <?php  
                                           $porcentaje=($row['total']*100)/ $fila['total'];
                                           
                                           ?>
                                           <h4 class="small font-weight-bold">Pendientes<span class="float-right"><?php echo  $porcentaje."%"; ?></span></h4>
                                            <div class="progress mb-4">
                                            <div class="progress-bar bg-info" aria-valuenow="<?php echo "" . $row['total']; ?>" aria-valuemin="0" aria-valuemax="100%" style="width:<?php echo  $porcentaje; ?>%"><span class="sr-only"></span></div>
                                            </div> 


                                   <?php } mysqli_free_result($resultado); unset($porcentaje); ?>
                                   <!-- Termina en pendientes -->     
                                   <?php $contador_revisar = "SELECT COUNT(*) total FROM proyectos WHERE estado= 'Revisar' ";
                                        $resultado=mysqli_query($conexion, $contador_revisar); 
                                        while($row=mysqli_fetch_assoc($resultado)){
                                        ?>
                                           <?php  
                                           $porcentaje=($row['total']*100)/ $fila['total'];
                                           
                                           ?>
                                           <h4 class="small font-weight-bold">A revisar<span class="float-right"><?php echo  $porcentaje."%"; ?></span></h4>
                                            <div class="progress mb-4">
                                            <div class="progress-bar bg-warning" aria-valuenow="<?php echo "" . $row['total']; ?>" aria-valuemin="0" aria-valuemax="100%" style="width:<?php echo  $porcentaje; ?>%"><span class="sr-only"></span></div>
                                            </div> 


                                   <?php } mysqli_free_result($resultado); unset($porcentaje); ?>
                                   <!-- Termina a revisar -->     
                            </div> <!-- termina CARD -->

                    </div>
                    
                </div>
            </div>
            
            
            <?php }?>      <!-- termina Admin --> 

            <!-- arranca jefe -->  
            <?php if ( 'jefe' == $rol["rol"] ) {?>
            entraste a jefe de departamento
                <?php }?> <!-- termina jefe -->

            <!-- arranca taller -->
            <?php if ( 'taller' == $rol["rol"] ) {?>
            entraste a taller
                <?php }?> <!-- termina taller -->

               <!-- arranca agente -->
                <?php if ( 'agente' == $rol["rol"] ) {?>
            entraste a agente
                <?php }?> 
                <!-- termina agente -->
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