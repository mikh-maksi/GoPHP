<?php

$conn = new mysqli("localhost", "root", "", "newdb");

$sql = "SELECT id,name,email FROM users";

// Виконання запиту
$result = $conn->query($sql);

// Виведення результатів
echo $result->num_rows."<br>";

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] .", Ім'я: " . $row["name"] .", Вік: " . $row["email"] . "<br>";
    }

} else {
    echo "Записів не знайдено.";
}

?>