

<?php
 
 $servername = "containers-us-west-34.railway.app";
 $username = "root";
 $password = "Up5m4MTxaA6ECn2mPgaI";
 $dbname = "railway";
 $port = "7811";


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
 