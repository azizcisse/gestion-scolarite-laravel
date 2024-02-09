<?php

namespace App\Http\Livewire;

use App\Models\AnneeScolaire;
use Carbon\Carbon;
use Livewire\Component;

class CreerAnneeScolaire extends Component
{
    public $libelle;

    public function store(AnneeScolaire $anneeScolaire)
    {
        $this->validate([
            'libelle' => 'string|required|unique:annee_scolaires,annee_scolaire'
        ]);
        try {
            $annee_actuelle = Carbon::now()->format('Y');

            $check = AnneeScolaire::where('annee_actuelle', $annee_actuelle)->get();

            $existDeja = $check->count();
            
            if ($existDeja >= 1) {
              return redirect()->back()->with('error', 'L\'année en cours a déjà été enregistré.');
            } else {
                $anneeScolaire->annee_scolaire = $this->libelle;
                $anneeScolaire->annee_actuelle = $annee_actuelle;
    
                $anneeScolaire->save();
    
                if ($anneeScolaire) {
                    $this->libelle = '';
                }
    
                return redirect()->route('configurations')->with('success', 'Année scolaire enregistrée avec succès.');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        return view('livewire.creer-annee-scolaire');
    }
}
