<?php


    require_once '../config/Connection.php';

    if ($_SERVER['REQUEST_METHOD']== 'POST') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $role_id = $_POST['role_id'];

        try {
            $connection = new Connection();
            $pdo = $connection->connect();


            $sql = "INSERT INTO usuarios(username, password, role_id) VALUES (:username, :password, :role_id)";
            $stsm = $pdo -> prepare($sql);
            $stsm -> execute([
                'username' => $username,
                'password' => $password,
                'role_id' => $role_id,
            ]);

            echo "<script>
            alert('Usuario registrado correctamente.');
            window.location.href = '../index.php'; // Redirigir al login o a otra página
            </script>";


        } catch (\Throwable $th) {
            echo "<script>
                alert('Error al registrar el usuario: " . addslashes($th->getMessage()) . "');
                window.location.href = '../registrarse.php';
            </script>";

        }


    }