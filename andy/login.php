<?php
session_start();
require "conexion.php";

$correo = $_POST['correo'];
$pass   = $_POST['password'];

$sql = $conn->prepare("SELECT id, password FROM usuarios WHERE correo = ?");
$sql->bind_param("s", $correo);
$sql->execute();
$sql->store_result();

$sql->bind_result($id, $hash);
$sql->fetch();

if ($sql->num_rows === 1 && password_verify($pass, $hash)) {
    $_SESSION['usuario_id'] = $id;
    echo "OK";
} else {
    echo "ERROR";
}
?>
