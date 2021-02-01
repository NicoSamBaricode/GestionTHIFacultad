<?php 
include("conexion.php");


$id_p=$_GET["idp"];



$eliminar= "DELETE FROM proyectos WHERE id_proyectos='$id_p'";

$resul_p= mysqli_query($conexion, $eliminar);



if($resul_p){
    echo"<script> alert('Se eliminaron los datos con exito'); window.location='/gestion/proyectos.php'</script> ";
   
}
else {
    echo"<script> alert('Fallo al eliminar datos'); window.history.go(-1); </script>";

}
?>