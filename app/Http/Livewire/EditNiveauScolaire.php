<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\NiveauScolaire;

class EditNiveauScolaire extends Component
{
    public $niveauScolaire;

    public $code;
    public $libelle;
    public $montant_scolarite;

    // Etape ou composant est monté
    public function mount()
    {
        $this->code = $this->niveauScolaire->code;
        $this->libelle = $this->niveauScolaire->libelle;
        $this->montant_scolarite = $this->niveauScolaire->montant_scolarite;
    }

    
    public function store()
    {
       $niveauScolaire = NiveauScolaire::find($this->niveauScolaire->id);

        $this->validate([
            'code' => 'string|required',
            'libelle' => 'string|required',
            'montant_scolarite' => 'string|required',
        ]);

        try {

            $niveauScolaire->code = $this->code;
            $niveauScolaire->libelle = $this->libelle;
            $niveauScolaire->montant_scolarite = $this->montant_scolarite;
            
            $niveauScolaire->save();

            return redirect()->route('niveaux')->with('success', 'Niveau Scolaire Mis à Jours avec succès.');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        return view('livewire.edit-niveau-scolaire');
    }
}
