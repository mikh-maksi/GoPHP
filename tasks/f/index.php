<?php
    $input= fopen ("input.txt", "r");
    $output = fopen("output.txt", "w");
    $a = fgets($input, 999);
    $c = $a%10;
    fwrite ($output, $c);
     
    fclose ($input);
    fclose ($output);
?>