<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Article;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use Searchable;

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'user_id',
    ];

    // RELAZIONE CON USER
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // RELAZIONE CON CATEGORY
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // RELAZIONE CON IMAGES
    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    // RELAZIONE CON USERS CHE HAN PREFERITI L'ARTICOLO
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps();
    }

    // LOGICA VALUTZIONE ARTICOLO
    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    // LOGICA CONTEGGIO ARTICOLI DA REVISIONARE
    public static function toBeRevisedCount()
    {
        return Article::where('is_accepted', null)->whereNot('user_id', Auth::id())->count();
    }

    // LOGICA PER RICERCA ARTICOLO
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category
        ];
    }
}


