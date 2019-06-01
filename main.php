
<?php
$enlace = mysqli_connect("127.0.0.1", "root","", "segcost");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

 $username=htmlspecialchars($_GET["username"]);
$password=htmlspecialchars($_GET["password"]);

/*$username=htmlspecialchars($_GET["username"]);
$password=htmlspecialchars($_GET["password"]);
$username=htmlspecialchars($_GET["username"]);
$password=htmlspecialchars($_GET["password"]);*/

$consulta = "INSERT INTO users (User,Password) VALUES ('$username','$password');";
    // Crear una declaración 
    $stmt = $enlace->prepare($consulta);
 
// Añadimos una condicional para la insercion de registros	
if ($enlace->query($consulta) === TRUE) {
    echo "Nuevo registro creado";
} else {
    echo "Error: " . $consulta . "<br>" . $enlace->error;
}
mysqli_close($enlace);
?>