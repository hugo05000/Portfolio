<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    protected $fillable = [
        'libelle',
        'description',
    ];

    public function photos()
    {
        return $this->hasMany(PhotoPrestation::class, 'id_prestation');
    }
}
