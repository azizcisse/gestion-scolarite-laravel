<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AnneeScolaire;
use App\Models\FraisScolarite;

class ListeFraisScolarite extends Component
{
    use WithPagination;

    public $search = '';

    public function delete(FraisScolarite $fraisScolarite)
    {
        $fraisScolarite->delete();
        return redirect()->route('frais_scolarites')->with('success', 'Frais de Scolarité Supprimé avec succès.');
    }

    public function render()
    {
        if (!empty($this->search)) {
            $listFrais = FraisScolarite::where(
                'libelle',
                'like',
                '%' . $this->search . '%'
            )->orWhere(
                'code',
                'like',
                '%' . $this->search . '%'
            )->paginate(2);
        } else {
            $activeAnneeScolaire = AnneeScolaire::where('active', '1')->first();

            $listFrais = FraisScolarite::with(['niveau', 'annee'])
                ->whereRelation('annee', 'annee_scolaire_id', $activeAnneeScolaire->id)->paginate(2);
        }

        return view('livewire.liste-frais-scolarite', compact('listFrais'));
    }
}
