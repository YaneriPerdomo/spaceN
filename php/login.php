<?php


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
    $user = $_POST["user"];
    $password = $_POST["password"];

    $sql = "select * FROM usuarios where usuario='$user' and clave='$password'";


    $result = $conn->query($sql);
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $sql2 = "SELECT * FROM profesionales id_usuario = $user";
        $result = $conn->query($sql2);        
        $row2 = $result->fetch_assoc();
  
         $rol = $row["id_rol"];
    
    
        session_start();
        $_SESSION["id_usuario"] = $row["id_usuario"];
        $_SESSION["usuario"] = $user;
        $_SESSION["nombre"] = $name;    
        if($rol == "1"){
           echo $_SESSION["id_usuario"];
        }else{
            echo "nombre no encontrado";
        }
    }else{
        echo"no encontrado";
    }
}

$conn->close();
?>