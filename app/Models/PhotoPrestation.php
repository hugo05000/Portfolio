<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoPrestation extends Model
{
    protected $fillable = [
        'source',
        'alt',
        'id_prestation'
    ];

    public function prestation()
    {
        return $this->belongsTo(Prestation::class, 'id_prestation');
    }
}
