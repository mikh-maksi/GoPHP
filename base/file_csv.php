<?php
    // $f = fopen("log.txt", "w");
    $f = fopen("example.csv", "r");    
    $s = fgets($f);
    $arr = explode(";", $s);
    print_r($arr);

    echo "<br>";

    echo(count($arr));
    echo "<br>";

    echo($arr[5]);


    // echo "<br>";
    // echo fgets($f);
    // echo "<br>";
    // echo fgets($f);
    // echo "<br>";

    fclose($f);
?>