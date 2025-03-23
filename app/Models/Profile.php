<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'phone',
        'birth_date',   // Data di nascita
        'city',         // Città
        'address',      // Indirizzo
        'country',      // Nazione
        'profile_image', // Immagine del profilo
        'user_id',
    ];

    // RELAZIONE CON USER
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
