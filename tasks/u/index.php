<?php
    $input= fopen ("input.txt", "r");
    $output = fopen("output.txt", "w");
    $a = fgets($input, 999);
    $b = fgets($input, 999);
    $c1 = $a-$b;
   echo  gmp_sign('-500');
    echo $s;
    $c =  floor(($a+$b+($a-$b)) / 2) ;
    

    fwrite ($output, "$c");

    
    fclose ($input);
    fclose ($output);
?>