<?php

namespace App\Http\Livewire;

use App\Models\Eleve;
use App\Models\Classe;
use Livewire\Component;
use App\Models\Inscription;
use App\Models\AnneeScolaire;
use App\Models\NiveauScolaire;

class EditInscription extends Component
{
    public $inscription;
    public $eleve_id;
    public $niveau_scolaire_id;
    public $matricule;
    public $classe_id;
    public $fullname;
    public $error;

    public function mount()
    {
        // Récupérer les informations de lélève
        $idEleveParDefaut = $this->inscription->eleve_id;
        $query = Eleve::find($idEleveParDefaut);

        $this->matricule = $query->matricule;
        $this->eleve_id = $query->id;

        //recuperer le niveau concerner
        $selectionnerNiveau = Classe::where('id', $this->inscription->classe_id)->first();
        $this->niveau_scolaire_id = $selectionnerNiveau->niveau_scolaire_id;


       // Initialiser la valeur de classe_id
        $this->classe_id = $this->inscription->classe_id;
    }

    public function update()
    {
        $inscription = Inscription::find($this->inscription->id);

        $this->validate([
            'matricule' => 'string|required',
            'niveau_scolaire_id' => 'string|required',
            'classe_id' => 'string|required',
        ]);

        try {
            $inscription->eleve_id = $this->eleve_id;
            $inscription->classe_id = $this->classe_id;

            $inscription->save();

            return redirect()->route('inscriptions')->with('success', 'Inscription Mis à Jours avec succès.');
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

        if (isset($this->matricule)) {
            $eleveActuelle = Eleve::where('matricule', $this->matricule)->first();

            if ($eleveActuelle) {
                // Retourner le nom complet
                $this->fullname = $eleveActuelle->prenom . ' ' . $eleveActuelle->nom;

                // Sauvegarder l'Id de l'élève
                $this->eleve_id = $eleveActuelle->id;
            } else {
                $this->fullname = '';
            }
        }

        if (isset($this->niveau_scolaire_id)) {
            $classesList = Classe::where('niveau_scolaire_id', $this->niveau_scolaire_id)->get();

        } else {
            $classesList = [];
        }

        return view('livewire.edit-inscription', compact('niveauActuelles', 'classesList'));
    }
}
