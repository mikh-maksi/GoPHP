<?php
    $input= fopen ("input.txt", "r"); //открывем файл input.txt на чтение и связываем его с переменной $input
    $output = fopen("output.txt", "w"); // //открывем файл output.txt на запись и связываем его с переменной $output

    $a = fgets($input, 999); //читаем первую строчку - она автоматически обрабатывается как число
    $b = fgets($input, 999); //читаем вторую строчку - она автоматически обрабатывается как число

    $c = floor($b/$a);
    echo $c;

    fwrite ($output, $c);  //выводим результат в файл, связанный с переменной $output
    
   
   fclose ($input);//закрываем файл, связанный с переменной $input
   fclose ($output);//закрываем файл, связанный с переменной $output
   ?>