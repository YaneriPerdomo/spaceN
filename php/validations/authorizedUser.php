<?php
session_start();
// Verificamos si el usuario está autenticado (ejemplo: si existe una variable de sesión 'usuario_logueado')
if (!isset($_SESSION['id_admin'])) {
    // Si no está autenticado, redireccionamos a la página de login
    header('Location: ./../../index.php');
    exit();
}
?>