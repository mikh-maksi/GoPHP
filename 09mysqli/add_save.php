<?php
	include ("config.php");
	include ("connect.php");

	$name = $_GET['name'];
	$age = $_GET['age'];
	$avg = $_GET['avg'];

	$query = "INSERT INTO new (name,age,avg) VALUES ('$name', '$age', '$avg')";

	if ($result = $mysqli->query($query)) {
		echo $query;
		echo "ok!";
	}
	else{
		echo $mysqli->error;
	}
	echo "<a href = 'index.php'>To main page</a>";
?>