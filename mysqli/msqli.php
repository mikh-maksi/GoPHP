<?php

$conn = new mysqli("localhost", "root", "", "newdb");
$conn->set_charset("utf8mb4");

$sql = "INSERT INTO users (name, email)
        VALUES ('Максимов Михайло', 'maksymov@karazin.ua')";

if ($conn->query($sql)) {
    echo "Запис додано!";
} else {
    echo "Помилка: " . $conn->error;
}

$conn->close();

?>