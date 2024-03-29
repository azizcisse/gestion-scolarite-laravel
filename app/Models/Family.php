<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Family extends Model
{
    protected $table = 'parents';
    use HasFactory, Notifiable;

    public function eleves()
    {
        return $this->belongsToMany(Eleve::class);
    }

}
