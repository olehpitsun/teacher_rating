<?php
/**
 * Created by PhpStorm.
 * User: Oleh
 * Date: 15.12.2018
 * Time: 17:57
 */

namespace App\Rating\ScienceBase ;


interface IScienceBase {
    public function getHIndex($id);
    public function getSCBaseName();
}