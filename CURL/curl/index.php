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
  
   $url = "http://localhost/curl/json_out/";
   $url = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";
   $url = "https://api.livecoin.net/exchange/ticker?currencyPair=BTC/USD";
  /*Отправка данных на сервер*/
  //setting the curl parameters.
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url); //Задаем адрес для обращения.
  // Following line is compulsary to add as it is:
 // curl_setopt($ch, CURLOPT_POSTFIELDS, $input_xml); //
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
header('Content-type: application/json');
echo json_encode($array_data); //Получается json объект
?>