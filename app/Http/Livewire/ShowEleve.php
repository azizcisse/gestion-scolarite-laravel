<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use App\Models\Inscription;
use App\Models\Paiement;
use Livewire\Component;

class ShowEleve extends Component
{
    public $eleve;

    public function getClasseActuelle()
    {
        $query = Inscription::where('eleve_id', $this->eleve->id)->first();

        $idClasseActuelle = $query->classe_id;
        $classeQuery = Classe::find($idClasseActuelle);

        return $classeQuery->nom_classe;
    }
    public function render()
    {
        $dernierPaiementEleve = Paiement::where('eleve_id', $this->eleve->id)->paginate(1);
        return view('livewire.show-eleve', compact('dernierPaiementEleve'));
    }
}
