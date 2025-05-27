<?php
session_start();



// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

// Verifica el rol del usuario
if ($_SESSION['role_id'] !== 1) {
    echo "Acceso denegado. Solo los administradores pueden acceder a esta página.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Administrador</title>
    <link rel="stylesheet" href="../css/style.css">
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
        <div>Bienvenido(a), Administrador</div>
        <span>Universidad del Valle - Gestión Administrativa</span>
        <button class="help-btn">Ayuda</button>
    </div>
    <div class="container">
        <div class="card">
            <h3>Registrar Estudiante</h3>
            <p>Registra nuevos estudiantes en el sistema.</p>
            <button class="button">Registrar</button>
        </div>
        <div class="card">
            <h3>Registrar Actividad</h3>
            <p>Registra actividades extracurriculares o eventos.</p>
            <button class="button">Registrar</button>
        </div>
        <div class="card">
            <h3>Atender Consultas</h3>
            <p>Gestiona y responde consultas realizadas por los estudiantes.</p>
            <button class="button">Atender</button>
        </div>
        <div class="card">
            <h3>Gestionar Recursos</h3>
            <p>Administra los recursos institucionales disponibles.</p>
            <button class="button">Gestionar</button>
        </div>
    </div>
</body>
</html>