<?php
    // $f = fopen("log.txt", "w");
    $f = fopen("example.csv", "r");    
    $sum2 = 0;
    while($line = fgets($f)){
        // echo $line;
        $arr = explode(";", $line);
        echo $arr[1];
        $sum2+=$arr[1];
        echo "<br>";
    }
    echo "sum = $sum2"; 
    
    
    // $s = fgets($f);
    // $arr = explode(";", $s);
    // print_r($arr);

    // echo "<br>";

    // echo(count($arr));
    // echo "<br>";

    // echo($arr[5]);


    // echo "<br>";
    // echo fgets($f);
    // echo "<br>";
    // echo fgets($f);
    // echo "<br>";

    fclose($f);
?>