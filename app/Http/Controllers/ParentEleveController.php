<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class ParentEleveController extends Controller
{
    public function index()
    {
        return view('parent_eleves.list');
    }

    public function create()
    {
        return view('parent_eleves.create');
    }

    public function edit(Family $parentEleve)
    {
        return view('parent_eleves.edit', compact('parentEleve'));
    }
}
