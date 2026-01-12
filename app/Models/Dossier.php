<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
     protected $fillable = 
     [ 
     'client_id',
     'reference',
     'description',
     'statut',
     'date',
     'montant'
     ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
