<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    include "config.php";
    include "connect.php";
    $id = $_GET["id"];

    if ($res = mysqli_query($link, 'SELECT * FROM indicators WHERE id = '.$id)) { 
        while( $row = mysqli_fetch_assoc($res) ){
            echo "<h2>".$row['name']."</h2>";

            }
        }
    ?>
</body>
</html>