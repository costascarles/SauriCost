<?php

$enlace = mysqli_connect("remotemysql.com", "qRqbwVn75h","QNRV7W1eUM", "qRqbwVn75h", "3306");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

 $username=htmlspecialchars($_GET["username"]);
$password=md5(htmlspecialchars($_GET["password"]));
$repassword=md5(htmlspecialchars($_GET["repassword"]));
$email=htmlspecialchars($_GET["email"]);
$firstname=htmlspecialchars($_GET["firstname"]);
$lastname=htmlspecialchars($_GET["lastname"]);

$consulta = "INSERT INTO users (User,Password,Email,Nombre,Apellido,FechaNacimiento,Sexo,Dni,Direccion,Ciudad,CodigoPostal,Pais) VALUES ('$username','$password','$email','$firstname','$lastname',now(),'Poco','dniTest','caca','pene','69','l');";
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