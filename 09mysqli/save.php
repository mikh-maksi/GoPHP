<?php
	include ("config.php");
	include ("connect.php");

	$id = $_GET['id'];
	$name = $_GET['name'];
	$age = $_GET['age'];
	$avg = $_GET['avg'];

	if ($result = $mysqli->query("UPDATE new SET name = '$name', age = '$age', avg = '$avg' WHERE id=$id")) {
		echo "ok!";
	}
	else{
		echo $mysqli->error;
	}
	echo "<a href = 'index.php'>To main page</a>";
?>