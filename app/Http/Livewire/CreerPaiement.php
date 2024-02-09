<?php

namespace App\Http\Livewire;

use App\Models\Eleve;
use Livewire\Component;
use App\Models\Paiement;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\FraisScolarite;
use App\Models\Inscription;

class CreerPaiement extends Component
{
    public $matricule;
    public $montant;
    public $fullname;
    public $eleve_id;

    public $error;
    public $haveError = false;
    public $success;
    public $haveSuccess = false;

    public function store(Paiement $paiement)
    {
        $totalPayee = 0;

        $activeAnneeScolaire = AnneeScolaire::where('active', '1')->first();

        //Recuperer l'id de la classe de l'élève
        $getClasseQuery = Inscription::where('eleve_id', '=', $this->eleve_id)
            ->where('annee_scolaire_id', $activeAnneeScolaire->id)->first();


        //Cond 1: Recuperer le montant de la scolarité d'une classe en fonction du niveau (classe)
        $eleveClasseId = $getClasseQuery->classe_id;

        $classData = Classe::with('niveauScolaire')->find($eleveClasseId);

        $idNiveauEleve = $classData->niveauScolaire->id;
        $query = FraisScolarite::where('niveau_scolaire_id', $idNiveauEleve)
            ->where('annee_scolaire_id', $activeAnneeScolaire->id)->first();
        $montantScolarite = $query->montant;

        //Cond 2: Faire le cumul des paiements déja efectué et le comparer au montant de la scolarité
        $listPaiementEleve = Paiement::where('eleve_id', $this->eleve_id)
            ->where('annee_scolaire_id', $activeAnneeScolaire->id)->get();

        foreach ($listPaiementEleve as $paiementEleve) {
            $totalPayee = $totalPayee + $paiementEleve->montant;
        }

        //Verifier que le montant total de la scolarité n'est pas inférieur au montant déja payé + le montant du paiement en cour
        $resultatOperation = $totalPayee - $montantScolarite;
        if (($totalPayee + $this->montant) > $montantScolarite) {
            # Erreur
            if ($resultatOperation == 0) {
                $this->success = 'Félicitation; la Scolarité de cet élève est réglé.';

                $this->haveSuccess = true;
                $this->haveError = true;
            } else {
                $this->error = 'Le montant saisi dépasse la scolarité. Il reste à payer ' .
                    $montantScolarite - $totalPayee . ' FCFA';
                $this->haveError = true;
            }
        }
        if (!$this->haveError) {
            $this->validate([
                'matricule' => 'string|required',
                'montant' => 'integer|required',
            ]);

            try {
                $paiement->eleve_id = $this->eleve_id;
                $paiement->classe_id = $getClasseQuery->classe_id;
                $paiement->annee_scolaire_id = $activeAnneeScolaire->id;
                $paiement->montant = $this->montant;

                $paiement->save();

                return redirect()->route('paiements')->with('success', 'Paiement enregistré avec succès.');
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }


    public function render()
    {
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

        return view('livewire.creer-paiement');
    }
}
