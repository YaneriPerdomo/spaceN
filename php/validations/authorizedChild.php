<?php


session_start();

$session_id = session_id();

$_SESSION['session_id'] = $session_id;

if (!isset($_SESSION['id_Child']) || $_SESSION["session_id"] !== session_id()) {
    header('Location: ./../../index.php');
    exit();
}
?>