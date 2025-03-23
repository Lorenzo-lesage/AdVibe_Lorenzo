<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Article;
use App\Models\Profile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // RELAZIONE CON ARTICLES
    public function articles() :HasMany
    {
        return $this->hasMany(Article::class);
    }

    // RELAZIONE CON ARTICOLI SELEZIONATI TRA I PREFERITI
    public function savedArticles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class)
            ->withTimestamps(); // Registra automaticamente created_at e updated_at nella pivot
    }

    // REKAÌLAZIONE CON PROFILO
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }
}
