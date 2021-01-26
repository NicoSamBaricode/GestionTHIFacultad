<?php 
include("conexion.php");


$id=$_POST["id_input"];
$nombre=$_POST["nombre_input"];
$apellido=$_POST["apellido_input"];
$contr=$_POST["pasword_input"];
$alias=$_POST["alias_input"];
$mail=$_POST["mail_input"];
$rol=$_POST["rol_input"];


$actualizar= "UPDATE usuarios SET nombre='$nombre',apellido='$apellido',pasword='$contr',alias='$alias',mail='$mail',rol='$rol' WHERE id_usuario='$id'";

$resul= mysqli_query($conexion, $actualizar);



if($resul){
    echo"<script> alert('Se actualiaron los datos con exito'); window.location='/gestion/Lista_Usuarios.php'</script> ";
   
}
else {
    echo"<script> alert('Fallo al actualizar datos'); window.history.go(-1); </script>";

}
?>