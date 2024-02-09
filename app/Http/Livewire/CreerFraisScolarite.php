<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AnneeScolaire;
use App\Models\FraisScolarite;
use App\Models\NiveauScolaire;

class CreerFraisScolarite extends Component
{
    public $niveau_scolaire_id;
    public $montant;

    public $error;
    public $haveError = false;
    public $success;
    public $haveSuccess = false;

    public function store(FraisScolarite $fraisScolarite)
    {
        // récuperer l'année dont le active = '1'
        $activeAnneeScolaire = AnneeScolaire::where('active', '1')->first();

        $this->validate([
            'montant' => 'integer|required',
            'niveau_scolaire_id' => 'string|required',
        ]);

        // Condition pour éviter les doublons
        $query = FraisScolarite::where('niveau_scolaire_id', $this->niveau_scolaire_id)
        ->where('annee_scolaire_id', $activeAnneeScolaire->id)->get();

        if (count($query) < 1) {
            try {
                $fraisScolarite->niveau_scolaire_id = $this->niveau_scolaire_id;
                $fraisScolarite->annee_scolaire_id = $activeAnneeScolaire->id;
                $fraisScolarite->montant = $this->montant;

                $fraisScolarite->save();

                return redirect()->route('frais_scolarites')->with('success', 'Le Montant de la Scolarité a été enregistrée avec succès.');
            } catch (\Throwable $th) {
                //throw $th;
            }
        } else {
           $this->error = 'La Scolarité de ce Niveau est déjà enregistrée; Veuillez la modifiée si Necessaire';
        }
    }

    public function render()
    {
        // Charger les niveaux qui appartiennent à l'année en cours
        $niveauActuelles = NiveauScolaire::all();

        return view('livewire.creer-frais-scolarite', compact('niveauActuelles'));
    }
}
