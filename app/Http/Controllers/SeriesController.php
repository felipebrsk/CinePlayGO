<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularSeries = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/popular?language=pt-BR')
        ->json()['results'];
        
        $nowPlaying = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/on_the_air?language=pt-BR')
        ->json()['results'];
        
        $genresArray = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/tv/list?language=pt-BR')
        ->json()['genres'];
        
        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
        
        $topSeries = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/top_rated?language=pt-BR')
        ->json()['results'];
        
        return view('series.index')->with([
            'popularSeries' => $popularSeries,
            'genres' => $genres,
            'nowPlaying' => $nowPlaying,
            'topSeries' => $topSeries
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
        $popularSeries = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/'. $id . '?append_to_response=credits,videos,images&include_image_language=pt,null&language=pt-BR')
        ->json();
        
        $similarSeries = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/'. $id . '/similar?language=pt-BR')
        ->json()['results'];
        
        $genresArray = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/tv/list?language=pt-BR')
        ->json()['genres'];
        
        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
        
        $elenco = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/'. $id . '/credits?language=pt-BR')
        ->json()['cast'];
        
        $recommendedSeries = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/'. $id . '/recommendations?language=pt-BR')
        ->json()['results'];
        
        $episodeGroups = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/'. $id . '/episode_groups?language=pt-BR')
        ->json()['results'];
        
        dump($episodeGroups);
        
        return view('series.show')->with([
            'popularSeries' => $popularSeries,
            'genres' => $genres,
            'elenco' => $elenco,
            'similarSeries' => $similarSeries,
            'recommendedSeries' => $recommendedSeries,
            'episodeGroups' => $episodeGroups
        ]);
    }
    
    public function recommendations($id) 
    {       
        
        
        return view('series.recommendations');
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
