
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <div class="d-flex">
            <div class="d-flex">
                <img src="<?php $_SESSION["gender"] == "1" ? $gender = '../../../img/childs/boy.png' : $gender = '../../../img/childs/girl.png'; echo $gender ?>" class="img-fluid userImg" alt="">
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
        <a href="./../help.php">
            <i class="bi bi-question-circle"></i>
            Ayuda
        </a>
        <a  href="./../../php/signOut.php">
            <i class="bi bi-box-arrow-right"></i>
            Desconectar
        </a>

    </div>
</div>