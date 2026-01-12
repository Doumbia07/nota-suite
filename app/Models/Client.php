<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable=[
        'nom',
        'telephone',
        'email'
    ];
    
    public function dossiers()
    { 
        return $this->hasMany(Dossier::class); 
    }
}
