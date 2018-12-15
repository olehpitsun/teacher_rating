<?php
/**
 * Created by PhpStorm.
 * User: Oleh
 * Date: 15.12.2018
 * Time: 18:40
 */

namespace App\Rating\ScienceBase\scopus;

use App\Rating\ScienceBase\IScienceBase;
use App\Rating\ScienceBase\scopus\core\HIndex;

class ScopusScienceBase implements IScienceBase
{
    private static $SCBaseName = "ScopusScienceBase";


    public function getHIndex($href)
    {
        return HIndex::getScopusHindex($href);
    }

    public function getSCBaseName()
    {
        return ScopusScienceBase::$SCBaseName;
    }
}