<?php

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
    $name = $_POST["name"];
    $lastName = $_POST["lastName"];
    $mail = $_POST["main"];
    $professionalPosition = $_POST["professionalPosition"];
    $center = $_POST["center"];
    $password = $_POST["password"];
    
    $sqlSearchUser = "SELECT COUNT(*) FROM usuarios WHERE usuario = '$user'";
    $result = $conn->query($sqlSearchUser);

    $sqlSearchMail = "SELECT COUNT(*) FROM profesionales WHERE correo_electronico = '$mail'";
    $result2 = $conn->query($sqlSearchMail);

    // Obtener el número de filas (el resultado de COUNT(*))
    $row = $result->fetch_row();
    $num_filas = $row[0];

     // Obtener el número de filas (el resultado de COUNT(*))
     $row2 = $result2->fetch_row();
     $num_filas2 = $row2[0];


    if($num_filas < 0 || $num_filas2 < 0){
    // Primera consulta: Insertar usuario
    $sql1 = "INSERT INTO usuarios (id_rol, usuario, clave, estado, permisos, fecha_creacion)
    VALUES (
        '1', 
        '$user', 
        '$password', 
        1, 
        1, 
        NOW()
    )";

    if ($conn->query($sql1) === TRUE) {
        $ultimo_id_usuario = $conn->insert_id; // Obtener el último ID insertado

        // Segunda consulta: Insertar profesional
        $sql2 = "INSERT INTO profesionales (id_usuario, id_cargo, nombre, apellido, correo_electronico, centro_educativo_profesional)
        VALUES (
            $ultimo_id_usuario,
            (SELECT id_cargo FROM cargos WHERE id_cargo = '1'), 
            '$name',
            '$lastName',
            '$mail',
            '$center'
        )";

        if ($conn->query($sql2) === TRUE) {
            // Ambas inserciones fueron exitosas
            echo "Nueva cuenta creada correctamente.";
        } else {
            echo "Error a crear una nueva cuenta " . $conn->error;
        }
    } else {
        echo "Error al insertar el usuario: " . $conn->error;
    }
    }else{
        echo "<script>alert('Usuario o gmail existente.'); window.location.href = '../view/createAccount.php';</script>";
    }
    $conn->close();
}
