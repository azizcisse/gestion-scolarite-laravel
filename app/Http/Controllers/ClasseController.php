<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index()
    {
        return view('classes.list');
    }

    public function create()
    {
        return view('classes.create');
    }

    public function edit(Classe $classeScolaire)
    {
        return view('classes.edit', compact('classeScolaire'));
    }


}
