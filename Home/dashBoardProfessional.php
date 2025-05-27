<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Profesional</title>
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
            height: 100vh;
            justify-content: flex-start;
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
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            width: 90%;
            max-width: 1200px;
            margin-top: 30px;
        }
        .card {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            width: 230px;
        }
        .card h3 {
            color: #a50000;
            font-size: 18px;
            font-weight: bold;
        }
        .card p {
            font-size: 16px;
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
        <div>Bienvenido(a), Profesional</div>
        <span>Universidad del Valle - Gestión de Servicios Psicológicos y Sociales</span>
        <button class="help-btn">Ayuda</button>
    </div>
    <div class="container">
        <div class="card">
            <h3>Gestionar Citas</h3>
            <p>Programa y organiza citas con los estudiantes.</p>
            <button class="button">Gestionar</button>
        </div>
        <div class="card">
            <h3>Revisar Historial</h3>
            <p>Consulta los historiales psicológicos de los estudiantes.</p>
            <button class="button">Consultar</button>
        </div>
        <div class="card">
            <h3>Actualizar Datos</h3>
            <p>Modifica y actualiza la información de los estudiantes.</p>
            <button class="button">Actualizar</button>
        </div>
        <div class="card">
            <h3>Gestionar Visitas Sociales</h3>
            <p>Gestiona y realiza visitas sociales a estudiantes en riesgo.</p>
            <button class="button">Gestionar</button>
        </div>
        <div class="card">
            <h3>Registrar Intervenciones</h3>
            <p>Registra y actualiza las intervenciones sociales realizadas.</p>
            <button class="button">Registrar</button>
        </div>
        <div class="card">
            <h3>Programas de Apoyo Social</h3>
            <p>Gestiona los programas de apoyo social disponibles.</p>
            <button class="button">Ver Programas</button>
        </div>
        <div class="card">
            <h3>Asesorías</h3>
            <p>Asesora a estudiantes que necesiten de apoyo profesional.</p>
            <button class="button">Gestionar</button>
        </div>
    </div>
</body>
</html>