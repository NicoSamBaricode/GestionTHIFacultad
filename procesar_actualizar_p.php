<?php 
include("conexion.php");
session_start();
//error_reporting(0); activr cuando termines de depurar todo
$varsesion = $_SESSION['usuario'];
$id=$_POST["id_p"];
$nombre=$_POST["nombre_p"];
$identificador=$_POST["identificador"];
$finicio=$_POST["Finicio"];
$descripcion=$_POST["descripcion"];
$tema=$_POST["tema"];
$sector=$_POST["sector"];
$responsable=$_POST["responsable"];
$final=$_POST["ffinal"];
$obs=$_POST["obs"];
$estado=$_POST["estado"];


$actualizar_p= "UPDATE proyectos SET identificador='$identificador',nombre='$nombre',fecha_inicio='$finicio',tema='$tema',descripcion='$descripcion',sector='$sector',responsable='$responsable',fecha_realizado='$final',observaciones='$obs',estado='$estado' WHERE id_proyectos='$id'";

$resul_p= mysqli_query($conexion, $actualizar_p);



if($resul_p){
    echo"<script> alert('Se actualiaron los datos con exito'); window.location='/gestion/proyectos.php'</script> ";
   
}
else {
    echo"<script> alert('Fallo al actualizar datos'); window.history.go(-1); </script>";

}
?>