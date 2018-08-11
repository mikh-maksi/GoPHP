<?php
     $mysqli = new mysqli('localhost', 'root', '', 'test2');

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
        $fname = $_FILES['file']['name'];
        $name = $_POST["name"];
        $number = $_POST["number"];
        $fcsv = fopen("text.csv", "a"); // Открываем файл в режиме записи 
        $textOut = $_POST["name"]." ".$_POST["number"];
        $test = fwrite($fcsv, $textOut); 
        if (!$test) echo 'Ошибка при записи в файл.';
        fclose($fcsv);
        
        $sql = "INSERT INTO list (name,number,file) VALUES ('$name',$number,'$fname') ";
        if (!$result = $mysqli->query($sql)) { echo "Ошибка: " . $mysqli->error . "\n";   exit;    }
    




    }


?>