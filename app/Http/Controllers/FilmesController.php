<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\View\Components\MovieCard;

class FilmesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //requisitar filmes populares
        $popularMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular?language=pt-BR')
        ->json()['results'];
        
        //requisitar filmes que estão tocando agora
        $nowPlaying = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing?language=pt-BR')
        ->json()['results'];
        
        //requisitar os gêneros dos filmes
        $genresArray = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list?language=pt-BR')
        ->json()['genres'];
        
        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
        
        //requisitar filmes lançamentos
        $upcomingMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/upcoming?language=pt-BR')
        ->json()['results'];
        
        //requisitar top-rated movies
        $topMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/top_rated?language=pt-BR')
        ->json()['results'];
        
        //dump($token);
        
        return view('home')->with([
            'popularMovies' => $popularMovies,
            'genres' => $genres,
            'nowPlaying' => $nowPlaying,
            'upcomingMovies' => $upcomingMovies,
            'topMovies' => $topMovies
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'. $id . '?append_to_response=credits,videos,images&include_image_language=pt,null&language=pt-BR')
        ->json();
        
        $similarMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'. $id . '/similar?language=pt-BR')
        ->json()['results'];
        
        $genresArray = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list?language=pt-BR')
        ->json()['genres'];
        
        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
        
        $elenco = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'. $id . '/credits?language=pt-BR')
        ->json()['cast'];
        
        //dump($popularMovies);
        
        return view('show')->with([
            'popularMovies' => $popularMovies,
            'similarMovies' => $similarMovies,
            'genres' => $genres,
            'elenco' => $elenco
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
