<?php
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
 
include ("config.php");
include ("connect.php");
 
$user = json_decode(file_get_contents('php://input'), true);
   

$REQ_ID = $user["id"];
//$REQ_ID = $_REQUEST["id"];
$iResult["id"]=0;
if ($result = $mysqli->query("SELECT * FROM new WHERE id=$REQ_ID LIMIT 10")) {
    while($row = $result->fetch_row() ){
      
       // array_push($stack, "apple", "raspberry");
        $iResult ["id"]   = $row[0];
        $iResult ["name"] = $row[1];
        $iResult ["age"]  = $row[2];
        $iResult ["avg"]  = $row[3];
    }
}

echo json_encode($iResult);


?>