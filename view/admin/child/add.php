<?php

session_start();

// Verificamos si el usuario está autenticado (ejemplo: si existe una variable de sesión 'usuario_logueado')
if (!isset($_SESSION['usuario'])) {
    // Si no está autenticado, redireccionamos a la página de login
    header('Location: ./../../index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <main>
        <h1>Registrar usuario</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa sunt officia totam temporibus sint repellat
            voluptas adipisci, ut omnis a deserunt, distinctio vitae maxime, vel nam quos? Ad, labore recusandae!</p>
        <form action="../../../php/addChild.php" method="post">
            <input type="text" value="<?php echo $_SESSION["id_profesional"]; ?>">
            <label for="">Usuario</label><br>
            <input type="text" name="user" id=""><br>
            <label for="">Nombre</label><br>
            <input type="text" name="name"><br>
            <label for="">Apellido</label><br>
            <input type="text" name="lastName" id=""><br>
            <label for="">Fecha de nacimiento</label><br>
            <input type="date" name="date" id=""><br>
            <label for="">Nivel_acceso</label><br>
            <select name="accessLevel" id=""><br>
                <option value="1">Pre numerico</option>
                <option value="2">Numerico emergente</option>
                <option value="3">Desarrollo numerico</option>
            </select><br>
            <label for="">Genero</label><br>
            <p>
                <label><input type="radio" name="gender" value="1"> Masculino</label>
                <label><input type="radio" name="gender" value="2"> Femenino</label>
            </p><br>
            <label for="">Contraseña</label><br>
            <input type="password" name="password"><br>
            <label for="">contraseña de nuevo</label>
            <input type="password">
            <input type="submit" value="Registrar">
        </form>
    </main>
</body>

</html>