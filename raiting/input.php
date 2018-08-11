<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
</head>
<body>
<?php
    echo "<br>";
    $mysqli = new mysqli('localhost', 'root', '', 'test2');
    if (!$mysqli->set_charset("utf8")) {
        printf("Ошибка при загрузке набора символов utf8: %s\n", $mysqli->error);
        exit();
    } else {
        printf("Текущий набор символов: %s\n", $mysqli->character_set_name());
    }
    $sql = "SELECT * FROM faculties";
    if (!$result = $mysqli->query($sql)) { echo "Ошибка: " . $mysqli->error . "\n";   exit;    }
    echo "<select>";
    while ($row = $result->fetch_assoc()) {
        echo "<option>".$row['name']."</option>";
    }    
    echo "</select>";
    echo "<br>";
    ?>


<input type="text" id = "name" name = "name" placeolder = "name">
    <input type="text" id = "number" name = "number" placeolder = "number">
    <input id="sortpicture" type="file" name="sortpic" />
    <button id="upload">Upload</button>
    <script>
$('#upload').on('click', function() {
    var file_data = $('#sortpicture').prop('files')[0];
    var name_data = $('#name').val();
    var number_data = $('#number').val();
    var id_data = $('#sortpicture').prop('files')[0];
    var form_data = new FormData();
    console.log( name_data);
    form_data.append('file', file_data);
    form_data.append('name',name_data);
    form_data.append('number',number_data);
    console.log(form_data);
    $.ajax({
                url: 'upload.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(php_script_response){
                    console.log(php_script_response);
                }
     });
});
    </script>
</body>
</html>