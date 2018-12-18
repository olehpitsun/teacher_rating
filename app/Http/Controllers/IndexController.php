<?php

namespace App\Http\Controllers;

include '/shd/simple_html_dom.php';

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
        $teachers = Teachers::all();
        $teachersInfo = array();

        foreach ($teachers as $teacher) {

            $main = new Main();
            $main->add(new ScholarScienceBase());
            $main->add(new ScopusScienceBase());

            $main->calculateHIndex($teacher->id);

            $teachersEntity = new TeacherEntity($teacher->fullname);
            $teachersEntity->setScholarHIndex($main->getScholar());
            $teachersEntity->setScopusHIndex($main->getScopus());

            array_push($teachersInfo, $teachersEntity);
        }

        $teachersInfo = Sort::sortByScholar($teachersInfo);

        return view('index.index', compact('teachersInfo'));
    }

    public function sortByHIndex(Request $request){
        $error = ['error' => 'No results found, please try with different keywords.'];

        dd($request);
        if($request->has('q')) {
            $teachers = Teachers::all();
            $teachersInfo = array();

            foreach ($teachers as $teacher) {

                $main = new Main();
                $main->add(new ScholarScienceBase());
                $main->add(new ScopusScienceBase());

                $main->calculateHIndex($teacher->id);

                $teachersEntity = new TeacherEntity($teacher->fullname);
                $teachersEntity->setScholarHIndex($main->getScholar());
                $teachersEntity->setScopusHIndex($main->getScopus());

                array_push($teachersInfo, $teachersEntity);
            }

            $teachersInfo = Sort::sortByScholar($teachersInfo);

            //$posts= Articles::where('text', 'LIKE', '%' .$request->get('q'). '%')->get();
            return $teachersInfo;
        }
        return $error;
    }


    public function search(Request $request)
    {

        $error = ['error' => 'No results found, please try with different keywords.'];

        if($request->has('q')) {
            $posts= Articles::where('text', 'LIKE', '%' .$request->get('q'). '%')->get();
            return $posts->count() ? $posts : $error;
        }
        return $error;
    }

    public function abitur(Request $request)
    {
        $error = ['error' => 'No results found, please try with different keywords.'];
        $posts= Articles::where('text', 'LIKE', '%' .$request->get('q'). '%')->get();
        return $posts->count() ? $posts : $error;
    }
}
