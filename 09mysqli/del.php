<?php
	include ("config.php");
	include ("connect.php");
	$id = $_GET['id'];
	if ($result = $mysqli->query("DELETE FROM list WHERE id=$id")) {
    	echo "ok!";
	}
	else{
			echo $mysqli->error;
	}
	echo "<a href = 'main.php'>To main page</a>";
?>