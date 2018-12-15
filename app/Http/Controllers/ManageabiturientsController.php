<?php

namespace App\Http\Controllers;

use App\Mail\KiFound;
use Illuminate\Http\Request;
use App\Abiturients;
use Mail;

class ManageabiturientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$abiturients = Abiturients::paginate(100);
        $abiturients = Abiturients::latest()->paginate(100);
        //dd($abiturients);
        return view('manageabiturients.index', compact('abiturients'));
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
        //Log::info('This is some useful information.');
        $item = new Abiturients([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email'),
            'fathername'=> $request->get('fathername'),
            'phone'=> $request->get('phone'),
            'status'=> $request->get('status')
        ]);
        $create = Abiturients::create($request->all());

        //return response()->json($create);

        return Abiturients::create($request->all());
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
        Abiturients::destroy($id);
        return redirect('/manageabiturients');
    }

    /**
     * @param int $id - abiturient id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function incrementStatus($id)
    {
        $currentRating = Abiturients::findOrFail($id);


        $newRating = ++$currentRating->rating;
        $st['rating'] = $newRating;
        Abiturients::where('id', $id)->update($st);

        return redirect('/manageabiturients');
    }

    public function sendMail(Request $request)
    {
        $title = $request->get('title') ? $request->get('title') : '';
        $text = $request->get('text') ? $request->get('text') : '';

        $recipients = array();

        //dd($request->sendto);

        $recipients = explode(",", $request->sendto);


        Mail::to($recipients)->queue(new KiFound($title, $text));
        return redirect('/manageabiturients');

    }

}
