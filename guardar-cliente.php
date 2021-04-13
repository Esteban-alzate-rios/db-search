<?php
$id = $_REQUEST["id"];
$nombre = $_REQUEST["nombre"];
$edad = $_REQUEST["edad"];
$email = $_REQUEST["email"];

//1. conectar a la base de datos
$host = "localhost";
$dbname = "monster2";
$username = "root";
$password = "";

$cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//2. construir la sentencia sql
$sql = "INSERT INTO clientes (id, nombre, edad, email ) VALUES('$id', '$nombre', '$edad', '$email')";

//3.preparar sentencia sql
$q = $cnx->prepare($sql);

//4. ejecutar la sentencia sql

$result = $q->execute();

if ($result) {
    echo "Inscripcion creada correctamente";
} else {
    echo "hubo un error al inscribir el cliente";
}
?>
<br />
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
        <form action="lista-registro.php" method="GET">
            <input type="submit" value="Ir a tabla" >
        </form>
</body>

</html>