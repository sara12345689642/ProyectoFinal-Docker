<?php
session_start();
require_once '../config/Connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$usuario_id = $_SESSION['user_id'];
$id = $_GET['id'];

$connection = new Connection();
$pdo = $connection->connect();

// Solo puede eliminar su propia consulta
$sql = "DELETE FROM consultas WHERE id = :id AND usuario_id = :usuario_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id' => $id,
    ':usuario_id' => $usuario_id
]);

header("Location: guardarConsulta.php");
exit();
