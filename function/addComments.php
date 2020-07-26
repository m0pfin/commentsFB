<?php
/**
 * Created by PhpStorm.
 * User: m0pfin
 * Date: 26.07.2020
 * Time: 06:10
 */
require __DIR__ . '/../vendor/autoload.php';

use \Curl\Curl;
$curl = new Curl();

function addComments ($proxy, $fp_id, $ad_id, $message, $token, $curl){

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
     * Данные для отправки коммента
     */

    $data = array(
        'message' => $message,
        'access_token' => $token,
    );

    $curl->setDefaultJsonDecoder($assoc = true);
    $curl->setHeader('Content-Type', 'application/x-www-form-urlencoded');
    $curl->post('https://graph.facebook.com/v6.0/'.$fp_id .'_'. $ad_id .'/comments', $data);


    $result = $curl->response;

    if (isset($result['error']['message'])){ // Проверяем есть ли ошибка
        return "<font color='red'>Ошибка добавления комментария: </font> " . $result['error']['message'] . '<br>' . $result['error']['error_user_msg'];
    } elseif ($curl->error) {
        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    } else {


        $response = json_decode(json_encode($curl->response),true); // преобразование строки в формате json в ассоциативный массив
        $comment_id = $response; //['id']; // получаем id комментария
        return $comment_id; // Получаем ID созданного комментария
    }
}

//$proxy = '';
//$fp_id = '103451934797518';
//$ad_id = '103452838130761';
//$message = '';
//$token = '';
//
//$addComm = addComments($proxy, $fp_id, $ad_id, $message, $token, $curl);
//
//echo $addComm['id'];