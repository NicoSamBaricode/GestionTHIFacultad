<?php 
include("conexion.php");
session_start();
//error_reporting(0); activr cuando termines de depurar todo
$varsesion = $_SESSION['usuario'];

$id_p=$_GET["id"];



$eliminar= "DELETE FROM proyectos WHERE id_proyectos='$id_p'";

$resul_p= mysqli_query($conexion, $eliminar);



if($resul_p){
    echo"<script> alert('Se eliminaron los datos con exito'); window.location='/gestion/proyectos.php'</script> ";
   
}
else {
    echo"<script> alert('Fallo al eliminar datos'); window.history.go(-1); </script>";

}
?>