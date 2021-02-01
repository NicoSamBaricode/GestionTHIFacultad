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
$identificador=$_POST["identificador"];
$fecha=$_POST["fecha"];
$tema=$_POST["tema"];
$descrip=$_POST["descrip"];
$sector=$_POST["sector"];
$resp=$_POST["resp"];
$fecha_realizado=$_POST["frealizado"];
$obs=$_POST["obs"];
$estado=$_POST["estado"];


//aca para subir archivos
/*if($_FILES["archivo"]){
$nombre_base=basename($_FILES["archivo"]["name"]);//extrae el nombre del archivo
$nombre_final=date("d-m-a"). "-" .date("H-i-s")."-".$nombre_base;
 $ruta_p="assets/doc_proyectos".$nombre_final;
 $subirarchivo_p= move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta_p);
    if($subirarchivo_p){
       
       $insertar_p = "INSERT INTO proyectos(identificador,nombre,fecha,tema,descrip,sector,resp,frealizado,obs,estado,archivo) VALUES ('$identificador','$nombre','$fecha','$tema','$descrip','$sector','$resp','$fecha_realizado','$obs','$estado','$ruta_p')";
       $query_p= mysqli_query($conexion, $insertar_p);
    }
}
//fin subir archivos
*/

$insertar_p = "INSERT INTO proyectos(identificador,nombre,fecha_inicio,tema,descripcion,sector,responsable,fecha_realizado,observaciones,estado) VALUES ('$identificador','$nombre','$fecha','$tema','$descrip','$sector','$resp','$fecha_realizado','$obs','$estado')";
$query_p= mysqli_query($conexion, $insertar_p);

if($query_p){
    echo"<script> alert('Se insertaron los datos con exito'); window.location='/gestion/proyectos.php'</script> ";
}
else {
    echo"<script> alert('Fallo al insertar datos'); </script>";

}




?>