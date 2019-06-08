<?php
$newURL='hub.html';
$username=htmlspecialchars($_GET["username"]);
$password=md5(htmlspecialchars($_GET["password"]));
$repassword=md5(htmlspecialchars($_GET["repassword"]));
$email=htmlspecialchars($_GET["email"]);
$firstname=htmlspecialchars($_GET["firstname"]);
$lastname=htmlspecialchars($_GET["lastname"]);
if($password==$repassword){
include 'connectDB.php';
$consulta = "INSERT INTO users (User,Password,Email,Nombre,Apellido) VALUES ('$username','$password','$email','$firstname','$lastname');";
    // Crear una declaración 
    $stmt = $enlace->prepare($consulta);
 
// Añadimos una condicional para la insercion de registros	
if ($enlace->query($consulta) === TRUE) {
    				session_start();
					$_SESSION["logueado"] = TRUE;
					header("Location:".$newURL);
} else {
   Header("Location: index.html?error=registry");
}
mysqli_close($enlace);
}else{
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>