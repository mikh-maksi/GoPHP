<?php

include "config.php";
include "connect.php";
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

    $sql= "SELECT * FROM business_types";
    if($result= $mysqli->query($sql)){
        
    while( $row = mysqli_fetch_assoc($result) ){
        $name = $row['name'];
        echo $name;    
         }
        }else{
            echo $mysqli->error;
        }

  //  $sql = "INSERT INTO new (nm) VALUES (123)";
  //  $mysqli->query($sql);
    

  //  echo $mysqli->error;
    /*if (mysqli_query($mysqli, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    */
     
    $mysqli->close();
?>
