<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function homepage()
    {
        $articles = Article::where('is_accepted', true)->whereNot('user_id', Auth::id())->orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome', compact('articles'));
    }

    // FUNZIONE PER RICERCA PARZIALE ARTICOLI
    public function searchArticles(Request $request)
    {
        $query = $request->input('query');

        $articles = Article::where('is_accepted', true)
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")
                    ->orWhereHas('category', function ($q) use ($query) {
                        $q->where('name', 'LIKE', "%{$query}%");
                    });
            })
            ->paginate(8);

        return view('article.searched', ['articles' => $articles, 'query' => $query]);
    }

    // FUNZIONE PER LINGUE
    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }

}
