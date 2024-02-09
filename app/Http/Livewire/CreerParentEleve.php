<?php

namespace App\Http\Livewire;

use App\Models\Family;
use App\Notifications\EnvoieNotificationEmailParent;
use Livewire\Component;

class CreerParentEleve extends Component
{
    public $prenom;
    public $nom;
    public $email;
    public $telephone;

    public function store(Family $parentEleve)
    {
        $this->validate([
            'prenom' => 'string|required',
            'nom' => 'string|required',
            'telephone' => 'string|required',
            'email' => 'email|required|unique:parents,email',
        ]);

        try {
            $parentEleve->prenom = $this->prenom;
            $parentEleve->nom = $this->nom;
            $parentEleve->email = $this->email;
            $parentEleve->telephone = $this->telephone;

            $parentEleve->save();

            // Envoyer un email au parent une fois ajouté dans la base de donnée.


            // Vérifier si le parent est inscrit dans la base de donnée.

            if ($parentEleve) {
                $parentEleve->notify(new EnvoieNotificationEmailParent());
            }

            return redirect()->route('parent_eleves')->with('success', 'Parent d\'Elève enregistré avec succès.');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        return view('livewire.creer-parent-eleve');
    }
}
