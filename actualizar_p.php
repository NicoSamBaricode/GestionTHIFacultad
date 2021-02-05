<?php 
include("conexion.php");
$id_p = $_GET["id"];
session_start();
//error_reporting(0); activr cuando termines de depurar todo
$varsesion = $_SESSION['usuario'];

$consulta_p= "SELECT * FROM proyectos WHERE id_proyectos=$id_p";

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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Lista_Usuarios.php"><i class="fas fa-user"></i><span>Usuarios</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Proyectos.html"><i class="fas fa-table"></i><span>Proyectos</span></a></li>
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
                                            class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="cerrar_sesion.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                    </div>
                    </li>
                    </ul>
            </div>
            </nav>
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Editar Proyecto</h3>
                
                <div
                    class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Información&nbsp;</p>
                    </div>
                   
                                    <form action="procesar_actualizar_p.php" method="POST">
                                        <?php $resultado_pro=mysqli_query($conexion, $consulta_p); 
                                        while($row=mysqli_fetch_assoc($resultado_pro)){
                                        ?>
                                           
                                          

                                           <div class="card-body">
                                            <script src="cartel.js"> </script>
                                            <div class="form-row">
                                                <div class="col">
                                                <div class="form-group"><label for="identificador"><strong>Nombre&nbsp;</strong></label><p><input class="form-control" name="nombre_p" type="text"  value="<?php echo $row["nombre"] ?>"></p></div>
                                                <input name="id_p" type="hidden"  value="<?php echo $row["id_proyectos"] ?>">
                                                </div>
                                                
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                <div class="form-group"><label for="identificador"><strong>Identificador&nbsp;</strong></label><input class="form-control" name="identificador" type="text"  value="<?php echo $row["identificador"] ?>"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="fecha"><strong>Fecha de Inicio</strong></label><input class="form-control" name="Finicio" type="date"  value="<?php echo $row["fecha_inicio"] ?>"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                
                                                <div class="col">
                                                    
                                                    <div class="form-group"><label for="descripcion"><strong>Descripcion</strong><br></label><input class="form-control" name="descripcion" type="text"  value="<?php echo $row["descripcion"] ?>"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                <div class="form-group"><label for="tema"><strong>Tema</strong></label><input name="tema" class="form-control" type="text"  value="<?php echo $row["tema"] ?>"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="sector"><strong>Sector</strong></label><input class="form-control" name="sector" type="text"  value="<?php echo $row["sector"] ?>"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="resp"><strong>Responsable</strong><br></label><input  class="form-control" name="responsable" type="text"  value="<?php echo $row["responsable"] ?>"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="frealizacion"><strong>Fecha finalizacion</strong><br></label><input class="form-control" name="ffinal" type="date"  value="<?php echo $row["fecha_realizado"] ?>"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="obs"><strong>Observaciones</strong><br></label><input name="obs" class="form-control" type="text"  value="<?php echo $row["observaciones"] ?>"></div>
                                                </div>
                                                <!-- <div class="col">
                                                    <div class="form-group"><label for="estado"><strong>Estado</strong><br></label><input name="estado" class="form-control" type="text"  value="<?php echo $row["estado"] ?>">
                                                                                                                                                                                                </div>
                                                </div> -->
                                                <div class="col">
                                                    <div class="form-group"><label for="estado"><strong>Estado</strong><br></label><select class="form-control"  name="estado" value="<?php echo $row["estado"] ?>" id="estado">
                                                                                                                                                                                                              <option selected><strong><?php echo $row["estado"] ?></strong></option>
                                                                                                                                                                                                               <option>Pendiente</option>
                                                                                                                                                                                                               <option>En proceso</option>
                                                                                                                                                                                                               <option>Realizado</option>
                                                                                                                                                                                                               <option>Cancelado</option>
                                                                                                                                                                                                               <option>Revisar</option></select>
                                                                                                                                                                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-row" style="margin-left:auto; right:0px; max-width:fit-content">
                                            
                                            </div>
                                            
                                            <div class="form-row" style="margin-left:auto; right:0px; max-width:fit-content">
                                            <div class="col" style="max-width:fit-content">
                                            </div>
                                            <input class="btn btn-primary mx-auto  ml-1 mr-1 "  role="button" type="submit" value="Actualizar">
                                            <div class="col" style="max-width:fit-content">
                                            <a class="btn btn-secondary mx-auto  ml-2"  role="button" href="proyectos.php">Volver</a>
                                            </div>
                                                
                                                <div class="col" style="max-width:fit-content">
                                                <a class="btn btn-danger mx-auto btn-circle ml-1" onclick="return confirmBorrar()" role="button" href="eliminar_proyectos.php?id=<?php echo $row["id_proyectos"]; ?>"><i class="fas fa-trash text-white"></i></a>
                                                </div>
                                            </div>
                                        
                                            
                                           
                                            <?php } mysqli_free_result($resultado_pro) ?>
                                   
                                     </form>
                                </tbody>
                                
                            </table>
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