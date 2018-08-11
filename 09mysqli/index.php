<?php
include ("config.php");
include ("connect.php");

/* Select queries return a resultset */
if ($result = $mysqli->query("SELECT * FROM new WHERE id>0 LIMIT 10")) {
    	

	while($row = $result->fetch_row() ){
		echo "<div class ='line'>".$row[0]." ".$row[1]." "." ".$row[2]." "." ".$row[3]." <a href='edit.php?id=".$row[0]." '>Редактировать</a><a href='del.php?id=".$row[0]." '>Удалить</a> ". "</div>";
	}
}

   ?>
   <a href = "add.php">Add line</a>
    