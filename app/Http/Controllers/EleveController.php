<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    public function index()
    {
        return view('eleves.list'); 
    }
    
    public function create()
    {
        return view('eleves.create'); 
    }
  
    public function edit(Eleve $eleve)
    {
        return view('eleves.edit', compact('eleve')); 
    }
  
    public function show(Eleve $eleve)
    {
        return view('eleves.show', compact('eleve')); 
    }
}
