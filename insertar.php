<?php 
include("conexion.php");

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$contr=$_POST["pasword"];
$alias=$_POST["alias"];
$mail=$_POST["mail"];
$rol=$_POST["rol"];

$insertar = "INSERT INTO usuarios(nombre,apellido,mail,alias,rol,pasword) VALUES ('$nombre','$apellido','$mail','$alias','$rol','$contr')";
$query= mysqli_query($conexion, $insertar);



if($query){
    echo"<script> alert('Se insertaron los datos con exito'); window.location='/gestion/Lista_Usuarios.php'</script> ";
}
else {
    echo"<script> alert('Fallo al insertar datos'); </script>";

}
?>