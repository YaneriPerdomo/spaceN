<?php
session_start();
include "./connectionBD.php";

try {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = trim($_POST["user"]);
        $password = trim($_POST["password"]);

        $sql = "SELECT * FROM usuarios WHERE usuario = :user AND clave=:clave";
        $query = $pdo->prepare($sql);
        $query->bindParam("user", $user, PDO::PARAM_STR);
        $query->bindParam("clave", $password, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $id_usuario = $row["id_usuario"];
            $rol = $row["id_rol"];
            switch ($rol) {
                case '1':
                    $_SESSION["id_admin"] = $row["id_usuario"];
                    $_SESSION["usuario"] = $user;
                    $sqlAdmin = "SELECT * FROM profesionales WHERE id_usuario = :id";
                    $queryAdmin = $pdo->prepare($sqlAdmin);
                    $queryAdmin->bindParam("id", $id_usuario, PDO::PARAM_INT);
                    $queryAdmin->execute();
                    $row2 = $queryAdmin->fetch(PDO::FETCH_ASSOC);
                    $_SESSION["id_profesional"] = $row2["id_profesional"];
                    $_SESSION["nombre"] = $row2["nombre"];
                    $_SESSION["apellido"] = $row2["apellido"];
                    $_SESSION["id_cargo"] = $row2["id_cargo"];
                    $_SESSION['correo'] = $row2["correo_electronico"];
                    $_SESSION['centro'] = $row2["centro_educativo"];
                    header("Location: ../view/admin/dashboard.php?page=1");
                    break;
                case '2':
                    $sqlChild = "SELECT * FROM ninos WHERE id_usuario = :id";
                    $queryChild = $pdo->prepare($sqlChild);
                    $queryChild->bindParam("id", $id_usuario, PDO::PARAM_INT);
                    $queryChild->execute();
                    $resultsChild = $queryChild->fetch(PDO::FETCH_ASSOC);

                    $sqlUltimate = "UPDATE ninos SET ultimo_acceso = NOW() WHERE id_usuario = :id";
                    $queryUltimate = $pdo->prepare($sqlUltimate);
                    $queryUltimate->bindParam("id", $id_usuario, PDO::PARAM_INT);
                    $queryUltimate->execute();


                    $_SESSION["id_Child"] = $resultsChild["id_nino"];
                    $_SESSION["gender"] = $resultsChild["id_genero"];
                    $_SESSION["accessLevel"] = $resultsChild["id_categoria_actividades"];
                    $_SESSION["user"] = $user;
                    $_SESSION["id_user"] = $resultsChild["id_usuario"];
                    $_SESSION["dateOfBirth"] = $resultsChild["fecha_nacimiento"];
                    $_SESSION["name"] = $resultsChild["nombre"];
                    $_SESSION["lastname"] = $resultsChild["apellido"];
                    $_SESSION["lastAccess"] = $resultsChild["ultimo_acceso"];
                    $_SESSION["id_profesional"] = $resultsChild["id_profesional"];
                    $_SESSION["accountCreationDate"] = substr($row["fecha_hora_creacion"], 0, 10);

                    switch ($resultsChild["id_categoria_actividades"]) {
                        case '1':
                            header("Location: ../view/user/preNumerical/read.php");
                            break;
                        case '2':
                            header("Location: ../view/user/numericoEmerging/read.php");
                            break;
                        case '3':
                            header("Location: ../view/user/numericalDevelopment/read.php");
                            break;
                    }
                    break;
            }
        } else {
            echo "no encontrado";
        }
    }

} catch (PDOException $ex) {
    echo $ex->getMessage();
} finally {
    $pdo = null;
}
?>