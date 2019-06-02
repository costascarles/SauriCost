<?php
$newURL='hub.html';

	if(isset($_POST["loginbtn"])) {
 
		$enlace = mysqli_connect("127.0.0.1", "root","", "segcost");
 
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