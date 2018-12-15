<?php
/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 25.06.16
 * Time: 20:09
 */


$request_post = $_POST['request']; // request имя параметра при POST запросе
$post_request = $_POST['request'][1]; // если поле массив, то можем указать индекс сразу
// или работать с $post_request как с массивом далее


$data = json_decode($_POST['request']);
echo $data->test1;              // параметр test1
