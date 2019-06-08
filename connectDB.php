<?php

$enlace = mysqli_connect("remotemysql.com", "qRqbwVn75h","QNRV7W1eUM", "qRqbwVn75h", "3306");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

?>