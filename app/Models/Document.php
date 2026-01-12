<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable=[
        'reference',
        'client_id',
        'date',
        'montant',
        'statut'
        ];

    public function client()
    { 
        return $this->belongsTo(Client::class);
    }

    public function documents()
    { 
        return $this->hasMany(Document::class); 
    }

    public function paiements()
    { 
        return $this->hasMany(Paiement::class); 
    }
}
