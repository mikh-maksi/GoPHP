<?php

$conn = new mysqli("localhost", "root", "", "newdb");

$conn->query("INSERT INTO users (name, email) VALUES ('Максимов Михайло', 'maksymov@karazin.ua')");

$conn->close();

?>