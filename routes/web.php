<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// ROTTA ARTICOLI
Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');
Route::get('/index/article', [ArticleController::class, 'index'])->name('index.article');
Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('show.article');

// CATEGORIE
Route::get('/category/{category}', [ArticleController::class, 'bycategory'])->name('byCategory');
