<?php

session_start();


$host = "localhost"; // Servidor de la base de datos
$port = 3306; // Database port
$dbname = "eres_capaz"; // Nombre de la base de datos
$username = "root"; // Nombre de usuario de la base de datos
$password = "";

$conn = new mysqli($host, $username, $password, $dbname, $port);


if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $password = $_POST["password"];

    $sql = "select * FROM usuarios where usuario='$user' and clave='$password'";


    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $id_usuario = $row["id_usuario"];


        $rol = $row["id_rol"];
        $status = $row["estado"];

        $_SESSION["id_admin"] = $row["id_usuario"];
        $_SESSION["usuario"] = $user;
        $sql2 = "SELECT * FROM profesionales WHERE id_usuario=$id_usuario";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $_SESSION["id_profesional"] = $row2["id_profesional"];
        $_SESSION["nombre"] = $row2["nombre"];
        $_SESSION["apellido"] = $row2["apellido"];
        $_SESSION["id_cargo"] = $row2["id_cargo"];
        $_SESSION['correo'] = $row2["correo_electronico"];
        $_SESSION['centro'] = $row2["centro_educativo_profesional"];
        if ($rol == "1") {
            if ($status == "1") {
                header("Location: ../view/admin/dashboard.php?page=1");

            } else {
                echo "Tu cuenta ha sido eliminada";
            }
        } else {
            echo "nombre no encontrado";
        }

    } else {
        echo "no encontrado";
    }
}

$conn->close();
?>