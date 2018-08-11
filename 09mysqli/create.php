<?php
    include ("config.php");
    include ("connect.php");

    if ($result = $mysqli->query("")) {
		echo "ok!";
	}
	else{
		echo $mysqli->error;
	}

?>