<?php
/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 29.01.18
 * Time: 19:47
 */

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Abiturients;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function index()
    {
        return Abiturients::all();
    }
    public function store(Request $request)
    {
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
    public function show($id)
    {
        return Abiturients::findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        Abiturients::findOrFail($id)->update($request->all());
        return Response::json($request->all()); //response()->json()
    }
    public function destroy($id)
    {
        return Abiturients::destroy($id);
    }
}