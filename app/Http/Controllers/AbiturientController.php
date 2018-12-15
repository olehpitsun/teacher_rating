<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abiturients;
use App\Articles;

class AbiturientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abiturients = Abiturients::paginate(10);

        return view('abiturients.index', compact('abiturients'));
    }

    public function search(Request $request)
    {

        $error = ['error' => 'No results found, please try with different keywords.'];



            //dd($request->has('q'));
            //$posts = Articles::with()
            // Используем синтаксис Laravel Scout для поиска по таблице products.
            //$posts = Articles::all();

            $posts= Articles::paginate(10);



            // Если есть результат есть, вернем его, если нет  - вернем сообщение об ошибке.
            return $posts->count() ? $posts : $error;



        //return $error;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //exit();

        //$abiturients = $request->all();

        $user = new Abiturients;
        $user-> fill($request->all());
        $user->save();

        return view('abiturients.index', compact('abiturients'));


        //if($request->has('q')) {

            //dd($request->has('q'));
            //$posts = Articles::with()
            // Используем синтаксис Laravel Scout для поиска по таблице products.
            //$posts = Articles::all();

            //$posts= Articles::where('text', 'LIKE', '%' .$request->get('q'). '%')->get();



            // Если есть результат есть, вернем его, если нет  - вернем сообщение об ошибке.
            //return $posts->count() ? $posts : $error;

        //}

        //return $request;
    }


    public function add(Request $request)
    {

        $error = ['error' => 'No results found, please try with different keywords.'];



        return $error;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
