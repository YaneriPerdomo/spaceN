<?php
function notificationHeader ()
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
            echo '<i class="bi bi-bell" style="position: absolute;  
            right: 20px; top: 5px;   color: white;"></i>';
        } else {
           
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $pdo = null;

}
?>

<header>
        <div class="d-flex  align-items-center">
            <a class="btn btn-primary offCanvasSpaceN" data-bs-toggle="offcanvas" href="#offCanvasSpaceN" role="button"
                aria-controls="offCanvasSpaceN">
                <img src="../../../img/burgerMenu.png" class="img-fluid burgerMenu" alt="">
            </a>
            <section class="logo">
                <figure class="m-0">
                <img src="./../../../img/logo/logo-imagen.png" class="heightLogo" alt="">
            </figure>
        </section>
        </div>
        <section class="userPerfil">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight"><img src="<?php $_SESSION["gender"] == "1" ? $gender = '../../../img/childs/boy.png' : $gender = '../../../img/childs/girl.png'; echo $gender ?>" class="img-fluid userImg"
                    alt="">
            </button>
        <?php notificationHeader();?>
        </section>
    </header>