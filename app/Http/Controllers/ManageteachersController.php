<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teachers;

class ManageteachersController extends Controller
{
    public function index()
    {
        $teachers = Teachers::all();

        return view('manageteachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manageteachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Teachers::create([
            'fullname' => $request->fullname,
            'scholar_href' => $request->scholar_href,
            'scopus_href' => $request->scopus_href,
        ]);
        return redirect('/manageteachers');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teachers::findOrFail($id);
        return view('manageteachers.edit', compact('teacher'));
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
        $teacher = Teachers::findOrFail($id);
        $teacher->update($request->all());

        return redirect('/manageteachers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teachers::destroy($id);

        return redirect('/manageteachers');
    }
}
