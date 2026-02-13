<?php
// guardar_accidente.php
// Asegúrate de que conexion.php define $conn (como en tu ejemplo anterior)

require "conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // si se accede por GET redirige al formulario
    header("Location: registrar_accidente.php");
    exit;
}

// recoger y validar (básica) entradas POST
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
$hora = isset($_POST['hora']) ? $_POST['hora'] : null;
$nombre = isset($_POST['nombre_victima']) ? trim($_POST['nombre_victima']) : null;
$tipo = isset($_POST['tipo_accidente']) ? $_POST['tipo_accidente'] : null;
$descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : null;
$gravedad = isset($_POST['nivel_gravedad']) ? $_POST['nivel_gravedad'] : null;
$lugar = isset($_POST['lugar']) ? trim($_POST['lugar']) : null;

// validación mínima
$errores = [];
if (!$fecha) $errores[] = "Fecha requerida.";
if (!$hora) $errores[] = "Hora requerida.";
if (!$nombre) $errores[] = "Nombre de la víctima requerido.";
if (!$tipo) $errores[] = "Tipo de accidente requerido.";
if (!$descripcion) $errores[] = "Descripción requerida.";
if (!$gravedad) $errores[] = "Nivel de gravedad requerido.";
if (!$lugar) $errores[] = "Lugar requerido.";

if (!empty($errores)) {
    // mostrar primeros errores y volver al formulario
    $msg = implode("\\n", $errores);
    echo "<script>alert('Errores:\\n{$msg}'); window.history.back();</script>";
    exit;
}

// Prepared statement para insertar
$sql = "INSERT INTO accidentes 
    (fecha, hora, nombre_victima, tipo_accidente, descripcion, nivel_gravedad, lugar)
    VALUES (?, ?, ?, ?, ?, ?, ?)";

if (!$stmt = $conn->prepare($sql)) {
    // Error en prepare
    echo "ERROR_PREPARE: " . htmlspecialchars($conn->error);
    exit;
}

// bind de parámetros: todos strings excepto fecha/hora tratados como strings también
$stmt->bind_param("sssssss",
    $fecha,
    $hora,
    $nombre,
    $tipo,
    $descripcion,
    $gravedad,
    $lugar
);

if ($stmt->execute()) {
    // éxito: redirigir al formulario con mensaje
    echo "<script>alert('Accidente registrado correctamente'); window.location='registrar_accidente.php';</script>";
    $stmt->close();
    $conn->close();
    exit;
} else {
    // error en ejecución
    echo "ERROR_EXECUTE: " . htmlspecialchars($stmt->error);
    $stmt->close();
    $conn->close();
    exit;
}
?>
