<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
    $mysqli = new mysqli('localhost', 'root', '', 'test2');
    $sql = "SELECT * FROM list";
    if (!$result = $mysqli->query($sql)) { echo "Ошибка: " . $mysqli->error . "\n";   exit;    }

    while ($row = $result->fetch_assoc()) {
        echo $row['name'] . ' ' . $row['number'].'<img src = "uploads/'.$row['file']. '" height = 200px>';
        if ($row['verification']==0){$btn1 = "red";}else {$btn1 = "green";}
        if ($row['originals']==0){$btn2 = "red";}else {$btn2 = "green";}
        echo "<button id = 'btn".$row['id']."' idlist ='".$row['id']."' verif ='".$row['verification']."'class = 'verif btn $btn1'>Верификация</button><button id = 'btn2' class = 'btn $btn2'>Оригиналы</button>";

    }    
    ?>
    <script>
        var verif = document.getElementsByClassName('verif');
       
        console.log(verif);
       
        for(var i=0;i<verif.length;i++){
            verif[i].addEventListener("click", ver);
        }

        function ver(){
            var idver = this.getAttribute("idlist");
            var verifstatus = this.getAttribute("verif");
            console.log(verifstatus);
            send(idver, verifstatus);
        }

        //btn1.addEventListener("click",fbtn1);
        id = btn1.getAttribute("idlist");
        

        function send (idlist,ver){
            if (ver ==0) {v = 1;}
            else {v = 0;}

            url = "accept.php?id="+idlist+"&verification="+v;
            console.log(url);
   fetch(url, {metod: "get"})
  .then((response) => {
    let json = response.json();
    if (response.status >= 200 && response.status < 300) {
      return json;
    }
    else {
      return error;
    }
  }).then((json) => {
    console.log('json = ', json);

    for(var i=0;i<verif.length;i++){
            var v = verif[i].getAttribute("idlist");
            console.log(v);
            var clr;
            if (json.result == 0) clr = "red";
            else clr = "green";
            if (v==json.id){
                var str = "verif btn "+clr;
                console.log(str);
                verif[i].setAttribute("class",str);
                verif[i].setAttribute("verif",json.result);
            }
        }

    console.log(json.result);
    let obj = "";
    console.log('is obj = ', typeof json);
  })
  .catch(function(error) {
    console.log('Fetch Error :-S', error);
  });
        }
        
        function fbtn1(){
            console.log("OK");
    url = "accept.php?id="+id+"&verification=1";
   fetch(url, {metod: "get"})
  .then((response) => {
    let json = response.json();
    if (response.status >= 200 && response.status < 300) {
      return json;
    }
    else {
      return error;
    }
  }).then((json) => {
    console.log('json = ', json);
    let obj = "";
    console.log('is obj = ', typeof json);
  })
  .catch(function(error) {
    console.log('Fetch Error :-S', error);
  });
        }
    </script>
</body>
</html>

