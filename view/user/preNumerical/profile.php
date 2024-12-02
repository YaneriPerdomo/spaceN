<?php 

include './../../../php/validations/authorizedChild.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil | :3</title>
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <link rel="stylesheet" href="../../../css/admin/components/offcanvas.css">
    <link rel="stylesheet" href="../../../css/admin/components/header.css">
    <link rel="stylesheet" href="../../../css/admin/components/semanticTag.css">
    <link rel="stylesheet" href="../../../css/admin/addAndModifyChild.css">

</head>
<body>
    
<?php include './../../include/user/header.php' ?>

    <main>
    <form action="">
    <div class="row">
                    <div class="col-4">
                        <label for="">Datos personales:</label><br>
                    </div>
                    <div class="col-8">
                        <label for="">Nombre<span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input type="text" 
                                name="name" 
                                class="form-control" 
                                readonly 
                                value="<?php echo $_SESSION['name'] ?? '' ?>"
                                placeholder="¿Como se llama tu niño/a? 🤔" 
                                aria-label="Username"
                                aria-describedby="basic-addon1"
                            >
                        </div>

                        <label for="">Apellido<span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input 
                                type="text" 
                                name="lastName" 
                                class="form-control"
                                value="<?php echo $_SESSION['lastname'] ?? '' ?>"
                                placeholder="¿Y cual es su apellido? 🤔" aria-label="Username"
                                aria-describedby="basic-addon1"
                                readonly    
                            >
                        </div>
                        <label for="">Fecha de nacimiento <span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="bi bi-calendar3-event"></i></span>
                            <input 
                                type="date" 
                                name="date" 
                                class="form-control" 
                                aria-label="Username"
                                readonly
                                value="<?php echo date('Y-m-d', strtotime($_SESSION["dateOfBirth"])) ?? '' ?>"
                                aria-describedby="basic-addon1">
                        </div>
                        <label for="">Genero<span>*</span></label><br>
                        <p class="d-flex gap-2 selectionGender">
                            <label for="M" data-checked="true">
                                <input type="radio" id="M" name="gender" value="1" ckecked>
                                <img src="../../../img/childs/boy.png" alt="" class="checked">
                            </label>
                            <label for="F">
                                <input type="radio" id="F" name="gender" value="2">
                                <img src="../../../img/childs/girl.png" alt="">
                            </label>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <label for="">Datos para la plataforma:</label><br>
                    </div>
                    <div class="col-8">
                        <label for="">Nombre de usuario<span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-person-workspace"></i></i>
                            </span>
                            <input 
                                type="text" 
                                name="user" 
                                class="form-control" 
                                placeholder="¡Oh 😲...!"
                                aria-label="Username"
                                value="<?php echo $_SESSION['user'] ?? '' ?>"
                                aria-describedby="basic-addon1">
                        </div>
                        <label for="">Nivel de acceso<span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-door-open"></i>
                            </span>
                            <input 
                                type="text" 
                                name="user" 
                                class="form-control" 
                                placeholder="¡Oh 😲...!"
                                aria-label="Username"
                                value="<?php 
                                        switch ($_SESSION["accessLevel"]) {
                                            case '1':
                                                echo 'Pre numerico';
                                                break;
                                            case '2':
                                                echo 'Numerico emergente';
                                                break;
                                            case '3':
                                                echo 'Desarrollo numerico';
                                                break;
                                            default:
                                                echo '';
                                                break;
                                        } 
                                        ?>"
                                        readonly
                                aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
    </form>
    </main>

    <?php include './../../include/admin/footer.php' ?>
    <?php include './../../include/user/offcanvasUser.php' ?>
    <?php include './../../include/user/offcanvasAplication.php' ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</html>