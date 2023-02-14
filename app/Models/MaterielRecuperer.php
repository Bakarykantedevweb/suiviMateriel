<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterielRecuperer extends Model
{
    use HasFactory;

    protected $table = 'materiel_recuperers';

    protected $fillable = [
         'departement_id' ,
            'marque' ,
            'model' ,
            'serie' ,
            'type' ,
            'etat' ,
            'date_entrer'
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class,'departement_id','id');
    }
}
