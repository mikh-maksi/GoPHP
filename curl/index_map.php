<?php
 
   $url = "https://nominatim.openstreetmap.org/search?q=Khreshchatyk+1,+Kyiv&format=jsonv2";

   //setting the curl parameters.
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);   
  
  $data = curl_exec($ch);


  curl_close($ch);

  $array_data = json_decode($data);

  header('Access-Control-Allow-Origin: *');

// генерируем результат
header('Content-type: application/json');
echo json_encode($array_data); //отримуємо json объект
?>