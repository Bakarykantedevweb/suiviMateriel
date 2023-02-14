<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materiel;

class SortiMateriel extends Model
{
    use HasFactory;

    public function agence()
    {
        return $this->belongsTo(Agence::class,'agence_id','id');
    }
}
