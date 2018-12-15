<?php
/**
 * Created by PhpStorm.
 * User: Oleh
 * Date: 15.12.2018
 * Time: 18:29
 */

namespace App\Rating\ScienceBase\scholar;


use App\Rating\ScienceBase\IScienceBase;
use App\Rating\ScienceBase\scholar\core\HIndex;
use App\Teachers;

class ScholarScienceBase implements IScienceBase
{

    private static $SCBaseName = "ScholarScienceBase";

    public function getHIndex($id)
    {
        $teachers = Teachers::where('id', $id)->first();

        return HIndex::getScholarHindex($teachers->scholar_href);
    }

    public function getSCBaseName()
    {
        return ScholarScienceBase::$SCBaseName;
    }
}