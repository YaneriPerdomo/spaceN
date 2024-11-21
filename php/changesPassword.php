<?php

session_start();



$host = "localhost"; // Servidor de la base de datos
$port =  3306; // Database port
$dbname =  "eres_capaz"; // Nombre de la base de datos
$username =  "root"; // Nombre de usuario de la base de datos
$password = ""; 

$conn = new mysqli($host, $username, $password, $dbname,  $port);


if($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    

    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];
    $passwordAgain = $_POST["passwordAgain"];
    $id =  $_SESSION["id_usuario"];
    $sql = "UPDATE usuarios SET clave =$newPassword  WHERE id_usuario = $id";


    if(    $conn->query($sql) === true){
        echo "<script>alert('Cambio de contraseña cambiada.'); window.location.href = '../view/admin/user/changesPassword.php';</script>";
    }else{
        echo "error";
    }
}

$conn->close();
?>