<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// ROTTA ARTICOLI
Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');
