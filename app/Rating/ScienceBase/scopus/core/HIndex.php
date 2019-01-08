<?php
/**
 * Created by PhpStorm.
 * User: Oleh
 * Date: 15.12.2018
 * Time: 18:36
 */

namespace App\Rating\ScienceBase\scopus\core;

include './shd/simple_html_dom.php';

class HIndex
{

    public static function getScopusHindex($href){

        $html = file_get_html($href);
        //$d= mb_convert_encoding($html, 'utf-8', mb_detect_encoding($html));
        //$html = file_get_contents($href);
        /*
        dd($html);
        $links = array();
        preg_match_all('~<span class=[\'"]?spanItalic["\']?>(.+?)<\/span>~is', $html, $w);
        $links[] = $w;

        dd($links);*/

        return 3;
    }
}