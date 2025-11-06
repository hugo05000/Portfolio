<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
        'nom_prenom', 'ville', 'date_de_naissance', 'en_tete', 'resume', 'photo_source'
    ];

    protected $casts = [
        'date_de_naissance' => 'date',
    ];
}
