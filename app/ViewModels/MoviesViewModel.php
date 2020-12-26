<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popularMovies;
    public $nowPlaying;
    public $genres;
    public $upcomingMovies;
    public $topMovies;
    
    public function __construct($popularMovies, $nowPlaying, $genres, $upcomingMovies, $topMovies)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlaying = $nowPlaying;
        $this->genres = $genres;
        $this->upcomingMovies = $upcomingMovies;
        $this->topMovies = $topMovies;
    }
    public function popularMovies() {
        return $this->formatMovies($this->popularMovies);
    }
    public function nowPlaying() {
        return $this->formatMovies($this->nowPlaying);
    }
    public function genres() {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }
    public function upcomingMovies() {
        return $this->formatMovies($this->upcomingMovies);
    }
    public function topMovies() {
        return $this->formatMovies($this->topMovies);
    }
    
    
    private function formatMovies($movie) 
    {
        return collect($movie)->map(function($movies){
            $genresFormat = collect($movies['genre_ids'])->mapWithKeys(function($values){
                return [$values = $this->genres()->get($values)];
            })->implode(', ');
            
            return collect($movies)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w342/' . $movies['poster_path'],
                'release_date' => Carbon::parse($movies['release_date'])->format('d M, Y'),
                'genres' => $genresFormat
            ])->only([
                'poster_path', 'id', 'genre_ids', 'title', 'vote_average', 'overview', 'release_date', 'genres'
            ]);
        });
    }
}
