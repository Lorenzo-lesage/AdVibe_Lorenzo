<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
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
        $articles = Article::orderBy('created_at', 'desc')->paginate(6);
        return view('article.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function bycategory(Category $category)
    {
        // Array delle immagini per categoria
        $categoryImages = [
            'Tablet' => 'images/tablet.jpg',
            'Smartwatch' => 'images/smartwatch.jpg',
            'Laptop' => 'images/laptop.jpg',
            'Fotocamere' => 'images/camera.jpg',
            'Videocamere' => 'images/video_camera.jpg',
            'Videogiochi' => 'images/video_games.jpg',
            'Console' => 'images/console.jpg',
            'Stampanti' => 'images/printer.jpg',
            'Droni' => 'images/drone.jpg',
        ];

        // Passa l'array di immagini alla vista insieme alla categoria
        return view('article.byCategory', [
            'articles' => $category->articles,
            'category' => $category,
            'categoryImages' => $categoryImages
        ]);
    }

}
