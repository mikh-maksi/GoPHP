<?php
    include "config.php";
    include "connect.php";
    $id = $_GET["id"];

    if ($res = mysqli_query($link, 'SELECT * FROM indicators WHERE id = '.$id)) { 
        while( $row = mysqli_fetch_assoc($res) ){
           $name = $row['name'];
            if ($row['file']!== NULL){
                $fl = $row['file'];
            }else{$fl = NULL;}

            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $name; ?></title>
</head>
<body>
    <?php
        echo "<h2>".$name."</h2>";
        if ($fl !==NULL){
            include $fl.".php";
            echo "<a href = 'upload/csv/".$fl.".csv'>Скачать CSV</a>";
        }
    ?>
</body>
</html>