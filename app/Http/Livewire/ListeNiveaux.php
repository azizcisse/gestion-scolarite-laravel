<?php

namespace App\Http\Livewire;

use App\Models\AnneeScolaire;
use App\Models\FraisScolarite;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\NiveauScolaire;

class ListeNiveaux extends Component
{
    use WithPagination;

    public $search = '';

    public function delete(NiveauScolaire $niveauScolaire)
    {
        $niveauScolaire->delete();
        return redirect()->route('niveaux')->with('success', 'Niveau Scolaire Supprimé avec succès.');
    }

    public function getScolariteMontant($niveauScolaireId)
    {
        $activeAnneeScolaire = AnneeScolaire::where('active', '1')->first();
        $query = FraisScolarite::where('niveau_scolaire_id', $niveauScolaireId)
        ->where('annee_scolaire_id', $activeAnneeScolaire->id)->first();

        return $query->montant;
    }

    public function render()
    {
        if (!empty($this->search)) {
            $listNiveauScolaire = NiveauScolaire::where(
                'libelle',
                'like',
                '%' . $this->search . '%'
            )->orWhere(
                'code',
                'like',
                '%' . $this->search . '%'
            )->paginate(2);
        } else {
            //$activeAnneeScolaire = AnneeScolaire::where('active', '1')->first();
           // where('annee_scolaire_id', $activeAnneeScolaire->id)->

            $listNiveauScolaire = NiveauScolaire::paginate(2);
        }

        return view('livewire.liste-niveaux', compact('listNiveauScolaire'));
    }
}
