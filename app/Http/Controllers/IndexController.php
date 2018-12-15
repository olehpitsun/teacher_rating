<?php

namespace App\Http\Controllers;

include '/shd/simple_html_dom.php';

use App\Rating\ScienceBase\scholar\ScholarScienceBase;
use App\Rating\ScienceBase\scopus\ScopusScienceBase;
use Illuminate\Http\Request;
use App\Participants;
use App\News;
use App\Articles;
use App\Teachers;
use App\Entity\TeacherEntity;
use App\Rating\ScienceBase\Main;

class IndexController extends Controller
{
    public function index()
    {
        $participants = Participants::all();
        $news = News::all();
        $articles = Articles::orderBy('scholar', 'desc')->get();
        $teachers = Teachers::all();



        foreach ($teachers as $teacher) {

            $main = new Main();
            $main->add(new ScholarScienceBase());
            $main->add(new ScopusScienceBase());

            dd($main->calculateHIndex($teacher->id));
        }



        $html = file_get_html("https://scholar.google.com.ua/citations?user=szP0KhEAAAAJ&hl=uk");
        $d= mb_convert_encoding($html, 'utf-8', mb_detect_encoding($html));

        $links = array();

        preg_match_all('#<div\sid="gsc_prf_in">(.+?)</div>#su', $d, $q);
        $links[] = $q[1][0];

        preg_match_all('~<td class=[\'"]?gsc_rsb_std["\']?>(.+?)<\/td>~is', $d, $w);
        $links[] = $w[1][0];
        $links[] = $w[1][2];
        $links[] = $w[1][4];


        /*
        foreach($html->find('td[class="gsc_rsb_std"]') as $td) {
            $links[] = $td->innertext ;
        }

        foreach($html->find('div[id="gsc_prf_in"]') as $name) {
            $links[] = $name->innertex ;
        }
        */




        $scholar1 = array (
            "name"=>$links[0],
            "citation"=>$links[1],
            "h_index"=>$links[2],
            "h_10"=>$links[3],

        );
        $scholar2 = array (
            "name"=>$links[0],
            "citation"=>$links[1],
            "h_index"=>$links[2],
            "h_10"=>$links[3],

        );

        $scholars = array($scholar1, $scholar2);


        return view('index.index', compact('participants', 'news', 'articles', 'scholars'));
    }

    public function search(Request $request)
    {

        $error = ['error' => 'No results found, please try with different keywords.'];

        if($request->has('q')) {

            //dd($request->has('q'));
            //$posts = Articles::with()
            // Используем синтаксис Laravel Scout для поиска по таблице products.
            //$posts = Articles::all();

            $posts= Articles::where('text', 'LIKE', '%' .$request->get('q'). '%')->get();



            // Если есть результат есть, вернем его, если нет  - вернем сообщение об ошибке.
            return $posts->count() ? $posts : $error;

        }

        return $error;
    }

    public function abitur(Request $request)
    {

        $error = ['error' => 'No results found, please try with different keywords.'];

        //if($request->has('q')) {

            //dd($request->has('q'));
            //$posts = Articles::with()
            // Используем синтаксис Laravel Scout для поиска по таблице products.
            //$posts = Articles::all();

            $posts= Articles::where('text', 'LIKE', '%' .$request->get('q'). '%')->get();



            // Если есть результат есть, вернем его, если нет  - вернем сообщение об ошибке.
            return $posts->count() ? $posts : $error;

        //}

        //return $error;
    }
}
