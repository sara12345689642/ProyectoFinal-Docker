<?php

// Definición de la clase Connection, encargada de gestionar la conexión a la base de datos
    class Connection{
        // Propiedad privada que almacena el nombre del servidor de la base de datos
        private $host = 'db';
        // Propiedad privada que almacena el nombre de la base de datos a la que se conectará
        private $dbname = 'bienestar_u';
        // Propiedad privada que almacena el nombre de usuario de la base de datos
        private $username = 'root';
        // Propiedad privada que almacena la contraseña del usuario de la base de datos
        private $password = '';

        // Método público que establece la conexión con la base de datos y devuelve un objeto PDO
        public function connect(){
            try {
                // Construcción del Data Source Name (DSN), que especificala fuente de datos para PDO
                $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
                // Opciones de configuración para la conexión PDO
                $options = [
                    // Configura PDO para lanzar excepciones en caso de error
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    // Establece el modo de obtención de datos como un array asociativo
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    // Deshabilita la emulación de consultas preparadas para mejorar la seguridad
                    PDO::ATTR_EMULATE_PREPARES => false,

                ];
                // Retorna una nueva instancia de PDO con los parámetros definidos
                return new PDO($dsn, $this->username, $this->password, $options);
                
            } catch (\Throwable $th) { // Captura cualquier error que ocurra en el bloque try
                // Muestra un mensaje de error junto con la descripción del problema
                echo "Error en la conexion" . $th->getMessage();
                // Detiene la ejecución del script en caso de error
                exit;
                
                
            }
        }
    }


    
     