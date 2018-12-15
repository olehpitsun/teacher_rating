<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{
    public function login()
    {
      return view('authentication.login');
    }

    public function postLogin(Request $request)
    {
        //dd(Sentinel::authenticate($request->all()));

        try{
            if(Sentinel::authenticate($request->all()))
            {
                $slug = Sentinel::getUser()->roles()->first()->slug;
                //dd($slug);
                if($slug == 'admin')
                    return redirect('/earnings');

                elseif($slug == 'manager')
                    return redirect('/profile/' . Sentinel::getUser()->first_name);
            }else{


                return redirect()->back()->with(
                    ['error', 'Wrong credentials']
                );
            }

        }catch(ThrottlingException $e){

            $delay = $e->getDelay();

            return redirect()->back()->with(
                ['error', "Your are banned for $delay seconds"]
            );
            //dd(session("error"));
        }catch(NotActivatedException $e){
            return redirect()->back()->with(
                ['error', "Not activated"]
            );
        }



    }

    public function logout()
    {
        Sentinel::logout();

        return redirect('/login');
    }
}
