 



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espacio N | Pagina principal </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#main">Espacio N</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li>Contacto</li>

                    </ul>
                    <form class="d-flex" role="search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <form action="./../php/profileAdministrator.php" class="" method="POST">
                <label for="usuario">Usuario</label><br>
                <input type="text" name="user" />
                <br>
                <label for="">Nombre</label><br>
                <input type="text" name="name" />
                <br>
                <label for="apellido">Apellido</label><br>
                <input type="text" name="lastName" />
                <label for="correo">Correo Electronico</label><br>
                <input name="main" type="text" />
                <br>
                <label for="cargo">Cargo Profesional</label><br>
                <select name="professionalPosition">
                    <option value="1">Maestra</option>
                    <option value="2">Terapeuta</option>
                </select>
                <br>
                <label for="center">Nombre del Centro escolar o profesional</label><br>
                <input type="text" name="center">
                <input type="password" name="password" id="">
                <input type="submit" value="Crea una cuenta">
        </form>
    </main>
    <footer class="w-100 ">
        <div class="mt-3 text-center">
            <img src="./img/nube.png" class="img-fluid" alt="">
        </div>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

</body>

</html>