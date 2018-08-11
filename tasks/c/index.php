<?php
$input= fopen ("input.txt", "r");
$output = fopen("output.txt", "w");
$n = fgets($input, 999);
$k = fgets($input, 999);
$d = floor($k/$n);
fwrite ($output, $d);
 
fclose ($input);
fclose ($output);
?>