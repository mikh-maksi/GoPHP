<?php
//Варинты вывод строк и числовых переменных в них:
$a = 1;
$b = 2;

echo "This a is ".$a.". And this b is".$b; //Числа вставляются в строку через "." - оператор конкатенации (соединения строк)
echo "This a is $a. And this b is $b"; //Числа вставляются в строку через без оператора конкатенации (работает медленнее)

?>