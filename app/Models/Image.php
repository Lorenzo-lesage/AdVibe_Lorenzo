<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path'
    ];

    // RELAZIONE CON ARTICLE
    public function article() : BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
