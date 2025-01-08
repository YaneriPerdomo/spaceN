<?php

// Establecemos las credenciales para la conexión a la base de datos
$host = "localhost"; // El servidor de la base de datos (en este caso, local)
$user = "root"; // El usuario con privilegios para acceder a la base de datos
$password = ""; // La contraseña del usuario (debería ser una cadena vacía si no hay contraseña)
$baseDatos = "spacen"; // El nombre de la base de datos a la que queremos conectar


// Creamos una cadena de conexión (DSN)
$dsn = 'mysql:host=' . $host . ';dbname=' . $baseDatos.';charset=utf8mb4';
//charset=utf8mb4 que permita mostrar datos con caracteres especiales tales como acentos , emojin y demas.
// Esta cadena especifica el tipo de base de datos (MySQL), el host y el nombre de la base de datos

// Creamos una nueva instancia de la clase PDO para conectar a la base de datos
$pdo = new PDO($dsn, $user, $password);
// Los argumentos de PDO son: el DSN, el usuario y la contraseña

// Esto indica que los resultados de las consultas se devolverán como objetos de PHP
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($pdo->errorCode() != 0) {
    echo "Error de conexión: " . $pdo->errorInfo()[2];
    http_response_code(500);
}


?>