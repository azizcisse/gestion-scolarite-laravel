<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FraisScolarite;

class FraisController extends Controller
{
    public function index()
    {
        return view('frais_scolarites.index'); 
    }
    
    public function create()
    {
        return view('frais_scolarites.create'); 
    }
  
    public function edit(FraisScolarite $fraisScolarite)
    {
        return view('frais_scolarites.edit', compact('fraisScolarite')); 
    }
  
    public function show(FraisScolarite $fraisScolarite)
    {
        return view('frais_scolarites.show', compact('fraisScolarite')); 
    }
}
