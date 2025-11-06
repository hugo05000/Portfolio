<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';

    protected $fillable = [
        'diplome','ecole','details','annee_debut','annee_fin','ordre'
    ];
}
