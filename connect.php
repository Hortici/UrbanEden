<?php

session_start();



/*Spajanje na Azure serverbazu*/

$hostName = "urban-eden-server.mysql.database.azure.com";
$dbUser = "ueAdmin";
$dbPassword = "theUrbanAd123";
$dbName = "urbanedenbaza";
$sslmode="require";

$connected = mysqli_init();
mysqli_ssl_set($connected,NULL,NULL, "bazaExport/DigiCertGlobalRootCA.pem", NULL, NULL);
mysqli_real_connect($connected, $hostName, $dbUser, $dbPassword, $dbName, 3306, MYSQLI_CLIENT_SSL);


/*podatci potrebni za spajanje na bazu*/
/*
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "12345";
$dbName = "urbanedenbaza";

$connected = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName, 3306);
*/
/*spajanje na bazu*/


/*spajanje nije uspjelo*/
if(!$connected){
    die("Nije uspjelo spajanje");
}
