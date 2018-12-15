<?php
/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 02.11.16
 * Time: 18:55
 */

ini_set('display_errors', 'Off');
require_once ( 'config.php' );
require_once ( './core/DB.php' );

$db = new DB();
$cont = $db->select ( 'users', '*');

//var_dump($cont);
for($i = 0; $i< sizeof($cont); $i++){
    echo $cont[$i]['id'] . ' ' . $cont[$i]['login'] . ' ' . $cont[$i]['password'] . ' ' . $cont[$i]['name'] . ' '
        . $cont[$i]['surname'] . ' ' . $cont[$i]['fathername'] . ' ' . $cont[$i]['email'] . ' ' . $cont[$i]['group']
        . ' ' . $cont[$i]['date'] . ' ' . $cont[$i]['activate'] . ' ' . $cont[$i]['last_ip'] . ' ' . $cont[$i]['activateCode']
        . ' ' . $cont[$i]['hash'] . "<br/>";
}

//user_m_reg