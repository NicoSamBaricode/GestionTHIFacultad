<?php
$link = mysqli_connect("localhost", "root", "", "canvasjs_db");

/* verificar la conexión */
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT * FROM datapoints ";
$result = mysqli_query($link, $query);

/* array numérico 
$row = mysqli_fetch_array($result, MYSQLI_NUM);
printf ("%s (%s)\n", $row[0], $row[1]);*/

/* array asociativo */
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
printf ("%s (%s)\n", $row["x"], $row["y"]);

/* array numérico y asociativo 
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
printf ("%s (%s)\n", $row[0], $row["CountryCode"]);*/

/* liberar la serie de resultados */
mysqli_free_result($result);

/* cerrar la conexión */
mysqli_close($link);
?>