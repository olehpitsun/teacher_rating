<?php

namespace App\Http\Controllers;

use App\Rating\ScienceBase\scholar\ScholarScienceBase;
use App\Rating\ScienceBase\scopus\ScopusScienceBase;
use Illuminate\Http\Request;
use App\Articles;
use App\Teachers;
use App\Entity\TeacherEntity;
use App\Rating\ScienceBase\Main;
use App\Sort\Sort;

class IndexController extends Controller
{

    public function index()
    {
        $teachersInfo = $this->getTeachers();
        $teachersInfo = Sort::sortBySCBase($teachersInfo, "scholar_h_index");

        return view('index.index', compact('teachersInfo'));
    }

    public function store(Request $request){
        $teachersInfo = $this->getTeachers();
        $teachersInfo = Sort::sortBySCBase($teachersInfo, $request->smbase);

        return view('index.index', compact('teachersInfo'));
    }

    public function getTeachers(){
        $error = ['error' => 'No results found, please try with different keywords.'];

            $teachers = Teachers::all();
            $teachersInfo = array();

            foreach ($teachers as $teacher) {

                $main = new Main();
                $main->add(new ScholarScienceBase());
                $main->add(new ScopusScienceBase());

                $main->calculateHIndex($teacher->id);

                $teachersEntity = new TeacherEntity($teacher->fullname, $teacher->image);
                $teachersEntity->setScholarHIndex($main->getScholar());
                $teachersEntity->setScopusHIndex($main->getScopus());

                array_push($teachersInfo, $teachersEntity);
            }

        return $teachersInfo;
    }
}
