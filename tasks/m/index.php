<?php
    $input= fopen ("input.txt", "r");
    $output = fopen("output.txt", "w");
    $a = fgets($input, 999);
    $b = fgets($input, 999);
    
    $k = $a;
    $a = $b;
    $b = $k;
    
    fwrite ($output, "$a $b");

    
    fclose ($input);
    fclose ($output);
?>