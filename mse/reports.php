<?php
    header('Content-Type: text/html; charset=utf-8');
    include "config.php";
    $mysqli = new mysqli($config['server'], $config['user'], $config['pass'], $config['db']);
    mysqli_set_charset ($mysqli,"utf8");
?>
<!DOCTYPE html>
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
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
</head>
</head>
<body>
    <div class="wrapper text-center">
        <table class = "table">
    <?php
       $sql = "SELECT * FROM  reportTurnover WHERE userID = 1";
         if (!$result = $mysqli->query($sql)) { echo "Ошибка: " . $mysqli->error . "\n";   exit;    }
         while ($row = $result->fetch_assoc()) {
          printf ("<tr><td>%s | %s</td><td>%s</td></td>", $row["quarter"], $row["year"],$row["value"]);
                    }
                    ?>     
        </table>


        <table class = "wrapper table">
        <tr>
                <td>Отчетный период</td>
                <td><select name="qv" id="qv">
                    <option value="1">I</option>
                    <option value="2">II</option>
                    <option value="3">III</option>
                    <option value="4">IV</option>
                </select>
                <input type="text" value = 2018 id = "year">
            </td>
            
            <tr>
                <td>Оборот</td>
                <td><input type="text" value = "10000" id  = "turnover"></td>
            </tr>
        </table>
        <button id = "send">Send</button>
    </div>
    

              <script>
$('#send').on('click', function() {
    var qv_data = $('#qv').val();
    var year_data = $('#year').val();
    var kved_data = $('#kved').val();
    var nEmpl_data = $('#nEmpl').val();
    var turnover_data = $('#turnover').val();

    console.log(qv_data);
    console.log(year_data);
    console.log(kved_data);
    console.log(nEmpl_data);
    console.log(turnover_data);

    var form_data = new FormData();
  
    form_data.append('qv',qv_data);
    form_data.append('year',year_data);
    form_data.append('kved',kved_data);
    form_data.append('nEmpl',nEmpl_data);
    form_data.append('turnover',turnover_data);
    $.ajax({
                url: 'rep.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(php_script_response){
                    console.log(php_script_response);
                // var res = JSON.parse(php_script_response)
                  //  console.log(res);
                }
     });
});
    </script>
</body>
</html>