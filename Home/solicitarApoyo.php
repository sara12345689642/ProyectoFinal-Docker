<?php
session_start();
require_once '../config/Connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: ..index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $_POST['tipo_servicio'];
    $descripcion = $_POST['descripcion'];
    $correo = $_POST['correo'];

    try {
        $connection = new Connection();
        $pdo = $connection->connect();

        $sql = "INSERT INTO solicitud_apoyo (usuario_id, tipo_servicio, descripcion, correo) 
                VALUES (:usuario_id, :tipo_servicio, :descripcion, :correo)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':usuario_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->bindParam(':tipo_servicio', $tipo, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->execute();

        echo "<script>alert('Solicitud enviada correctamente'); window.location.href='dashBoardStudent.php';</script>";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitar Apoyo</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 12px;
            border-top: 6px solid #a50000;
        }

        h2 {
            text-align: center;
            color: #a50000;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            background-color: #a50000;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #870000;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #a50000;
            text-decoration: none;
        }

        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Solicitud de Apoyo Estudiantil</h2>
    <form method="POST">
        <label for="tipo_servicio">Tipo de Apoyo</label>
        <select name="tipo_servicio" id="tipo_servicio" required>
            <option value="">-- Selecciona --</option>
            <option value="Psicológico">Psicológico</option>
            <option value="Económico">Económico</option>
            <option value="Alimentario">Alimentario</option>
        </select>

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" placeholder="Escribe aquí los detalles de tu solicitud..." required></textarea>

        <label for="correo">Correo electrónico:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>


        <button type="submit">Enviar Solicitud</button>
    </form>
    <a class="back" href="dashBoardStudent.php">← Volver al Dashboard</a>
</div>

</body>
</html>