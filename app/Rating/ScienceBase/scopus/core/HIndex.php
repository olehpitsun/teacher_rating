<?php
/**
 * Created by PhpStorm.
 * User: Oleh
 * Date: 15.12.2018
 * Time: 18:36
 */

namespace App\Rating\ScienceBase\scopus\core;
use Illuminate\Http\Request;

include './shd/simple_html_dom.php';

class HIndex
{
    public static function getScopusHindex($teacher_id){

        $request = Request::create('/api/scopus/'.$teacher_id, 'GET');
        $res = app()->handle($request);
        $responseBody = json_decode($res->getContent(), true);

        return $responseBody['scopus_index'];
    }
}