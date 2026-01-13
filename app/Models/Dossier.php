<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dossier extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'reference',
        'description',
        'statut',
        'date',
        'montant',
        'type_dossier'
    ];

    protected $casts = [
        'date' => 'date',
        'montant' => 'float',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function coContactants()
    {
        return $this->hasMany(CoContactant::class);
    }

    public function frais()
    {
        return $this->hasOne(Frais::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
