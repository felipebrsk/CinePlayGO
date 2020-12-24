<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(["verify" => true]);
    
Route::get('/', 'App\Http\Controllers\FilmesController@index')->name('filmes.index');

Route::get('/filmes/{filme}', 'App\Http\Controllers\FilmesController@show')->name('filmes.show');

Route::get('/filmes/{video}', 'App\Http\Controllers\FilmesController@video')->name('filmes.video');

Route::get('/filmes/{elenco}', 'App\Http\Controllers\FilmesController@elenco')->name('filmes.elenco');

Route::get('/tv', 'App\Http\Controllers\FilmesController@index')->name('tv.index');