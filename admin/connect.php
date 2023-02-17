<?php

date_default_timezone_set('Europe/Lisbon');//or change to whatever timezone you want
$servername = "containers-us-west-34.railway.app";
$username = "root";
$password = "Up5m4MTxaA6ECn2mPgaI";
$dbname = "railway";
$port = "7811";
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Erro ao ligar DB" . mysqli_connect_error());
}



header('Access-Control-Allow-Methods: POST');


?>