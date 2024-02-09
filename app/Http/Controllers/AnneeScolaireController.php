<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnneeScolaireController extends Controller
{
    public function index()
    {
        return view('configurations.index');
    }

    public function create()
    {
        return view('configurations.create');
    }
}
