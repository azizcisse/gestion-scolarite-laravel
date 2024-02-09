<?php

namespace App\Http\Livewire;

use App\Models\Paiement;
use Livewire\Component;
use Livewire\WithPagination;

class ListePaiement extends Component
{
    use WithPagination;

    public $search = '';

    public function delete(Paiement $paiement)
    {
        $paiement->delete();
        return redirect()->route('paiements')->with('success', 'Paiement Supprimé avec succès.');
    }
    public function render()
    {
        if (!empty($this->search)) {
            $paiements = Paiement::where(
                'montant',
                'like',
                '%' . $this->search . '%'
            )->paginate(2);
        } else {

            $paiements = Paiement::with(['eleve', 'classe'])->paginate(2);
        }

        return view('livewire.liste-paiement', compact('paiements'));
    }
}
