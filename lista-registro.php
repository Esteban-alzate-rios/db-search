<?php
$where = '';
$identificación = "";
$nombre = "";
$edad = "";

if (isset($_REQUEST["id"]) || isset($_REQUEST["nombre"]) || isset($_REQUEST["edad"])) {
    $filtro = $_REQUEST["filtro"];
    if (isset($_REQUEST["id"]) ) {
        $identificación = $_REQUEST["id"];
        if ($identificación != "") {
            if ($where == "") {
                $where = "WHERE c.id = '$identificación'";
            } else {
                $where = "$where $filtro c.id = '$identificación'";
            }
        }
    }
    if (isset($_REQUEST["nombre"]) ) {
        $nombre = $_REQUEST["nombre"];
        if ($nombre != "") {
            if ($where == "") {
                $where = "WHERE c.nombre = '$nombre'";
            } else {
                $where = "$where $filtro c.nombre = '$nombre'";
            }
        }
    }
    if (isset($_REQUEST["edad"]) ) {
        $edad = $_REQUEST["edad"];
        if ($edad != "") {
            if ($where == "") {
                $where = "WHERE c.edad = '$edad'";
            } else {
                $where = "$where $filtro c.edad = '$edad'";
            }
        }
    }
}
//1. conectar a la base de datos
$host = "localhost";
$dbname = "monster2";
$username = "root";
$password = "";

$cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//2. construir la sentencia sql
$sql = "SELECT c.id, c.nombre, c.edad, c.email FROM clientes AS c $where ORDER BY c.nombre ASC";

//3.preparar sentencia sql
$q = $cnx->prepare($sql);

//4. ejecutar la sentencia sql

$result = $q->execute();

$clientes = $q->fetchAll(); 
?>

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
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MONSTER</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link " href="./crear-clientes.php">Crear clientes</a>
                    <a class="nav-link active" href="#">Tabla</a>
                    <a class="nav-link " href="./lista-auto.php">Tabla autos</a>
                </div>
            </div>
        </div>
    </nav>
<h3>Lista de Registros</h3>

<form action="lista-registro.php" method="GET">
            <p>Filtrar búsqueda por:</p>

            Identificación:
            <input name="id" type="text">
            Nombre:
            <input placeholder="nombre..." min="1900" max="2021" type="text" name="nombre">
            Edad:
            <input placeholder="edad..." min="0" type="number" name="edad"> <br />
            <br/><br/>
            <button type="submit" name="filtro" value="AND">Todos </button>
            <button type="submit" name="filtro" value="OR">Filtro especifico</button>
            <br/><br/>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Identificación</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Email</th>
                    
                </tr>
            </thead>
            <?php
            for ($i = 0; $i < count($clientes); $i++) {
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $clientes[$i]["id"] ?></td>
                        <td><?php echo $clientes[$i]["nombre"] ?></td>
                        <td><?php echo $clientes[$i]["edad"] ?></td>
                        <td><?php echo $clientes[$i]["email"] ?></td>
                        
                        
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
    
    
</body>
</html>