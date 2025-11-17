<?php
// insertar_registro.php
session_start();

// OPCIONAL: comentar temporalmente si quieres probar sin sesión
if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true){
    // Si estás probando desde el front sin estar logueado, comentalo:
    // header("Location: admin_login.php");
    // exit;
}

// Mostrar errores (solo en dev)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* CONEXIÓN A MYSQL */
require "conexion_mysqli.php"; // asegúrate que $mysqli queda disponible

if (!isset($mysqli) || !($mysqli instanceof mysqli)) {
    die("Error: la conexión a MySQL no está disponible. Revisa conexion_mysqli.php");
}

/* FUNCIÓN LIMPIAR */
function limpiar($txt) {
    return htmlspecialchars(trim((string)$txt), ENT_QUOTES, 'UTF-8');
}

/* SOLO PROCESAR SI HAY POST */
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "<p>Accede mediante POST (usa el formulario). <a href='javascript:history.back()'>Volver</a></p>";
    exit;
}

/* OBTENER CAMPOS (sin warnings) */
$nombre  = limpiar($_POST['nombre']  ?? '');
$correo  = limpiar($_POST['correo']  ?? '');
$telefono= limpiar($_POST['telefono'] ?? '');
$mensaje = limpiar($_POST['mensaje'] ?? '');

if ($nombre === '' || $correo === '' || $telefono === '' || $mensaje === '') {
    echo "<p style='color:red;'>Faltan datos obligatorios. Asegurate de enviar todos los campos.</p>";
    echo "<p><a href='../index.php'>Volver</a></p>";
    exit;
}

/* PREPARAR E INSERTAR */
$sql = "INSERT INTO registros (nombre, correo, telefono, mensaje) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    // Si falla la preparación, mostramos el error y listamos columnas de la tabla para diagnosticar
    $err = $mysqli->error;
    echo "<h3 style='color:red;'>Error preparando la consulta:</h3>";
    echo "<pre>" . htmlspecialchars($err) . "</pre>";

    // Intentamos mostrar la estructura de la tabla 'registros'
    $res = $mysqli->query("SHOW COLUMNS FROM registros");
    if ($res) {
        echo "<h4>Columnas actuales de la tabla `registros`:</h4>";
        echo "<ul>";
        while ($col = $res->fetch_assoc()) {
            echo "<li><strong>" . htmlspecialchars($col['Field']) . "</strong> — " . htmlspecialchars($col['Type']) . "</li>";
        }
        echo "</ul>";
        $res->free();
    } else {
        echo "<p>No se pudo obtener la estructura de la tabla `registros`. Error: " . htmlspecialchars($mysqli->error) . "</p>";
    }

    exit;
}

$stmt->bind_param("ssss", $nombre, $correo, $telefono, $mensaje);

if ($stmt->execute()) {
    echo "<h2 style='color:green;'>Registro agregado correctamente ✔</h2>";
    echo "<p><a href='../index.php'>Volver al panel</a></p>";
} else {
    echo "<h3 style='color:red;'>Error al ejecutar el INSERT:</h3>";
    echo "<pre>" . htmlspecialchars($stmt->error) . "</pre>";
    echo "<p><a href='../index.php'>Volver</a></p>";
}

$stmt->close();
$mysqli->close();
?>

