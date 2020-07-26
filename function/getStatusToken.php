<?php
/**
 * Created by PhpStorm.
 * User: m0pfin
 * Date: 26.07.2020
 * Time: 00:33
 */

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


include '../includes/db.php';
include '../includes/connect.php';
include '../function/getInfo.php';

if(isset($_GET['reload_author'])){
    //
    $getAllAuthor = $db->query('SELECT * FROM  author');

    foreach ($getAllAuthor as $getAllAuthors){

        /**
         * Получаем инфу об аккаунте
         */
        $proxy = ''; // Сюда ваши прокси http - 192.168.0.1:8017:login:pass
        $token = $getAllAuthors['token'];

        $getUserInfo = getUserInfo($curl, $proxy, $token);

        if (isset($getUserInfo['id'])){
            $name = $getUserInfo['name'];
            $status = '0';

            $db->execute('UPDATE `author` SET `name`="'. $name .'",`status`="'. $status .'" WHERE id="'. $getAllAuthors['id'] .'"');
        }else{
            $status = '1';
            $db->execute('UPDATE `author` SET `status`="'. $status .'" WHERE id="'. $getAllAuthors['id'] .'"');
        }
        header("location:"."../author.php?status=update");
    }
}