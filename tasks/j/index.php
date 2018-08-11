<?php
    $input= fopen ("input.txt", "r");
    $output = fopen("output.txt", "w");
    $a = fgets($input, 999);
    $b = $a+(2-$a%2);// если число четное. т.е. $a%2 = 0, то добавляем 2, если нечетное, то добавляем 1
    fwrite ($output, $b);
     
    fclose ($input);
    fclose ($output);
?>