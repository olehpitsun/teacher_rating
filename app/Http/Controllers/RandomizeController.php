<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abiturients;
use App\Randomize;

class RandomizeController extends Controller
{
    public function index()
    {
        $standart_date = date('Y-m-d', strtotime('-1 days'));
        $abiturients = Abiturients::where('created_at', '>' , $standart_date)->get();

        //dd(count($abiturients));

        return view('/randomize.index', compact('abiturients'));
    }

    public function store(Request $request){

        //dd($request->datepicker);
        if($request->has('datepicker')) {

            $abiturientsq = Abiturients::where('created_at', '>', $request->datepicker)->get();

            //dd($abiturients);
            $v = array();

            foreach ($abiturientsq as $a){

                array_push($v, $a->name);
            }

            $abiturients = array();

            if(count($v)>2) {
                $pick = rand(2, count($v)-1);
                $random_keys = array_rand($v, 2);
                //dd($v[$abiturients[0]]);
                foreach ($random_keys as $key) {
                    array_push($abiturients, $v[$key]);
                }

            }else if(count($v)==2){

                $random = mt_rand(0, count($v) - 1);
                array_push($abiturients, $v[$random]);

            }else if(count($v)==1){

                array_push($abiturients, $v[0]);

            }

            return view('randomize.index', compact('abiturients'));
        }

        return redirect('/randomize');
    }


    public function randomize_cleare(){

        $abiturients = [];
        return view('randomize.index', compact('abiturients'));
    }
}
