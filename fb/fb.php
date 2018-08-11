<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>Аутентификация через Facebook</title>
</head>
<body>

<?php

$client_id = '1940853426180899'; // Client ID
$client_secret = '625a7556edcb6df1d63285fe72452846'; // Client secret
$redirect_uri = 'http://new-level.kh.ua/fb.php'; // Redirect URIs

$url = 'https://www.facebook.com/dialog/oauth';

$params = array(
    'client_id'     => $client_id,
    'redirect_uri'  => $redirect_uri,
    'response_type' => 'code',
    'scope'         => 'public_profile,email,user_birthday'
);

echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через Facebook</a></p>';

if (isset($_GET['code'])) {
    $result = false;

    $params = array(
        'client_id'     => $client_id,
        'redirect_uri'  => $redirect_uri,
        'client_secret' => $client_secret,
        'code'          => $_GET['code']
    );

    $url = 'https://graph.facebook.com/oauth/access_token';

    $tokenInfo = null;
    parse_str(file_get_contents($url . '?' . http_build_query($params)), $tokenInfo);

    if (count($tokenInfo) > 0 && isset($tokenInfo['access_token'])) {
        $params = array('access_token' => $tokenInfo['access_token']);

        $userInfo = json_decode(file_get_contents('https://graph.facebook.com/me' . '?' . urldecode(http_build_query($params))), true);

        if (isset($userInfo['id'])) {
            $userInfo = $userInfo;
            $result = true;
        }
    }

    if ($result) {
        echo "Социальный ID пользователя: " . $userInfo['id'] . '<br />';
        echo "Имя пользователя: " . $userInfo['name'] . '<br />';
        echo "Email: " . $userInfo['email'] . '<br />';
        echo "Ссылка на профиль пользователя: " . $userInfo['link'] . '<br />';
        echo "Пол пользователя: " . $userInfo['gender'] . '<br />';
        echo "ДР: " . $userInfo['birthday'] . '<br />';
        echo '<img src="http://graph.facebook.com/' . $userInfo['username'] . '/picture?type=large" />'; echo "<br />";
    }

}
?>

</body>
</html>