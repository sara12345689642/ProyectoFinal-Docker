<?php
session_start();
require_once '../config/Connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$usuario_id = $_SESSION['user_id'];
$connection = new Connection();
$pdo = $connection->connect();

$sql = "SELECT * FROM consultas WHERE usuario_id = :usuario_id ORDER BY fecha DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute([':usuario_id' => $usuario_id]);
$consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Consultas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #b70000;
            padding: 20px;
            color: white;
            text-align: center;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            color: #b70000;
            text-align: center;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #b70000;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            color: #b70000;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #900000;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>

<header>
    <h1>Universidad del Valle</h1>
    <p>Plataforma de Consultas</p>
</header>

<div class="container">
    <h2>Mis Consultas</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Mensaje</th>
            <th>Fecha</th>
            <th>Acción</th>
        </tr>
        <?php foreach ($consultas as $consulta): ?>
        <tr>
            <td><?= $consulta['id'] ?></td>
            <td><?= $consulta['tipo'] ?></td>
            <td><?= $consulta['mensaje'] ?></td>
            <td><?= $consulta['fecha'] ?></td>
            <td><a href="eliminarConsulta.php?id=<?= $consulta['id'] ?>" onclick="return confirm('¿Estás seguro de eliminar esta consulta?')">Eliminar</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<footer>
    © <?php echo date("Y"); ?> Universidad del Valle - Todos los derechos reservados.
</footer>

</body>
</html>