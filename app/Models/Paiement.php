<?php

namespace App\Models;

use App\Models\Eleve;
use App\Models\Classe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paiement extends Model
{
    use HasFactory;
    protected $guarded = [''];


    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
