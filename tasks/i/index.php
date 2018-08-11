<?php
    $input= fopen ("input.txt", "r");
    $output = fopen("output.txt", "w");
    $a = fgets($input, 999);
    $a1 = $a%10;
    $a2 = floor($a/10)%10;
    $a3 = floor($a/100)%10;
    $b = $a1+$a2+$a3;
    fwrite ($output, $b);
     
    fclose ($input);
    fclose ($output);
?>