<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
// print_r ($_GET);


$a = $_POST["a"];
$b = $_POST["b"];


$c = $a + $b;
// echo $c;

$arr["a"] = $a;
$arr["b"] = $b;
$arr["c"] = $c;

echo json_encode($arr);

?>
