<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use Livewire\Component;
use App\Models\AnneeScolaire;
use App\Models\NiveauScolaire;

class EditClasseScolaire extends Component
{
    public $classeScolaire;

    public $nom_classe;
    public $niveau_scolaire_id;

    public function mount()
    {
        $this->niveau_scolaire_id = $this->classeScolaire->niveau_scolaire_id;
        $this->nom_classe = $this->classeScolaire->nom_classe;
    }

    public function update()
    {
        $classeScolaire = Classe::find($this->classeScolaire->id);

        $this->validate([
            'niveau_scolaire_id' => 'string|required',
            'nom_classe' => 'string|required',
        ]);

        try {
            $classeScolaire->niveau_scolaire_id = $this->niveau_scolaire_id;
            $classeScolaire->nom_classe = $this->nom_classe;

            $classeScolaire->save();

            return redirect()->route('classes')->with('success', 'Classe Mis à Jours avec succès.');
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

        return view('livewire.edit-classe-scolaire', compact('niveauActuelles'));
    }
}
