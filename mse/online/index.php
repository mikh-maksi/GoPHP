<?php
header('Content-Type: text/html; charset=utf-8');
include "config.php";
$mysqli = new mysqli($config['server'], $config['user'], $config['pass'], $config['db']);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <h2>Регистрация</h2>
        <table class = "table">
            <tr>
                <td>Название</td>
                <td><input type="text" id = "name"></td>
            </tr>
            <tr>
                <td>Организационная форма</td>
                <td>
                    <?php
                     $sql = "SELECT * FROM  business_types";
                     if (!$result = $mysqli->query($sql)) { echo "Ошибка: " . $mysqli->error . "\n";   exit;    }
                     echo "<select name = 'business_type'";
                     while ($row = $result->fetch_assoc()) {
                        printf ("<option value = %s>%s</option>", $row["id"], $row["name"]);
                    }
                    echo "</select>";
                    ?>        
                </td>
            </tr>
            <tr>
                <td>ІНН</td>
                <td><input type="text"></td>
            </tr>

            <tr>
                <td>КВЕД</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Кол-во сотрудников</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Оборот</td>
                <td><input type="text"></td>
            </tr>
        </table>
    </div>
</body>
</html>