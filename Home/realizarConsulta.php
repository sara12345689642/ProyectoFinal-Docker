<?php
session_start();
require_once '../config/Connection.php';

if (!isset($_SESSION['username']) || ($_SESSION['role_id'] != 2 && $_SESSION['role_id'] != 3)) {
    header("Location: ../index.php");
    exit();
}

$connection = new Connection();
$pdo = $connection->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION['user_id'];
    $tipo = $_POST['tipo'];
    $mensaje = $_POST['mensaje'];

    $sql = "INSERT INTO consultas (usuario_id, tipo, mensaje) VALUES (:usuario_id, :tipo, :mensaje)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':usuario_id' => $usuario_id,
        ':tipo' => $tipo,
        ':mensaje' => $mensaje
    ]);

    header("Location: dashBoardStudent.php?msg=consulta_realizada");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Realizar Consulta</title>
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
            max-width: 600px;
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

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }

        select, textarea, input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #b70000;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #900000;
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
    <h2>Realizar Consulta</h2>
    <form method="POST">
        <label for="tipo">Tipo de Consulta:</label>
        <select name="tipo" id="tipo" required>
            <option value="Académica">Académica</option>
            <option value="Administrativa">Administrativa</option>
            <option value="Otro">Otro</option>
        </select>
        
        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" id="mensaje" rows="5" required></textarea>

        <input type="submit" value="Enviar Consulta"> 
    </form>
    <a class="back" href="dashBoardStudent.php">← Volver al Dashboard</a>
    
</div>

<footer>
    © <?php echo date("Y"); ?> Universidad del Valle - Todos los derechos reservados.
</footer>

</body>
</html>