<?php

//podatci potrebni za spajanje na bazu
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "urbanedenbaza";

//spajanje na bazu
$connected = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName, 4306);

//spajanje nije uspjelo
if(!$connected){
    die("Nije uspjelo spajanje");
}