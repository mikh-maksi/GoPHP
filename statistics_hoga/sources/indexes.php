<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    
<?php
    include "config.php";
    include "connect.php";

    $year = 2009;
    $month = 1;
    $type = 1;
    echo "<table class = 'table  table-striped table-bordered table-hover table-sm'>";
    echo "<tr><th></th>";
    $sql = "SELECT name FROM indexesSpheres";
            
    if ($res = mysqli_query($link, $sql)    ) { } else {echo "Error: " . $sql . "<br>" . $link->error;}
    while( $row = mysqli_fetch_row($res) ){
        foreach($row as $key =>$value)
        echo "<th>".$value."</th>";
    }



    for ($year =2009;$year<=2017;$year++){
        echo "<tr><td colspan = 15 class='table-info text-center' >".$year."</td>";
        for ($month = 1;$month<=12;$month++){
            echo "<tr>";
            $sql = "SELECT name FROM intervals WHERE id = $month";
            if ($res = mysqli_query($link, $sql)    ) { } else {echo "Error: " . $sql . "<br>" . $link->error;}
            while( $row = mysqli_fetch_row($res) ){
                foreach($row as $key =>$value)
                echo "<td class = 'interval'>".$value."</td>";
            }


            for ($type = 1;$type<=14;$type++){
            $sql = "SELECT value FROM indexes WHERE year = $year AND month = $month AND type = $type";
            
        if ($res = mysqli_query($link, $sql)    ) { } else {echo "Error: " . $sql . "<br>" . $link->error;}
        while( $row = mysqli_fetch_row($res) ){
            foreach($row as $key =>$value)
            echo "<td class = 'text-center'>".$value."</td>";
        }
    }
    }
    }
    echo "</table>";
mysqli_close($link); 
?>

</body>
</html>
