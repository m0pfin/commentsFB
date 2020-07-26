<?php
/**
 * Created by PhpStorm.
 * User: m0pfin
 * Date: 26.07.2020
 * Time: 04:07
 */

/**
 * Статус запущенных кампаний
 * @param $status - статус кампании/адсета/объявления
 * @return string
 */
function status ($status){
    if ($status == 0){
        return '<span class="badge badge-success">Активный</span>';
    }
    else{
        return '<span class="badge badge-danger">Ошибка токена</span>';
    }
}