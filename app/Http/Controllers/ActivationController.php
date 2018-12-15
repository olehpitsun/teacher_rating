<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Activation;
use Sentinel;

class ActivationController extends Controller
{
    public function activate($email, $activationCode)
    {
        $user = User::whereEmail($email)->first();
        $sentinelUser = Sentinel::findById($user->id);
        dd(Activation::complete($sentinelUser, $activationCode));
        if(Activation::complete($sentinelUser, $activationCode))
        {
            return redirect('/login');

        }else{

        }
    }
}
