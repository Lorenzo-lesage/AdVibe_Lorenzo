<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
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
}
