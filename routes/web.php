<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

//ROTTE PUBLICCONTROLLER
// ROTTA HOMEPAGE
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
// ROTTA RICERCA ARTICOLI
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('search.article');
// ROTTA PER CAMBIARE LINGUA
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');
// ROTTA PROFILI
Route::get('/profiles', [PublicController::class, 'profilesIndex'])->name('profiles.index');
Route::get("/profile/{user}", [PublicController::class, 'profileShow'])->name('profile.show');

// ----------------------------------------------------------------------------------------------------------------
//ROTTE ARTICLECONTROLLER
// ROTTA ARTICOLI
Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');
Route::get('/index/article', [ArticleController::class, 'index'])->name('index.article');
Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('show.article');

// CATEGORIE
Route::get('/category/{category}', [ArticleController::class, 'bycategory'])->name('byCategory');

//ROTTA PARAMETRICA WHISHLIST
Route::get("/my-articles", [ArticleController::class, 'myArticles'])->name('my.articles');



// ----------------------------------------------------------------------------------------------------------------
//ROTTE REVISORCONTROLLER
// REVISORE
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
// ROTTA PER MODIFICARE AZIONE SU ARTICOLO
Route::patch('/revisor/undo/{article}', [RevisorController::class, 'undoArticleAction'])->name('revisor.undo');


// MAIL
Route::get('/revisor/request', [RevisorController::class, 'BecomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

