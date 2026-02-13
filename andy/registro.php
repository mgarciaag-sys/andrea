<?php
require "conexion.php";

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$pass   = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
$sql->bind_param("s", $correo);
$sql->execute();
$sql->store_result();

if ($sql->num_rows > 0) {
    echo "EXISTE";
    exit;
}

$insert = $conn->prepare("INSERT INTO usuarios(nombre, correo, password) VALUES (?, ?, ?)");
$insert->bind_param("sss", $nombre, $correo, $pass);

echo ($insert->execute()) ? "OK" : "ERROR";
?>
