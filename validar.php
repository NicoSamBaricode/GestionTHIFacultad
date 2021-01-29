<?php 
include("conexion.php");
$usuario=$_POST['usuario'];
$mail=$_POST['mail'];
$pass=$_POST['password'];

session_start();
$_SESSION['usuario']= $usuario;




$consulta="SELECT * FROM usuarios WHERE alias='$usuario' and mail='$mail' and pasword='$pass'";

$validacion=mysqli_query($conexion,$consulta);


$filas=mysqli_num_rows($validacion);   //es como un if, si encuentra que en validacion hay resultado devuelve 1 o mas y sino 0

if($filas>0){
    header("location:panel.php");
    mysqli_free_result($resultado);
   
}
else{
    echo"<script> alert('Datos de ingreso no validos'); window.history.go(-1); </script>";
}




?>