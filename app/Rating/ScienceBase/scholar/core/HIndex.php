<?php
/**
 * Created by PhpStorm.
 * User: Oleh
 * Date: 15.12.2018
 * Time: 18:36
 */

namespace App\Rating\ScienceBase\scholar\core;


class HIndex
{

    public static function getScholarHindex($href){
/*
        $html = file_get_contents($href);

        preg_match_all('~<td class=[\'"]?gsc_rsb_std["\']?>(.+?)<\/td>~is', $html, $w);

        return $w[1][2];*/
        return 4;
    }
}