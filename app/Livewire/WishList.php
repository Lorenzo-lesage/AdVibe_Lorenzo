<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WishList extends Component
{

    public $article;
    public $isFavorite = false;

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->isFavorite = Auth::user()?->savedArticles()->where('article_id', $article->id)->exists();
    }

    public function toggleSavedArticles()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Se non loggato, reindirizza al login
        }

        if ($this->isFavorite) {
            Auth::user()->savedArticles()->detach($this->article->id);
            $this->isFavorite = false;
        } else {
            Auth::user()->savedArticles()->attach($this->article->id);
            $this->isFavorite = true;
        }
    }

    public function render()
    {
        return view('livewire.wish-list');
    }

}
