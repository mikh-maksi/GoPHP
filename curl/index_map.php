<?php

$address = urlencode("Khreshchatyk 1, Kyiv");

$url = "https://nominatim.openstreetmap.org/search?q={$address}&format=jsonv2";

$options = [
    "http" => [
        "header" => "User-Agent: MyApplication/1.0\r\n"
    ]
];

$context = stream_context_create($options);

$response = file_get_contents($url, false, $context);

$data = json_decode($response, true);

if (!empty($data)) {
    echo "Latitude: " . $data[0]['lat'] . PHP_EOL;
    echo "Longitude: " . $data[0]['lon'] . PHP_EOL;
}



//   header('Access-Control-Allow-Origin: *');

// // генерируем результат
// header('Content-type: application/json');
// echo json_encode($array_data); //отримуємо json объект
?>