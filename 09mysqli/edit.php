<?php
	include ("config.php");
	include ("connect.php");
	$id = $_GET['id'];
	if ($result = $mysqli->query("SELECT * FROM new WHERE id=$id")) {
    	

	while($row = $result->fetch_row() ){
		echo "<div class ='line'><form action = 'save.php'>";
		echo "<input type = 'hidden' value = '".$row[0]."' name = 'id'>"	;
		echo "<div><span>Name: </span><input type = 'text' value = '".$row[1]."' name ='name'></div>";
		echo "<div><span>Age: </span><input type = 'text' value = '".$row[2]."' name = 'age'></div>";
		echo "<div><span>Average ball:</span><input type = 'text' value = '".$row[3]."' name = 'avg'></div>";
		echo "<input type ='submit' value = 'send'></form>";
		echo "</div>";
		//' <input ".$row[1]." "." ".$row[2]." "." ".$row[3]." <a href='edit.php?id=".$row[0]." '>Редактировать</a> ". "</div>";
	}
}
?>