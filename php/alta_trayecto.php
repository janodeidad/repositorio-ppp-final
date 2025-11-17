<?php
session_start();

/* SI NO HAY LOGIN -> FUERA */
if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true){
    header("Location: admin_login.php");
    exit;
}

/* CONECTAR A MYSQL */
require "conexion_mysqli.php";

/* LIMPIAR */
function limpiar($txt) {
    return htmlspecialchars(trim($txt));
}

/* POST */
$nombre      = limpiar($_POST["nombre"]);
$descripcion = limpiar($_POST["descripcion"]);
$horario     = limpiar($_POST["horario"]);
$imagen      = limpiar($_POST["imagen"]); // nombre del archivo, ej: foto1.jpg

/* VALIDAR */
if (!$nombre || !$descripcion || !$horario || !$imagen) {
    die("<p style='color:red;'>Faltan datos obligatorios.</p>
         <a href='alta_trayecto.php'>Volver</a>");
}

/* INSERT */
$sql = "INSERT INTO trayectos (nombre, descripcion, horario, imagen)
        VALUES (?, ?, ?, ?)";

$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    die("Error preparando consulta: " . $mysqli->error);
}

$stmt->bind_param("ssss", $nombre, $descripcion, $horario, $imagen);

if ($stmt->execute()) {
    echo "<h2 style='color:green;'>Trayecto agregado correctamente ✔</h2>";
    echo "<p><a href='admin_panel.php'>Volver al panel</a></p>";
} else {
    echo "<p style='color:red;'>Error al insertar: " . $stmt->error . "</p>";
    echo "<p><a href='alta_trayecto.php'>Volver</a></p>";
}

$stmt->close();
$mysqli->close();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cargar nuevo trayecto</title>

    <style>
        /* FORMULARIO SIMPLE */
        body {
            background: #0a0a47;
            color: #fff;
            font-family: Arial, sans-serif;
            padding: 30px;
        }

        form {
            background: rgba(255, 255, 255, 0.15);
            padding: 20px;
            border-radius: 10px;
            width: 450px;
            margin: auto;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: none;
            border-radius: 6px;
        }

        button {
            background: #ffb300;
            color: black;
            border: none;
            padding: 12px;
            margin-top: 12px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 6px;
        }

        button:hover {
            opacity: 0.85;
        }

        a {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #fff;
        }
    </style>

</head>
<body>

<h2>Cargar nuevo trayecto</h2>

<form action="insertar_trayecto.php" method="POST">

    <!-- NOMBRE -->
    <label>Nombre del trayecto:</label>
    <input type="text" name="nombre" required>

    <!-- DESCRIPCION -->
    <label>Descripción:</label>
    <textarea name="descripcion" rows="4" required></textarea>

    <!-- HORARIO -->
    <label>Horario:</label>
    <input type="text" name="horario" required>

    <!-- IMAGEN -->
    <label>Nombre del archivo de imagen (ya debe estar en /img):</label>
    <input type="text" name="imagen" placeholder="ejemplo.jpg" required>

    <!-- BOTÓN -->
    <button type="submit">Cargar trayecto</button>

</form>

<a href="admin_panel.php">← Volver al panel</a>

</body>
</html>