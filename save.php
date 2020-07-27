<?php
/**
 * Created by PhpStorm.
 * User: m0pfin
 * Date: 26.07.2020
 * Time: 04:39
 */
 ob_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include("includes/connect.php");
include("includes/db.php");
include("function/getInfo.php");


$cat = $_POST['cat'];
$cat_get = $_GET['cat'];
$act = $_POST['act'];
$act_get = $_GET['act'];
$id = $_POST['id'];
$id_get = $_GET['id'];


if($cat == "author" || $cat_get == "author"){
    $token = mysqli_real_escape_string($link,$_POST["token"]);
    $name = 'Данные не получены';
    $status = '0';

    /**
     * Получаем инфу об аккаунте
     */
    $proxy = $_POST['proxy'];

    $getUserInfo = getUserInfo($curl, $proxy, $token);

    if (isset($getUserInfo['id'])){
        $name = $getUserInfo['name'];
    }else{
        $status = '1';
    }



    if($act == "add"){
        mysqli_query($link, "INSERT INTO `author` (`name`, `token`, `status`) VALUES ( '".$name."' , '".$token."' , '".$status."') ");
        header("location:"."author.php?status=success&name=".$name."");
    }elseif ($act == "edit"){
        mysqli_query($link, "UPDATE `author` SET  `name`='" . $name . "',`token`='" . $token . "',`status`='" . $status . "'  WHERE `id` = '".$id."' ");
        header("location:"."author.php?status=update&name=".$name."");
    }elseif ($act_get == "delete"){
        mysqli_query($link, "DELETE FROM `author` WHERE id = '".$id_get."' ");
        header("location:"."author.php?status=delete&name=".$id_get."");
    }
    //header("location:"."cards.php?status=success&name=".$cardNumber."");
}
