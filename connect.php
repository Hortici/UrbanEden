<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "urbanedenbaza";

$connected = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if(!$connected){
    die("Nije uspjelo spajanje");
}

?>