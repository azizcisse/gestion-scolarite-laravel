<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use Livewire\Component;
use App\Models\AnneeScolaire;
use App\Models\Eleve;
use App\Models\Inscription;
use App\Models\NiveauScolaire;

class CreerInscription extends Component
{
    public $eleve_id;
    public $niveau_scolaire_id;
    public $matricule;
    public $classe_id;
    public $fullname;
    public $error;

    public function store(Inscription $inscription)
    {
        $activeAnneeScolaire = AnneeScolaire::where('active', '1')->first();

        //COndition personnalisé pour empecher un élève d'être inscrit deux fois la meme année.

        $query = Inscription::where('eleve_id', $this->eleve_id)
            ->where('annee_scolaire_id', $activeAnneeScolaire->id)->get();

        if ($query->count() > 0) {
            //Alors ne pas faire l'inscription

            $this->error = 'Cet élève est déja inscrit. Modifier les informations si nécéssaire';
        } else {

            $this->validate([
                'matricule' => 'string|required',
                'niveau_scolaire_id' => 'string|required',
                'classe_id' => 'string|required',
            ]);
            try {
                $inscription->eleve_id = $this->eleve_id;
                $inscription->classe_id = $this->classe_id;
                $inscription->annee_scolaire_id = $activeAnneeScolaire->id;

                $inscription->save();

                return redirect()->route('inscriptions')->with('success', 'Inscription enregistré avec succès.');
            } catch (\Throwable $th) {
                //throw $th;
            }
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

        return view('livewire.creer-inscription', compact('niveauActuelles', 'classesList'));
    }
}
