

<?php
 
 $servername = "us-cdbr-east-06.cleardb.net";
$username = "b8d07cb5cb4b1a";
$password = "25d4e42";
$dbname = "heroku_a5837ad8e3825b3";
$port = "3306";


 $RAW_SQL_QUERY="SELECT *, data_reserva as tstp FROM reserva_pessoa ORDER BY data_reserva";
 $mysqli = new mysqli($servername, $username, $password, $dbname, $port);

 $result = $mysqli->query($RAW_SQL_QUERY);

$rows = $result->fetch_all(MYSQLI_ASSOC);
$r = array();
foreach ($rows as $row) {
    $r[] = $row;
}

$arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
echo json_encode($arr);
 
 
 
 exit();
 