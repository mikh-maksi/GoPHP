<?php
// Устанавливаем возможность отправлять ответ для любого домена
header('Access-Control-Allow-Origin: *');

if (version_compare(phpversion(), '5.3.0', '>=')  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE); 

// Получаем параметры 

include ("config.php");
include ("connect.php");

$id = $_REQUEST['id'];
$name = $_REQUEST['name'];
$age = $_REQUEST['age'];
$avg = $_REQUEST['avg'];
$a = $_REQUEST['a'];


// Выполняем вычисления
//$iResult = 0;
switch ($a) {
    case '1': //INPUT
    	$query = "INSERT INTO new (name,age,avg) VALUES ('$name', '$age', '$avg')";
    
        if ($result = $mysqli->query($query)) {
           $iResult = "ok";
        }
        else{
            $iResult = $mysqli->error;
        }
    
        break;
    case '2': //SELECT
        if (isset($_REQUEST["id"])){
            $REQ_ID = $_REQUEST["id"];
            if ($result = $mysqli->query("SELECT * FROM new WHERE id=$REQ_ID LIMIT 10")) {
                while($row = $result->fetch_row() ){
                  
                   // array_push($stack, "apple", "raspberry");
                    $iResult ["id"]   = $row[0];
                    $iResult ["name"] = $row[1];
                    $iResult ["age"]  = $row[2];
                    $iResult ["avg"]  = $row[3];
                }
            }
    
        }
        else{
            if ($result = $mysqli->query("SELECT * FROM new WHERE id>0 LIMIT 10")) {
                while($row = $result->fetch_row() ){
                    $res_id = $row[0];
                   // array_push($stack, "apple", "raspberry");
                    $iResult [$res_id]["id"] = $row[0];
                    $iResult [$res_id]["name"] = $row[1];
                    $iResult [$res_id]["age"] = $row[2];
                    $iResult [$res_id]["avg"] = $row[3];
                }
            }
        }
        break;
    case '3': //UPDATE
        if ($result = $mysqli->query("UPDATE new SET name = '$name', age = '$age', avg = '$avg' WHERE id=$id")) {
            $iResult = "ok";
        }
        else{
            $iResult = $mysqli->error;
        }

        break;
    case '4': //DELETE
    if ($result = $mysqli->query("DELETE FROM new WHERE id=$id")) {
        $iResult = "ok";
    }
    else{
        $iResult = $mysqli->error;
    }
    break;
}

// Подготавливаем массив результатов
$aResult = array(
    'result' => $iResult, 'name' => 'max'
);

if (isset($_REQUEST['readme'])){
    if ($_REQUEST['readme']==1){
      $aResult = array(
    'result' => 'Input: p1, p2. And sign -  a. a=1 - plus, a=2 - minus, a=3 - multiplication, a=4 - devide');  
}
}

// Генерируем результат
header('Content-type: application/json');
echo json_encode($aResult);