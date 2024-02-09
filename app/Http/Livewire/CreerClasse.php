<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use Livewire\Component;
use App\Models\AnneeScolaire;
use App\Models\NiveauScolaire;

class CreerClasse extends Component
{
    public $nom_classe;
    public $niveau_scolaire_id;

    public function store(Classe $classe)
    {
        $this->validate([
            'niveau_scolaire_id' => 'string|required',
            'nom_classe' => 'string|required',
        ]);

        try {
            $classe->niveau_scolaire_id = $this->niveau_scolaire_id;
            $classe->nom_classe = $this->nom_classe;

            $classe->save();

            return redirect()->route('classes')->with('success', 'La Classe enregistrée avec succès.');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        // récuperer l'année dont le active = '1'
        $activeAnneeScolaire = AnneeScolaire::where('active', '1')->first();

        // Charger les niveaux qui appartiennent à l'année en cours
        $niveauActuelles = NiveauScolaire::where('annee_scolaire_id', $activeAnneeScolaire->id)->get();

        return view('livewire.creer-classe', compact('niveauActuelles'));
    }
}
