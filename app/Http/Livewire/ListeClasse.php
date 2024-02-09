<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AnneeScolaire;
use App\Models\FraisScolarite;

class ListeClasse extends Component
{

    use WithPagination;

    public $search = '';

    public function delete(Classe $classe)
    {
        $classe->delete();
        return redirect()->route('classes')->with('success', 'La Classe a été Supprimé avec succès.');
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
        //classesList
        if (!empty($this->search)) {
            $classesList = Classe::where(
                'nom_classe',
                'like',
                '%' . $this->search . '%'
            )->orWhere(
                'niveau_scolaire_id',
                'like',
                '%' . $this->search . '%'
            )->paginate(2);
        } else {
            $activeAnneeScolaire = AnneeScolaire::where('active', '1')->first();

            $classesList = Classe::with('niveauScolaire')->paginate(2);
        }
        return view('livewire.liste-classe', compact('classesList'));
    }
}
