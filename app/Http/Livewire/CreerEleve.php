<?php

namespace App\Http\Livewire;

use App\Models\Eleve;
use Livewire\Component;

class CreerEleve extends Component
{
    public $matricule;
    public $prenom;
    public $nom;
    public $date_naissance;
    public $contact_parent;

    public function store(Eleve $eleve)
    {
        $this->validate([
            'matricule' => 'string|required|unique:eleves,matricule',
            'prenom' => 'string|required',
            'nom' => 'string|required',
            'date_naissance' => 'date|required',
            'contact_parent' => 'string|required',
        ]);

        try {
            $eleve->matricule = $this->matricule;
            $eleve->prenom = $this->prenom;
            $eleve->nom = $this->nom;
            $eleve->date_naissance = $this->date_naissance;
            $eleve->contact_parent = $this->contact_parent;

            $eleve->save();

            return redirect()->route('eleves')->with('success', 'Elève enregistré avec succès.');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        return view('livewire.creer-eleve');
    }
}
