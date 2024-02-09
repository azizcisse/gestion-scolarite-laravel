<?php

namespace App\Http\Livewire;

use App\Models\Eleve;
use Livewire\Component;

class EditEleve extends Component
{
    public $eleve;

    public $matricule;
    public $prenom;
    public $nom;
    public $date_naissance;
    public $contact_parent;

    public function mount()
    {
       $this->matricule = $this->eleve->matricule;
       $this->prenom = $this->eleve->prenom;
       $this->nom = $this->eleve->nom;
       $this->date_naissance = $this->eleve->date_naissance;
       $this->contact_parent = $this->eleve->contact_parent;
    }

    
    public function update()
    {
        $eleve = Eleve::find($this->eleve->id);
        
        $this->validate([
            'matricule' => 'string|required',
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

            return redirect()->route('eleves')->with('success', 'Elève Mis à Jours avec succès.');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        return view('livewire.edit-eleve');
    }
}
