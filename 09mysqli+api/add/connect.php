<?php

$mysqli = new mysqli($mysql['server'], $mysql['name'], $mysql['pass'], $mysql['db']);

/* check connection */ 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
