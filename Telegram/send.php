<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
<body>
    

<?php

if(isset($_POST['name'])){$name = $_POST['name'];}

if(isset($_POST['tel'])){$tel = $_POST['tel'];}

$to = "<адрес почты для получения заявок с сайта>"  ; 
$subject = "Заявка на заказ звонка менеджера"; 


$msg = "Тип заявки: {$subject}\nИмя: {$name}\nТелефон: {$tel}";

$token='513599391:AAFr6Lfub_QCI2tsCplInXNWlvHgIE7Qeyk';
$query = array('chat_id' => -237184857,'parse_mode' => 'HTML','text' => $msg);

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=utf-8\r\n";
$headers .= "From: mail@mail.com\r\n";
print_r($query);
if($name and $tel){
	
	mail($to, $subject, $msg, $headers);
					
	file_get_contents(sprintf('https://api.telegram.org/bot%s/sendMessage?%s', $token, http_build_query($query)
							 
	));
	
}

?>
<script>
    function AjaxFormRequest(result_id,formMain,url) {
                jQuery.ajax({
                    url:     url,
                    type:     "POST",
                    dataType: "html",
                    data: jQuery("#"+formMain).serialize(), 
                    success: function(response) {
                   // document.getElementById(result_id).innerHTML = response;
                   console.log(response);
                },
                error: function(response) {
                    console.log(response);
                //document.getElementById(result_id).innerHTML = "<p>Заявка не отправлена. Пожалуйста повторите.</p>";
                }
             });
 
             $(':input','#formMain')
 				.not(':button, :submit, :reset, :hidden')
 				.val('')
 				.removeAttr('checked')
 				.removeAttr('selected');
    }
</script>

<div class="wrapper">
   <div class="form">
       
    <form method="post" action="" id="formMain" name="formMain">
        <input id="name" type="text" name="name" placeholder="Введите ваше имя" maxlength="30" autocomplete="off" required/>
        <input id="telephone" type="Tel" name="tel" placeholder="Введите ваш телефон" maxlength="30" autocomplete="off" required/>
        <input id="button" type="button" name="button" value="Заказать обратный звонок" onclick="AjaxFormRequest('messegeResult', 'formMain', 'sendnew.php')"/>
    </form>
   </div>
</div>
</body>
</html>

