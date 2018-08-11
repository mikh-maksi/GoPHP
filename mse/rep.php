<?php
    //header('Content-Type: text/html; charset=utf-8');
    include "config.php";
    $mysqli = new mysqli($config['server'], $config['user'], $config['pass'], $config['db']);
    mysqli_set_charset ($mysqli,"utf8");
    $qv = $_REQUEST["qv"];
    $year = $_REQUEST["year"];
    $kved = $_REQUEST["kved"];
    $nEmpl = $_REQUEST["nEmpl"];
    $turnover = $_REQUEST["turnover"];
    $sql = "INSERT INTO `reportTurnover` ( `quarter`, `year`, `userId`, `value`) VALUES ( $qv, $year,1,$turnover)";
    if (!$result = $mysqli->query($sql)) { echo "Ошибка: " . $mysqli->error . "\n";   exit;    }

    
    $jsonOut = array('result' => '1');
    header('Content-type: application/json');
    echo json_encode($jsonOut);
?>