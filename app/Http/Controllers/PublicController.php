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

    // FUNZIONE PER I PROFILI
    public function profilesIndex() {
        $users = User::all(); // Recupera tutti gli utenti
        return view('profile.index', compact('users'));
    }
    // FUNZIONE PER I PROFILI DETTAGLIO
    public function profileShow (User $user) {
        // Recupera gli articoli creati dall'utente
        $profileArticles = Article::where('user_id', $user->id)->where('is_accepted', true)->orderBy('updated_at', 'desc')->get();

        // Recupera gli articoli preferiti dell'utente
        $favoriteArticles = $user->savedArticles; // Assicurati di avere una relazione definita

        return view('profile.show', compact('user', 'profileArticles', 'favoriteArticles'));
    }

}
