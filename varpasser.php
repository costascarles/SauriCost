<?php
$newURL='inbox.php?';
$table = $_GET["action"];

header("Location:".$newURL.$_SERVER['QUERY_STRING']);
 
?>