<?php
function notificationOffcanvas ()
{

    include './../../../php/connectionBD.php';

    if ($pdo->errorCode() != 0) {
        // Si hay un error, mostramos un mensaje con el detalle del error
        echo "Error de conexión: " . $pdo->errorInfo()[2];
        // Aquí podrías agregar lógica adicional para manejar el error, como redirigir a una página de error o enviar un correo electrónico al administrador.
    }

    try {
        $id_Child = $_SESSION["id_Child"];

        $sql = "SELECT * FROM `notificaciones` WHERE estado = 'pendiente' and id_nino = :id LIMIT 1";
        $query = $pdo->prepare($sql);
        $query->bindParam('id', $id_Child, PDO::PARAM_INT);
        $query->execute();

        if ($query->rowCount() > 0) {
            echo '<a href="./notification.php">
            <i class="bi bi-filetype-pdf"></i>
            Notificaciones <i class="bi bi-bell" style="color: rgb(47,47,47);"></i>
        </a>';
        } else {
            echo '<a href="./notification.php">
        <i class="bi bi-filetype-pdf"></i>
        Notificaciones 
    </a>';
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $pdo = null;

}
?>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <div class="d-flex">
            <div class="d-flex">
                <img src="<?php $_SESSION["gender"] == "1" ? $gender = '../../../img/childs/boy.png' : $gender = '../../../img/childs/girl.png';
                echo $gender ?>"
                    class="img-fluid userImg" alt="">
                <div class="d-flex flex-column">
                    <span><strong><?php if (isset($_SESSION)) {
                        echo $_SESSION['user'];
                    } else {
                        echo "Tu Usuario";
                    } ?></strong></span>
                    <span class="text-secondary">
                        <?php if (isset($_SESSION)) {
                            echo $_SESSION['name'] . " " . $_SESSION["lastname"];
                        } else {
                            echo "Tu Usuario";
                        } ?>
                    </span>
                </div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr style="margin:0.1rem">
    <div class="offcanvas-body">
        <a href="./profile.php">
            <i class="bi bi-person"></i>
            Tu Perfil
        </a>
        <?php
        notificationOffcanvas();
        ?>
        <a href="./../help.php">
            <i class="bi bi-question-circle"></i>
            Ayuda
        </a>
        <a href="./../../php/signOut.php">
            <i class="bi bi-box-arrow-right"></i>
            Desconectar
        </a>

    </div>
</div>