<?php

namespace App\Http\Livewire;

use App\Models\Family;
use Livewire\Component;
use Livewire\WithPagination;

class ListeParentEleve extends Component
{
    use WithPagination;
    public $search = '';

    public function delete(Family $parentEleve)
    {
        $parentEleve->delete();
        return redirect()->route('parent_eleves')->with('success', 'Parent d\'Elève Supprimé avec succès.');
    }

    public function render()
    {
        if (!empty($this->search)) {
            $listParent = Family::where(
                'prenom',
                'like',
                '%' . $this->search . '%'
            )->orWhere(
                'nom',
                'like',
                '%' . $this->search . '%'
            )->orWhere(
                'email',
                'like',
                '%' . $this->search . '%'
            )->paginate(2);
        } else {
            $listParent = Family::paginate(2);
        }

        return view('livewire.liste-parent-eleve', compact('listParent'));
    }
}
