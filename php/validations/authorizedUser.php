<?php


session_start();

$session_id = session_id();

$_SESSION['session_id'] = $session_id;

if (!isset($_SESSION['id_admin']) || $_SESSION["session_id"] !== session_id()) {
    http_response_code(404);
     header('Location: ./../../index.php' );
    exit();
}
?>