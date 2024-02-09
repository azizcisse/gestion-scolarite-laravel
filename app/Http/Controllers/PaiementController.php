<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function index()
    {
        return view('paiements.index');
    }

    public function create()
    {
        return view('paiements.create');
    }

    public function edit(Paiement $paiement)
    {
        return view('paiements.edit', compact('paiement'));
    }
}
