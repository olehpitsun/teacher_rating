<?php
/**
 * Created by PhpStorm.
 * User: Oleh
 * Date: 17.12.2018
 * Time: 19:51
 */

namespace App\Sort;

class Sort
{
    public static function sortBySCBase($arr, $smbase){

        for ($i=0; $i<sizeof($arr);$i++){
            for ($j=0;$j<sizeof($arr);$j++){
                if($arr[$i]->$smbase > $arr[$j]->$smbase){
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }
        return $arr;
    }
}