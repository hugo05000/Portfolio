<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'entreprise','titre','localisation','date_de_debut','date_de_fin','poste_actuel','description','ordre'
    ];

    protected $casts = [
        'date_de_debut' => 'date',
        'date_de_fin'   => 'date',
        'poste_actuel' => 'boolean',
    ];
}
