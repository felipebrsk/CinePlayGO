<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(["verify" => true]);

Route::get('/', 'App\Http\Controllers\FilmesController@index')->name('filmes.index');

Route::get('/filmes/{filme}', 'App\Http\Controllers\FilmesController@show')->name('filmes.show');