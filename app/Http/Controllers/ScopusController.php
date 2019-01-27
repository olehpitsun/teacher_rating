<?php

namespace App\Http\Controllers;

use App\Scopus;

class ScopusController extends Controller
{
    public function index()
    {
        return Scopus::all();
    }

    public function show($id)
    {
        return Scopus::find($id);
    }
}
