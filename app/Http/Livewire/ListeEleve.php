<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AnneeScolaire;
use App\Models\Eleve;
use App\Models\NiveauScolaire;

class ListeEleve extends Component
{
    use WithPagination;

    public $search = '';

    public function delete(Eleve $eleve)
    {
        $eleve->delete();
        return redirect()->route('eleves')->with('success', 'Elève Supprimé avec succès.');
    }

    public function render()
    {
        if (!empty($this->search)) {
            $elevesList = Eleve::where(
                'prenom',
                'like',
                '%' . $this->search . '%'
            )->orWhere(
                'nom',
                'like',
                '%' . $this->search . '%'
            )->paginate(2);
        } else {

            $elevesList = Eleve::paginate(2);
        }

        return view('livewire.liste-eleve', compact('elevesList'));
    }
}

   