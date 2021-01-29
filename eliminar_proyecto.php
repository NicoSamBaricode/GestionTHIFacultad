<?php 
include("conexion.php");


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