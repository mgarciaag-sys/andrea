<?php
session_start();
require "conexion.php";

if (!isset($_SESSION['usuario_id'])) {
    echo "NO_LOGIN";
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

$fecha = $_POST['fecha'];
$des = $_POST['desayuno'];
$com = $_POST['comida'];
$cena = $_POST['cena'];
$agua = $_POST['agua'];
$notas = $_POST['notas'];

$sql = $conn->prepare("
    INSERT INTO alimentacion (usuario_id, fecha, desayuno, comida, cena, agua, notas)
    VALUES (?, ?, ?, ?, ?, ?, ?)
");

$sql->bind_param("issssis", $usuario_id, $fecha, $des, $com, $cena, $agua, $notas);

echo ($sql->execute()) ? "OK" : "ERROR";
?>
