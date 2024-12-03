<header style="height: 71px">
        <a class="btn btn-primary offCanvasSpaceN" data-bs-toggle="offcanvas" href="#offCanvasSpaceN" role="button"
            aria-controls="offCanvasSpaceN">
            <img src="../../../img/burgerMenu.png" class="img-fluid burgerMenu" alt="">
        </a>
        <section class="logo">
            <figure>
                <img src="" alt="">
            </figure>
        </section>
        <section class="userPerfil">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight"><img src="<?php $_SESSION["gender"] == "1" ? $gender = '../../../img/childs/boy.png' : $gender = '../../../img/childs/girl.png'; echo $gender ?>" class="img-fluid userImg"
                    alt="">
            </button>
        </section>
    </header>