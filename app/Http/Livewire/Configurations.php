<?php

namespace App\Http\Livewire;

use App\Models\AnneeScolaire;
use Livewire\Component;
use Livewire\WithPagination;

class Configurations extends Component
{
    use WithPagination;

    public $search = '';

    public function activerStatus(AnneeScolaire $anneeScolaire)
    {
      // Mettre tous les lignes de la table active à 0
      $query = AnneeScolaire::where('active', '1')->update(['active' => '0']);

      // Mettre à jour le statut de l'enregistrement grace à son identifiant
      $anneeScolaire->active = '1';
      $anneeScolaire->save();
    }
    public function render()
    {
        if (!empty($this->search)) {
            $listAnneeScolaire = AnneeScolaire::where(
                'annee_scolaire',
                'like',
                '%' . $this->search . '%'
            )->orWhere(
                'annee_actuelle',
                'like',
                '%' . $this->search . '%'
            )->paginate(2);
        } else {
            $listAnneeScolaire = AnneeScolaire::paginate(2);
        }

        return view('livewire.configurations', compact('listAnneeScolaire'));
    }
}
