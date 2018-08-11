<?php
     $mysqli = new mysqli('localhost', 'root', '', 'test2');
// Устанавливаем возможность отправлять ответ для любого домена
header('Access-Control-Allow-Origin: *');

if (version_compare(phpversion(), '5.3.0', '>=')  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE); 



// Получаем параметры POST
$verification = $_REQUEST['verification'];
$id = $_REQUEST['id'];

$sql = "UPDATE list SET verification = $verification WHERE id = $id";
if (!$result = $mysqli->query($sql)) { echo "Ошибка: " . $mysqli->error . "\n";   exit;    }

// Выполняем вычисления
$iResult = 0;

// Подготавливаем массив результатов
$aResult = array(
    'result' =>  $verification, 'id' => $id
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
    


?>