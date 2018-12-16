<?php
/**
 * Created by PhpStorm.
 * User: Oleh
 * Date: 15.12.2018
 * Time: 17:56
 */

namespace App\Rating\ScienceBase;
use App\Rating\ScienceBase\IScienceBase;

class Main {

    public $science_base = array();
    public $scholar_h_index = 0;
    public $scopus_h_index ;

    public function add(IScienceBase $IScienceBase){
        array_push($this->science_base, $IScienceBase);
    }

    public function calculateHIndex($id){

        foreach ($this->science_base as $sbase) {

            $Hvalue = $this->getHIndex($id, $sbase);

            if($sbase->getSCBaseName() == "ScholarScienceBase"){
                $this->scholar_h_index = $Hvalue;
            }

            if($sbase->getSCBaseName() == "ScopusScienceBase"){
                $this->scopus_h_index = $Hvalue;
            }
        }

        //return "Scholar = " . $this->scholar_h_index  . " Scopus = " . $this->scopus_h_index;
    }

    public function getHIndex($id, $IScienceBase)
    {
        return $IScienceBase->getHIndex($id);
    }

    public function getScholar(){
        return $this->scholar_h_index;
    }

    public function getScopus(){
        return $this->scopus_h_index;
    }
}