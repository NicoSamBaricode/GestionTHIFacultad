<?php 
include("conexion.php");
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
<body>
    <div id="wrapper">
        <div class="container" >
            
            <form method="post" action="validar.php" style="padding-top: 20px;margin: auto; margin-top: 3rem; width: fit-content; border: solid;">
                <h2 class="row text-center " style="margin: auto;  width:fit-content  ">Gestion THI</h2>
                <div class="row text-center " style="margin: auto;  width:fit-content " >
                <img src="assets/img/logo-cnea2.png" style="max-width:10rem" alt="...">
                </div>
                <div class="form-group" style="margin: auto;  width:fit-content; padding: 1rem " >
                    <input class="form-control" type="text" name="usuario" placeholder="Usuario">
                </div>
                <div class="form-group" style="margin: auto;  width:fit-content; padding: 1rem " >
                    <input class="form-control" type="email" name="mail" placeholder="Email">
                </div>
                <div class="form-group"style="margin: auto;  width:fit-content " >
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group"style="margin: auto;  width:fit-content;padding: 1rem  " >
                    <button class="btn btn-primary " type="submit">Ingresar</button>
                </div>
            </form>
        </div>
        <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</div>
</body>
</html>