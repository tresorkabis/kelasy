<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Eleve extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nom',
        'postnom',
        'prenom',
        'date_naissance',
        'lieu_naissance',
        'sexe',
        'telephone',
        'adresse',
        'photo',
        'classe_id',
        'section_id',
        'tuteur_id'
    ];

    public function classe(): BelongsTo
    {
        return $this->belongsTo(Classe::class);
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function tuteur(): BelongsTo
    {
        return $this->belongsTo(Tuteur::class);
    }
}
