<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Trocas</title>
</head>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MONSTER</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="#">Crear clientes</a>
                    <a class="nav-link" href="./lista-registro.php">Tabla</a>
                    <a class="nav-link" href="./lista-auto.php">Tabla autos</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="jumbotron">
        <h1 class="display-4">Monster</h1>
    </div>
    <div class="container">
        <form class="card-body" action="guardar-cliente.php" method="POST">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="txtId">ID:</label>
                    <input class="form-control" id="txtId" required="true" type="text" name="id">

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="txtNombre">Nombre:</label>
                    <input class="form-control" id="txtNombre" required="true" type="text" name="nombre">

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="numEdad">Edad:</label>
                    <input min="18" max="90" class="form-control" id="numEdad" required="true" type="number" name="edad">

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="txtEmail">Email:</label>
                    <input class="form-control" id="txtEmail" type="text" name="email">

                </div>
            </div>

            <input type="submit" value="Guardar cliente">
        </form>
    </div>


</body>

</html>