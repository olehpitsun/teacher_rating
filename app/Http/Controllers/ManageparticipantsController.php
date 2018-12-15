<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participants;

class ManageparticipantsController extends Controller
{
    public function index()
    {
        $participants = Participants::all();

        return view('manageparticipants.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manageparticipants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Participants::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'fathername' => $request->fathername,
            'degree' => $request->degree,
            'status' => $request->status,
            'scholar_href' => $request->scholar_href,
            'position' => $request->position,
            'articles' => $request->img,
            'mail' => $request->mail,
            'en_surname' => $request->en_surname,
            'en_name' => $request->en_name,
            'en_fathername' => $request->en_fathername,
            'en_degree' => $request->en_degree,
            'en_status' => $request->en_status,
        ]);
        return redirect('/manageparticipants');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participant = Participants::findOrFail($id);
        return view('manageparticipants.edit', compact('participant'));
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
        $participant = Participants::findOrFail($id);
        $participant->update($request->all());

        return redirect('/manageparticipants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Participants::destroy($id);

        return redirect('/manageparticipants');
    }

    public function restore($id)
    {
        $posts = Participants::findOrFail($id);
        $posts->restore();
        //        $posts->forceDelete();

    }
}
