<?php
session_start();

/*podatci potrebni za spajanje na bazu*/
/*
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "urbanedenbaza";
*/

$hostName = "urban-eden-server.mysql.database.azure.com";
$dbUser = "ueAdmin";
$dbPassword = getenv("PASSWORD");
$dbName = "urbanedenbaza";
$sslmode="require";

$connected = mysqli_init();
mysqli_ssl_set($connected,NULL,NULL, "bazaExport/DigiCertGlobalRootCA.pem", NULL, NULL);
mysqli_real_connect($connected, $hostName, $dbUser, $dbPassword, $dbName, 3306, MYSQLI_CLIENT_SSL);


/*
$connected = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName, 4306);
*/
/*spajanje na bazu*/

/*spajanje nije uspjelo*/
if(!$connected){
    die("Nije uspjelo spajanje");
}
