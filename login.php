<?php
$newURL='hub.html';

	if(isset($_POST["loginbtn"])) {
 
$enlace = mysqli_connect("remotemysql.com", "qRqbwVn75h","QNRV7W1eUM", "qRqbwVn75h", "3306");
 
			$loginNombre = $_POST["userlogin"];
			$loginPassword = md5($_POST["passlogin"]);
			$consulta = "SELECT * FROM users WHERE User='$loginNombre' AND Password='$loginPassword'";

			if($resultado = $enlace->query($consulta)) {
	
				while($row = $resultado->fetch_array()) {
 
					$userok = $row["User"];
					$passok = $row["Password"];
				}
				$resultado->close();
			}
			$enlace->close();
 
			if(isset($loginNombre) && isset($loginPassword)) {
 
				if($loginNombre == $userok && $loginPassword == $passok) {
 
					session_start();
					$_SESSION["logueado"] = TRUE;
					header("Location:".$newURL);
 
				}
				else {
					Header("Location: index.html?error=login");
				}
 
			}
 
		} else {
			header("Location: index.html");
		}
?>