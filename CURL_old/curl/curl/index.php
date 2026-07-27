<?php
/*
$data = '<oper>cmt</oper><wait>20</wait><test>1</test><payment id="'.$ordern.'"><prop name="b_card_or_acc" value="'.$b_card_or_acc.'" /><prop name="amt" value="'.$amt.'" /><prop name="ccy" value="UAH" /><prop name="details" value="'.$details.'" /></payment>';  
  $password= '';
  $signature=sha1(md5($data.$password)); 
  $merchant =   '<merchant><id></id><signature>'.$signature.'</signature></merchant>';

  $input_xml = '<?xml version="1.0" encoding="UTF-8"?><request version="1.0">'.$merchant.'<data>'.$data.'</data></request>';
  */
  //echo $input_xml;
  // $url = "https://api.privatbank.ua/p24api/pay_pb";
  
  
 
   $url = "https://api.livecoin.net/exchange/ticker?currencyPair=BTC/USD";
  // $url = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";
   //$url = "http://localhost/curl/json_out/";
  /*Отправка данных на сервер*/
  //setting the curl parameters.
  
  // Following line is compulsary to add as it is:
 // curl_setopt($ch, CURLOPT_POSTFIELDS, $input_xml); //

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url); //Задаем адрес для обращения.
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
  $data = curl_exec($ch);
  curl_close($ch);

  $array_data = json_decode($data);

  header('Access-Control-Allow-Origin: *');

if (version_compare(phpversion(), '5.3.0', '>=')  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE); 


// генерируем результат
//header('Content-type: application/json');
//echo json_encode($array_data); //Получается json объект
print_r($array_data);
   echo $array_data->cur ."<br>";
   echo $array_data->symbol ."<br>";
   echo $array_data->last ."<br>";
   echo $array_data->high ."<br>";
   echo $array_data->low ."<br>";
   echo $array_data->volume ."<br>";
   echo $array_data->vwap ."<br>";
   echo $array_data->max_bid ."<br>";
   echo $array_data->min_ask ."<br>";
   echo $array_data->best_bid ."<br>";
   echo $array_data->best_ask ."<br>";
  
   $mysqli = new mysqli('levelhst.mysql.tools', 'levelhst_curl', '2qvkmty6', 'levelhst_curl');

   // О нет!! переменная connect_errno существует, а это значит, что соединение не было успешным!
   if ($mysqli->connect_errno) {   echo "Извините, возникла проблема на сайте";
        echo "Ошибка: Не удалсь создать соединение с базой MySQL и вот почему: \n";
       echo "Номер_ошибки: " . $mysqli->connect_errno . "\n";
       echo "Ошибка: " . $mysqli->connect_error . "\n";
       exit;
   }
   $sql = "INSERT INTO list (cur,symbol,last,high,low,volume,vwap,max_bid,min_ask,best_bid,best_ask) VALUES ('$array_data->cur','$array_data->symbol',$array_data->last,$array_data->high,$array_data->low,$array_data->volume,$array_data->vwap,$array_data->max_bid,$array_data->min_ask,$array_data->best_bid,$array_data->best_ask) ";
   if (!$result = $mysqli->query($sql)) { echo "Ошибка: " . $mysqli->error . "\n";   exit;    }
 

?>