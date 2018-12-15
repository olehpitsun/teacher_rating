<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;

class ManagearticlesController extends Controller
{
    public function index()
    {
        $articles = Articles::all();

        return view('managearticles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('managearticles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Articles::create([
            'text' => $request->text,
            //'en_text' => $request->en_text,
            'href' => $request->href,
            //'year_id' => $request->year_id,
        ]);
        return redirect('/managearticles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Articles::findOrFail($id);
        return view('managearticles.edit', compact('articles'));
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
        $article = Articles::findOrFail($id);
        $article->update($request->all());

        return redirect('/managearticles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Articles::destroy($id);

        return redirect('/managearticles');
    }
}
