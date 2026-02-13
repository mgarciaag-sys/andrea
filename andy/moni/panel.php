<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Panel</title>
</head>
<body class="p-5">

<h2>Bienvenido</h2>

<a href="form_alimentacion.php" class="btn btn-primary mt-3">Registrar Alimentación</a>
<a href="salir.php" class="btn btn-danger mt-3">Salir</a>
<a href="registrar_accidente.php" class="btn btn-primary mt-3">Registrar De Accidentes</a>
<a href="recetas.html" class="btn btn-danger mt-3">Recetas</a>

</body>
</html>
