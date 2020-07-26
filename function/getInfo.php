<?php
/**
 * Created by PhpStorm.
 * User: m0pfin
 * Date: 26.07.2020
 * Time: 01:48
 */

require __DIR__ . '/../vendor/autoload.php';

use \Curl\Curl;
$curl = new Curl();

/**
 * Получаем инфу соц аккаунта
 * @param $curl - CURL класс
 * @param $proxy - данные с прокси
 * @param $token - Токен Ads Manager
 * @return $user_id - Возвращает ID юзера
 */

function getUserInfo($curl, $proxy, $token){

    /**
     * Прокси
     */

    $row = explode(':', $proxy);

    $ip = $row[0]; // ip
    $port = $row[1]; // port
    $login = $row[2]; //login
    $pass = $row[3]; //pass


    $curl->setProxy($ip, $port, $login, $pass);
    $curl->setProxyTunnel();

    /**
     * Получаем User ID
     */

    $curl->get('https://graph.facebook.com/v7.0/me?fields=id,name', array(
        'access_token' => $token,
    ));

    $result = $curl->response;

    if (isset($result->error->message)) { // Проверяем есть ли ошибка
        return "<font color='red'>Ошибка получения информации страницы: </font>" . $result->error->message;
    }
    elseif ($curl->error) {
        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    } else {
        //  var_dump($curl->response);
        $response = json_decode(json_encode($curl->response),true); // преобразование строки в формате json в ассоциативный массив
        $user_info = $response['id']; // id соц.акка
        return $response;
    }
}

//$proxy = '';
//$token = '';
//
//$getUserInfo = getUserInfo($curl, $proxy, $token);
//
//if (isset($getUserInfo['id'])){
//    echo $getUserInfo['name'];
//}
//else {
//    echo $getUserInfo;
//}
