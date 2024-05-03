<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "urbanedenbaza";

$connected = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName, 4306);

if(!$connected){
    die("Nije uspjelo spajanje");
}