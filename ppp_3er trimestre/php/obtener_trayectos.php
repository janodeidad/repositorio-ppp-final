<?php
// Conecta a la base de datos
require "conexion_mysqli.php";

// Consulta: obtener solo la columna "imagen" de la tabla trayectos, ordenados del más nuevo al más viejo
$sql = "SELECT imagen FROM trayectos ORDER BY id DESC";
$result = $mysqli->query($sql);

// Array donde se guardarán los resultados
$trayectos = [];

// Recorre cada fila que devuelve la consulta y la agrega al array
while ($row = $result->fetch_assoc()) {
    $trayectos[] = $row;
}

// Envía los datos como JSON para que los lea JavaScript
echo json_encode($trayectos);
?>