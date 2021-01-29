<?php 
session_start();
error_reporting(0); 
$varsesion = $_SESSION['usuario'];
if($varsesion==null || $varsesion=''){
    echo"<script> alert('No tiene permiso para ingresar'); </script>";
    die();
}
session_destroy();
header("location: index.php");
?>