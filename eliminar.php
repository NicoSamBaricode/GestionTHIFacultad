<?php 
include("conexion.php");
session_start();
//error_reporting(0); activr cuando termines de depurar todo
$varsesion = $_SESSION['usuario'];

$id=$_GET["id"];



$eliminar= "DELETE FROM usuarios WHERE id_usuario='$id'";

$resul= mysqli_query($conexion, $eliminar);



if($resul){
    echo"<script> alert('Se eliminaron los datos con exito'); window.location='/gestion/Lista_Usuarios.php'</script> ";
   
}
else {
    echo"<script> alert('Fallo al eliminar datos'); window.history.go(-1); </script>";

}
?>