<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    //REVISORE DASHBOARD
    public function index()
    {
        // Recupera gli annunci in attesa di revisione (is_accepted = null)
        $article_to_check = Article::where('is_accepted', null)
        ->where('user_id', '!=', Auth::id()) // Esclude gli annunci dell'utente attuale
        ->orderBy('updated_at', 'desc')
        ->first();

        $articles_to_recheck = Article::whereIn('is_accepted', [true, false]) // Filtra solo gli articoli accettati o rifiutati
        ->where('user_id', '!=', Auth::id()) // Esclude gli articoli dell'utente attuale
        ->orderBy('updated_at', 'desc')
        ->get(); // Ottieni tutti gli articoli

        return view('revisor.index', compact('article_to_check', 'articles_to_recheck'));
    }

    // LOGICA ACCETTAZIONE ARTICOLO
    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()->back()->with('message', "Hai accettato l'articolo $article->title");
    }

    // LOGICA RIFIUTO ARTICOLO
    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()->back()->with('message', "Hai rifiutato l'articolo $article->title");
    }

    // LOGICA PER RICHIESTA REVISORE
    public function BecomeRevisor()
    {
        Mail::to('admin@AdVibe.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('homepage')->with('success', 'Operazione avvenuta con successo');
    }

    // LOFICA PER RENDERE REVISORE
    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }

    // LOGICA PER ANNULLARE L'AZIONE SULL'ANNUNCIO
        public function undoArticleAction(Article $article)
    {
        $article->is_accepted = null;
        $article->save();

        return redirect()->back()->with('success', "L'azione sull'annuncio '{$article->title}' è stata annullata.");
    }
}
