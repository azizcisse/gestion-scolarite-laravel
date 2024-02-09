<?php

namespace App\Models;

use App\Models\Eleve;
use App\Models\Classe;
use App\Models\NiveauScolaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscription extends Model
{
    use HasFactory;

    protected $guarded = [''];

    // -Eleve: Une Inscription concerne Un Seul eleve

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

}
