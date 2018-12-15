<?php

namespace App\Http\Controllers;

use Sentinel;
use Activation;
use Mail;
use App\User;
use App\Users;
use App\Manageuser;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManageusersController extends Controller
{
    public function index()
    {

        //$users = User::paginate(5);

        $users = User::select('users')
            ->join('activations', 'users.id', '=', 'activations.user_id')
            ->select('users.*', 'activations.completed as activations')
            ->paginate(50);

        //$posts = DB::table('posts')->get();
        //$posts = Post::whereLive(1)->get();
        //$posts = DB::table('posts')->whereLive(1)->get();
        //dd($posts) ;
        return view('manageusers.index', compact('users'));
    }

    public function create()
    {
        return view('authentication.register');
    }

    public function register()
    {
        return view('authentication.register');
    }

    public function postRegister(Request $request)
    {
        $user = Sentinel::register($request->all());
        $activation = Activation::create($user);

        $role = Sentinel::findRoleBySlug('manager');
        $role->users()->attach($user);
        //$this->sendEmail($user, $activation->code);

        return redirect('/manageusers');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::select('users')
            ->join('activations', 'users.id', '=', 'activations.user_id')
            ->select('users.*', 'activations.completed as completed', 'activations.id as activation_id')
            ->where('users.id', '=',  $id)
            ->paginate(1);

        return view('manageusers.edit', compact('users'));
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
        $users = Users::findOrFail($id);
        $users->update($request->all());

        // change active status of user
        $activations = Manageuser::findOrFail($request->activation_id);
        $activation_value = $request->completed == 'on' ? true : false;
        $activations->update(array_merge($request->all(), ['completed' => $activation_value]));

        return redirect('/manageusers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/manageusers');
    }

    public function restore($id)
    {
        $posts = User::findOrFail($id);
        $posts->restore();
    }
}
