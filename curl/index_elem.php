<?php
 
   $url = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";

   //setting the curl parameters.

$options = [
    "http" => [
        "header" => "User-Agent: MyApplication/1.0\r\n"
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

$data = json_decode($response, true);
$response = file_get_contents($url, false);

$data = json_decode($response, true);
print_r($data);
?>