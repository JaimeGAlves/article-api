<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleWebController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('articles', ArticleWebController::class);