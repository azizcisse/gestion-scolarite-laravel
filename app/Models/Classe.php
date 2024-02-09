<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    
    protected $guarded = [''];

    // Une Classe n'appartient pas à plusieurs Niveaux
    // Un Niveau peut avoir plusieurs Classes associées

    public function niveauScolaire()
    {
        return $this->belongsTo(NiveauScolaire::class);
    }

    public function fraisScolaire()
    {
        return $this->hasMany(FraisScolarite::class);
    }
}
