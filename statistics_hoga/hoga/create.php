<?php
    $conn = mysqli_connect('levelhst.mysql.ukraine.com.ua','levelhst_hogast','levelhst_hogast','qch9eqbd'); // стандартное подключение к БД, у каждого свои параметры

    $sqlfile = 'sql/sql_create.sql'; // файл который нужно загрузить
    if (!file_exists($sqlfile));
    $open_file = fopen ($sqlfile, "r");
    $buf = fread($open_file, filesize($sqlfile));
    fclose ($open_file);

    $a = 0;

    while ($b = strpos($buf,";",$a+1)){
    $i++;
    $a = substr($buf,$a+1,$b-$a);
    $ret = mysqli_query($conn,$a);
    echo $a." -->".mysqli_error($conn). ". <br><br>";
    $a = $b;
    }

    echo 'Загружено таблиц:'.$i;
?>