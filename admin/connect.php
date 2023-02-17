<?php

date_default_timezone_set('Europe/Lisbon');//or change to whatever timezone you want

$servername = "us-cdbr-east-05.cleardb.net";
$username = "b0627ec3151c38";
$password = "d3007f9c";
$dbname = "heroku_79cb75d0b123bc2";




$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Erro ao ligar DB" . mysqli_connect_error());
}



header('Access-Control-Allow-Methods: POST');


?>