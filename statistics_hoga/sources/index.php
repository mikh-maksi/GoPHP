<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<?php
    include "config.php";
    include "connect.php";

    if ($res = mysqli_query($link, 'SELECT * FROM spheres')) { 
        /* Выборка результатов запроса */ 
        while( $row = mysqli_fetch_assoc($res) ){
            echo "<h2>".$row['name']."</h2>";
      

    echo "<table class = 'table'>";
if ($result = mysqli_query($link, 'SELECT * FROM indicators WHERE sphere_id = '.$row['id'].' AND parent_id = 0')) { 
    /* Выборка результатов запроса */ 
    while( $rw = mysqli_fetch_assoc($result) ){
        echo "<tr><td><a href = page.php?id=".$rw["id"].">".$rw['name']."</a></td></tr>";
        if ($rslt = mysqli_query($link, 'SELECT * FROM indicators WHERE sphere_id = '.$row['id'].' AND parent_id = '.$rw['id'])) { 
            /* Выборка результатов запроса */ 
            while( $r = mysqli_fetch_assoc($rslt) ){
                echo "<tr><td><a href = page.php?id=".$r["id"]."> - ".$r['name']."</a></td></tr>";
        
        
                
            } 
        }
        

        
    } 
    echo "</table>";
    /* Освобождаем используемую память */ 
 //   mysqli_free_result($result); 
} 

        }}
/* Закрываем соединение */ 
mysqli_close($link); 
?>


    


</body>
</html>