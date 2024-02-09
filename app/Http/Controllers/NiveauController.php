<?php

namespace App\Http\Controllers;

use App\Models\NiveauScolaire;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    public function index() 
    {
        return view('niveaux.list');
    }

    public function create()
    {
        return view('niveaux.create');
    }

    public function edit(NiveauScolaire $niveauScolaire)
    {
        return view('niveaux.edit', compact('niveauScolaire'));
    }
}
