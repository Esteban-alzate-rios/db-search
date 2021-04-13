<?php
$where = '';
$marca = "";
$modelo = "";
$placa = "";
if (isset($_REQUEST["marca"]) || isset($_REQUEST["modelo"]) || isset($_REQUEST["placa"])) {
    $filtro = $_REQUEST["filtro"];
    if (isset($_REQUEST["marca"]) ) {
        $marca = $_REQUEST["marca"];
        if ($marca != "") {
            if ($where == "") {
                $where = "WHERE a.marca = '$marca'";
            } else {
                $where = "$where $filtro a.marca = '$marca'";
            }
        }
    }
    if (isset($_REQUEST["modelo"]) ) {
        $modelo = $_REQUEST["modelo"];
        if ($modelo != "") {
            if ($where == "") {
                $where = "WHERE a.modelo = '$modelo'";
            } else {
                $where = "$where $filtro a.modelo = '$modelo'";
            }
        }
    }
    if (isset($_REQUEST["placa"]) ) {
        $placa = $_REQUEST["placa"];
        if ($placa != "") {
            if ($where == "") {
                $where = "WHERE a.placa = '$placa'";
            } else {
                $where = "$where $filtro a.placa = '$placa'";
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
$sql = "SELECT  a.marca, a.modelo, a.placa, a.valor FROM autos AS a $where ORDER BY a.marca ASC";

//3.preparar sentencia sql
$q = $cnx->prepare($sql);

//4. ejecutar la sentencia sql

$result = $q->execute();

$autos = $q->fetchAll(); 
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
                    <a class="nav-link " href="./lista-registro.php">Tabla</a>
                    <a class="nav-link active" href="#">Tabla autos</a>
                   
                </div>
            </div>
        </div>
    </nav>
<h3>Lista de Registros</h3>

<form action="lista-auto.php" method="GET">
            <p>Filtrar búsqueda por:</p>
            Marca:
            <select name="marca">
                <option value="" <?php echo ($marca == "") ? 'selected' : '' ?>>Seleccione...</option>
                <option value="BMW" <?php echo ($marca == 1 && $marca != "") ? 'selected' : '' ?>>BMW</option>
                <option value="Mercedes Benz" <?php echo ($marca == 2 && $marca != "") ? 'selected' : '' ?>>Mercedes Benz</option>
                <option value="Renault" <?php echo ($marca == 3 && $marca != "") ? 'selected' : '' ?>>Renault</option>
                <option value="Toyota" <?php echo ($marca == 4 && $marca != "") ? 'selected' : '' ?>>Toyota</option>
                <option value="Chevrolet" <?php echo ($marca == 5 && $marca != "") ? 'selected' : '' ?>>Chevrolet</option>
                <option value="Ssangyong" <?php echo ($marca == 6 && $marca != "") ? 'selected' : '' ?>>Ssangyong</option>
                <option value="Ford" <?php echo ($marca == 6 && $marca != "") ? 'selected' : '' ?>>Ford</option>
            </select>
            Modelo:
            <input placeholder="modelo..." min="1900" max="2021" type="number" name="modelo">
            Placa:
            <input placeholder="placa..." type="text" name="placa"> <br />
            <br/><br/>
            <button type="submit" name="filtro" value="AND">Todos </button>
            <button type="submit" name="filtro" value="OR">Filtro especifico</button>
            <br/><br/>
        </form>
        <table class="table">
            <thead>
                <tr>
                
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <?php
            for ($i = 0; $i < count($autos); $i++) {
            ?>
                <tbody>
                    <tr>
                        
                        <td><?php echo $autos[$i]["marca"] ?></td>
                        <td><?php echo $autos[$i]["modelo"] ?></td>
                        <td><?php echo $autos[$i]["placa"] ?></td>
                        <td><?php echo $autos[$i]["valor"] ?></td>
                        
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
    
    
</body>
</html>