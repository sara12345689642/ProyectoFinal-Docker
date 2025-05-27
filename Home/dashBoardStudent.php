<?php
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['username']) || ($_SESSION['role_id'] != 2 && $_SESSION['role_id'] !=3)) { // Suponiendo que el rol de secretaria es 2
    header("Location: ../index.php");
    exit();
}

// Conectar a la base de datos
require_once '../config/Connection.php';
$connection = new Connection();
$pdo = $connection->connect();

// Obtener la lista de usuarios
$sql = "SELECT id, username FROM usuarios";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Estudiante</title>
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            width: 100%;
            background-color: #a50000;
            color: white;
            text-align: center;
            padding: 20px 0;
            font-size: 24px;
            font-weight: bold;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .header span {
            font-size: 18px;
            font-weight: normal;
        }
        .help-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            background-color: white;
            color: #a50000;
            border: none;
            padding: 10px 15px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
        }
        .container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            width: 80%;
        }
        .card {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            width: 250px;
        }
        .card h3 {
            color: #a50000;
            font-size: 18px;
            font-weight: bold;
        }
        .button {
            background-color: #a50000;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div>Bienvenido(a), Estudiante</div>
        <span>Universidad del Valle - Gestión de Servicios</span>
        <button class="help-btn">Ayuda</button>
    </div>
    <div class="container">
        <div class="card">
            <h3>Consultar Servicios de Apoyo</h3>
            <p>Accede a los servicios de apoyo estudiantil.</p>
            <a href="solicitarApoyo.php"><button class="button">Solicitar</button></a>

        </div>
        <div class="card">
            <h3>Inscribirse a Actividades</h3>
            <p>Regístrate en actividades extracurriculares.</p>
            <a href="inscripciónActividad.php"><button class="button">Inscribirse</button></a>
        </div>
        <div class="card">
            <h3>Consultas</h3>
            <p>Realiza las consultas de tu interés.</p>
            <a href="realizarConsulta.php"><button class="button">Hacer Consulta</button></a>

        </div>
        <div class="card">
            <h3>Eliminar Consultas</h3>
            <p>Anula una consulta previamente agendada.</p>
            <a href="guardarConsulta.php"><button class="button">Cancelar</button></a>
        </div>
    </div>
</body>
</html>