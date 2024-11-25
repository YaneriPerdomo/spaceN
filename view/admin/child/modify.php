<?php
    
      function showChild(){
        include '../../../php/connectionBD.php';

        // Verificamos si hubo algún error al conectar a la base de datos
        if ($pdo->errorCode() != 0) {
            // Si hay un error, mostramos un mensaje y detenemos la ejecución
            die("Error de conexión a la base de datos: " . $pdo->errorInfo()[2]);
        }
    
        $id_child = $_GET["id"];
        
        $sqlShow = "SELECT ninos.id_nino, usuarios.id_usuario AS usuarios_id_usuario, usuarios.usuario, ninos.id_genero, ninos.nombre, ninos.apellido, ninos.id_categoria_actividades, ninos.fecha_nacimiento FROM ninos INNER JOIN 
                    usuarios ON ninos.id_usuario = usuarios.id_usuario  
                    WHERE ninos.id_nino = :id_child;";

        $stmt = $pdo->prepare($sqlShow);
        $stmt->bindParam('id_child', $id_child, PDO::PARAM_INT);
        $stmt->execute();
       
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // arreglo asociativo
 
        foreach ($result as $clave =>  $row) {

            switch ($row["id_genero"]) {
                case 1:
                    $gender = "<p>
                    <label><input type='radio' name='gender' value='1' checked> Masculino</label>
                    <label><input type='radio' name='gender' value='2'> Femenino</label>
                    </p>";
                    break;
                case 2:
                    $gender = "<p>
                    <label><input type='radio' name='gender' value='1' > Masculino</label>
                    <label><input type='radio' name='gender' value='2' checked> Femenino</label>
                    </p>";               
                    break;
            }
        switch ($row["id_categoria_actividades"]) {
            case 1:
                $accessLevel = "<select name='accessLevel'><br>
                    <option value='1' selected>Pre numerico</option>
                    <option value='2'>Numerico emergente</option>
                    <option value='3'>Desarrollo numerico</option>
                </select><br>";
                break;
            case 2:
                $accessLevel = "<select name='accessLevel'><br>
                    <option value='1'>Pre numerico</option>
                    <option value='2' selected>Numerico emergente</option>
                    <option value='3'>Desarrollo numerico</option>
                </select><br>";
                break;
                case 3:
                    $accessLevel = "<select name='accessLevel'><br>
                    <option value='1'>Pre numerico</option>
                    <option value='2' >Numerico emergente</option>
                    <option value='3' selected>Desarrollo numerico</option>
                    </select><br>";
                    break;
            default:           
                break;
        };
        echo "<input type='hidden' name='id_user' value = '". $row["usuarios_id_usuario"]."'";
        echo "<label for=''>Usuario</label><br>";
        echo "<input type='text' name='user' value='". $row["usuario"] . "'><br>";
        echo "<label for=''>Nombre</label><br>";
        echo "<input type='text' name='name' value = '" . $row["nombre"] . "'><br>";
        echo " <label for=''>Apellido</label><br>";
        echo "<input type='text' name='lastname' value = '" . $row["apellido"] . "'><br>";
        echo "<label for=''>Fecha de nacimiento</label><br>";
        echo "<input type='date' name='date' value = '".  date('Y-m-d', strtotime($row["fecha_nacimiento"]))  . "'><br>";
        echo " <label for=''>Nivel_acceso</label><br>";
        echo "$accessLevel";
        echo "<label for=''>Genero</label><br>";
        echo $gender;
        echo "<label for=''>Contraseña</label><br>";
        echo "<input type='password' name='password'><br>";
        echo "<label for=''>contraseña de nuevo</label><br>";
        echo "<input type='password'>";
    } 
    }
    
       
    
     

?>

<!DOCTYPE html>
<html lang="es">

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
        <form action="../../../php/modifyChild.php" method="post">
            <?php 
                showChild();
            ?><br>
            <input type="submit" value="Actualizar">
        </form>
    </main>
</body>

</html>