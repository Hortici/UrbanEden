<?php

/*Podatci koji su potrebni za spajanje na bazu podataka*/
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "urbanedenbaza";

/*Spajanje na bazu podataka*/
$connected = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName, 4306);

/*Spajanje nije uspjelo*/
if(!$connected){
    die("Nije uspjelo spajanje");
}