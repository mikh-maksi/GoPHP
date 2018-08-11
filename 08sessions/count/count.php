<?php 
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    if (!isset($_SESSION['count'])){
        $_SESSION['count']=0;
    }else{
        $_SESSION['count']++;
    }
    echo $_SESSION['count'];
?>
<br><a href="newcount.php">Обнулить счет</a>