<?php
    // $f = fopen("log.txt", "w");
    $f = fopen("log.txt", "a+");    
    fwrite($f,"Hello\n");
    fclose($f);
?>