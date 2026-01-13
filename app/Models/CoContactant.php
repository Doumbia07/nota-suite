<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoContactant extends Model
{
    use HasFactory;

    protected $fillable = [
        'dossier_id',
        'nom',
        'telephone',
        'email',
        'role',
    ];

    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }
}
