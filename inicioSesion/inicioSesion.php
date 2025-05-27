<?php
require_once '../config/Connection.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    // Limpiar los datos de entrada
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';




    try {
        $connection = new Connection();
        $pdo = $connection->connect();

        // Preparar la consulta para evitar inyección SQL
        $sql = "SELECT * FROM usuarios WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        // Verificar si el usuario existe y la contraseña es correcta
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role_id'] = $user['role_id'];

            // Redirigir según el rol del usuario
            if ($user['role_id'] == 1) {
                header("Location: ../Home/dashBoardAministrador.php");
                exit();
            } elseif ($user['role_id'] == 2) {
                header("Location: ../Home/dashBoardStudent.php");
                exit();
            }elseif ($user['role_id'] == 3) {
                header("Location: ../Home/dashBoardProfessional.php");
                exit();
            } else {
                echo 'Acceso Denegado';
                exit(); 
            }
        } else {
            // Si las credenciales no son válidas, redirigir con un mensaje de error
            header("Location: ../index.php?error=Credenciales incorrectas");
            exit();
        }
    } catch (Exception $e) {
        // Manejo de errores
        header("Location: ../index.php?error=" . urlencode("Error en la conexión: " . $e->getMessage()));
        exit();
    }
}
?>

