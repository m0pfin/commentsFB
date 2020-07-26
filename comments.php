<?php
/**
 * Created by PhpStorm.
 * User: m0pfin
 * Date: 26.07.2020
 * Time: 06:53
 */


include 'includes/db.php';
include 'includes/connect.php';
include 'function/addComments.php';

if(isset($_POST['fp_id'])){

        // Выбираем рандомного автора
        $rand_author = $db->fetch('SELECT * FROM author WHERE status=\'0\' ORDER BY RAND() LIMIT 1');

        // Получаем данные из формы
        $proxy = $_POST['proxy'];
        $fp_id =  $_POST['fp_id'];
        $ad_id =  $_POST['ad_id'];
        $message =  $_POST['message'];
        $token = $rand_author['token'];
        $addComm = addComments($proxy, $fp_id, $ad_id, $message, $token, $curl); // публикуем комментарий

        if(isset($addComm['id'])){
            echo 'Комментарий добавлен: ' . $addComm['name'] . ' ' . $addComm['id'];
        }else{
           echo $addComm;
        }
}
