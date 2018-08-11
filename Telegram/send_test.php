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
$name = "Max";
$tel = "+380631312876";

$to = "<адрес почты для получения заявок с сайта>"  ; 
$subject = "Заявка на заказ звонка менеджера"; 


$msg = "Тип заявки: {$subject}\nИмя: {$name}\nТелефон: {$tel}";

$token='513599391:AAFr6Lfub_QCI2tsCplInXNWlvHgIE7Qeyk';
$query = array('chat_id' => -237184857,'parse_mode' => 'HTML','text' => $msg);
echo $query;
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=utf-8\r\n";
$headers .= "From: mail@mail.com\r\n";

//https://api.telegram.org/bot610413501:AAHBuYC7wObtPTi7QUAzpBd61mrkLEB9AUg/sendMessage?chat_id=-448446756&parse_mode=HTML&text=texmessage
/*
https://api.telegram.org/bot610413501:AAHBuYC7wObtPTi7QUAzpBd61mrkLEB9AUg/sendMessage?chat_id=-448446756&parse_mode=HTML&text=texmessage

*/

print_r(http_build_query($query));
if($name and $tel){
	
	mail($to, $subject, $msg, $headers);
					
	file_get_contents(sprintf('https://api.telegram.org/bot610413501:AAHBuYC7wObtPTi7QUAzpBd61mrkLEB9AUg/sendMessage?chat_id=-285778108&parse_mode=HTML&text=texmessage'	));
	
}

?>

</div>
</body>
</html>

