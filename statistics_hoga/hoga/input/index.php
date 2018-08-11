<?php
    $mysqlip = mysqli_connect('levelhst.mysql.ukraine.com.ua','levelhst_hogast','levelhst_hogast','qch9eqbd');

    $mysqli = new mysqli('levelhst.mysql.ukraine.com.ua','levelhst_hogast','levelhst_hogast','qch9eqbd');

$result = $mysqli->query("SELECT * FROM param_groups");
    echo  $mysqli->error;
   $row = $result->fetch_array(MYSQLI_ASSOC);
   echo $row['id'];

print_r( $row);
echo "123";

$mysqli->close();

?>