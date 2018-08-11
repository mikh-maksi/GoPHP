<?php
$input= fopen ("input.txt", "r");
$output = fopen("output.txt", "w");
$a = fgets($input, 999);
$a1 = $a+1;
$a2 = $a-1;
$c = "The next number for the number ".$a." is ".$a1.".\r\n";
$d = "The previous number for the number ".$a." is ".$a2.".\r\n";
fwrite ($output, $c);
fwrite ($output, $d);

fclose ($input);
fclose ($output);
?>