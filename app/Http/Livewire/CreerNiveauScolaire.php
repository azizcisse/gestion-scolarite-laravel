<?php

namespace App\Http\Livewire;

use App\Models\AnneeScolaire;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\NiveauScolaire;

class CreerNiveauScolaire extends Component
{
    public $code;
    public $libelle;
    public $montant_scolarite;

    public function store(NiveauScolaire $niveauScolaire)
    {
        $this->validate([
            'code' => 'string|required|unique:niveau_scolaires,code',
            'libelle' => 'string|required|unique:niveau_scolaires,libelle',
            'montant_scolarite' => 'string|required',
        ]);

        try {
            // récuperer l'année dont le active = '1'
            $activeAnneeScolaire = AnneeScolaire::where('active', '1')->first();

            $niveauScolaire->code = $this->code;
            $niveauScolaire->libelle = $this->libelle;
            $niveauScolaire->montant_scolarite = $this->montant_scolarite;
            $niveauScolaire->annee_scolaire_id = $activeAnneeScolaire->id;

            $niveauScolaire->save();

            return redirect()->route('niveaux')->with('success', 'Niveau Scolaire enregistrée avec succès.');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public function render()
    { 
        return view('livewire.creer-niveau-scolaire');
    }
}
