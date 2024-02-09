<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraisScolarite extends Model
{
    use HasFactory;
    protected $guarded = [''];

    
    public function niveau()
    {
        return $this->belongsTo(NiveauScolaire::class, 'niveau_scolaire_id');
    }

    public function annee()
    {
        return $this->belongsTo(AnneeScolaire::class, 'annee_scolaire_id');
    }
}
