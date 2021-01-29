<?php 
include("conexion.php");
session_start();
//error_reporting(0); activr cuando termines de depurar todo
$varsesion = $_SESSION['usuario'];


if($varsesion==null || $varsesion=''){
    echo"<script> alert('No tiene permiso para ingresar'); window.location='/gestion/index.php' </script>";
    die();
}
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$contr=$_POST["pasword"];
$alias=$_POST["alias"];
$mail=$_POST["mail"];
$rol=$_POST["rol"];

//aca para subir archivos
if($_FILES["imagen"]){
$nombre_base=basename($_FILES["imagen"]["name"]);//extrae el nombre del archivo
$nombre_final=date("d-m-a"). "-" .date("H-i-s")."-".$nombre_base;
 $ruta="assets/img/avatars".$nombre_final;
 $subirarchivo= move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
    if($subirarchivo){
       
       $insertar = "INSERT INTO usuarios(nombre,apellido,mail,alias,rol,pasword,imagen) VALUES ('$nombre','$apellido','$mail','$alias','$rol','$contr','$ruta')";
       $query= mysqli_query($conexion, $insertar);
    }
}
//fin subir archivos




if($query){
    echo"<script> alert('Se insertaron los datos con exito'); window.location='/gestion/Lista_Usuarios.php'</script> ";
}
else {
    echo"<script> alert('Fallo al insertar datos'); </script>";

}




?>