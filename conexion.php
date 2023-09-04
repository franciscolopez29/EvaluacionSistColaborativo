<?php
$server = "localhost";
$user = "root";
$pass = "";
$db   ="nombre del proyecto"


$conexion = mysql_connect ($server, $user, $pass, $db)? print('conectado :)'):print('error :('); 

?>
