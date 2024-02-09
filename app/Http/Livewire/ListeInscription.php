<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use Livewire\Component;
use App\Models\Inscription;
use Livewire\WithPagination;

class ListeInscription extends Component
{
    use WithPagination;

    public $search = '';
    public $selected_classe_id;

    public function render()
    {

        if (isset($this->selected_classe_id)) {

            if (!empty($this->search)) {

                $inscriptionsList = Inscription::where('prenom', 'like', '%' . $this->search . '%')->orWhere('nom', 'like', '%' . $this->search . '%')->paginate(2);
            } else {

                $inscriptionsList = Inscription::with(['eleve', 'classe'])->where('classe_id', $this->selected_classe_id)->paginate(2);
            }
        } else {
            if (!empty($this->search)) {
                $inscriptionsList = Inscription::where('prenom', 'like', '%' . $this->search . '%')->orWhere('nom', 'like', '%' . $this->search . '%')->paginate(2);
            } else {
                $inscriptionsList = Inscription::with(['eleve', 'classe'])->paginate(2);
            }
        }

        $classeList = Classe::all();
        return view('livewire.liste-inscription', compact('inscriptionsList', 'classeList'));
    }
}
