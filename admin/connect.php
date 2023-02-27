<?php

date_default_timezone_set('Europe/Lisbon');//or change to whatever timezone you want
$servername = "us-cdbr-east-06.cleardb.net";
$username = "b8d07cb5cb4b1a";
$password = "25d4e42";
$dbname = "heroku_a5837ad8e3825b3";
$port = "3306";
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Erro ao ligar DB" . mysqli_connect_error());
}



header('Access-Control-Allow-Methods: POST');


?>