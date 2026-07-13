<?php
    $a = $_GET["a"];
    $b = $_GET["b"];
    echo "a = $a, b = $b";

    // $f = fopen("log.txt", "w");
    $f = fopen("log.txt", "a+");    
    fwrite($f,"a = $a, b = $b\n");
    fclose($f);
?>