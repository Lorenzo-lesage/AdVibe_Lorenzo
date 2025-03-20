<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['create'])
        ];
    }
    public function create()
    {
    return view('article.create');
    }

    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(6);
        return view('article.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function bycategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', true)->paginate(6);
        return view('article.byCategory', compact('articles', 'category'));
    }

    // FUNZIONE IL MIO PROFILO
    public function myArticles (){
        $myArticles = Auth::user()->articles()->orderBy('created_at', 'desc')->get();
        $favoriteArticles = Auth::user()->savedArticles()->orderBy('created_at', 'desc')->get();

        return view('article.myArticles', compact('myArticles', 'favoriteArticles'));
    }

}

