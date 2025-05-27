<?php
require_once '../config/Connection.php'; // Asegúrate que la ruta sea correcta

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $codigo = $_POST['codigo'];
    $correo = $_POST['correo'];
    $actividad = $_POST['actividad'];
    $comentarios = $_POST['comentarios'];

    try {
        $connection = new Connection();
        $pdo = $connection->connect();

        $sql = "INSERT INTO inscripciones_actividades (nombre, codigo_estudiantil, correo, actividad, comentarios)
                VALUES (:nombre, :codigo, :correo, :actividad, :comentarios)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':actividad', $actividad);
        $stmt->bindParam(':comentarios', $comentarios);
        $stmt->execute();

        echo "<script>alert('Inscripción realizada exitosamente'); window.location.href='dashBoardStudent.php';</script>";
    } catch (PDOException $e) {
        echo "Error al guardar la inscripción: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscripción a Actividades Extracurriculares</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f6f6;
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #b30000;
        }

        label {
            font-weight: bold;
            margin-top: 15px;
            display: block;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        textarea {
            resize: vertical;
        }

        button {
            margin-top: 20px;
            width: 100%;
            background-color: #b30000;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #8c0000;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Inscripción a Actividades Extracurriculares</h2>
    <form method="POST">
        <label for="nombre">Nombre completo</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="codigo">Código estudiantil</label>
        <input type="text" id="codigo" name="codigo" required>

        <label for="correo">Correo institucional</label>
        <input type="email" id="correo" name="correo" required>

        <label for="actividad">Actividad</label>
        <select name="actividad" id="actividad" required>
            <option value="">-- Selecciona una actividad --</option>
            <option value="Fútbol">Fútbol</option>
            <option value="Danza">Danza</option>
            <option value="Teatro">Teatro</option>
            <option value="Pintura">Pintura</option>
            <option value="Voluntariado">Voluntariado</option>
        </select>

        <label for="comentarios">Comentarios adicionales (opcional)</label>
        <textarea id="comentarios" name="comentarios" placeholder="¿Tienes alguna necesidad especial o comentario?"></textarea>

        <button type="submit">Inscribirse</button>
    </form>
</div>

</body>
</html>
