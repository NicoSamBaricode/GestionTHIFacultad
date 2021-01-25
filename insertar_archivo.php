<?php 
include("conexion.php");


foreach ($_FILES["archivos"]["error"] as $clave => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $nombre_tmp = $_FILES["archivos"]["tmp_name"][$clave];
        // basename() puede evitar ataques de denegació del sistema de ficheros;
        // podría ser apropiado más validación/saneamiento del nombre de fichero
        $nombre = basename($_FILES["archivos"]["name"][$clave]);
        move_uploaded_file($nombre_tmp, "datos/$nombre");
    }
}




?>