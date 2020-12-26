<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $popularMovies;
    public $similarMovies;
    public $genres;
    public $elenco;
    
    public function __construct($popularMovies, $similarMovies, $genres, $elenco)
    {
        $this->popularMovies = $popularMovies;
        $this->similarMovies = $similarMovies;
        $this->genres = $genres;
        $this->elenco = $elenco;
    }
    
    public function popularMovies($movies) {
        return $this->formatMovies($this->popularMovies);
    }
    public function similarMovies($movies) {
        return $this->formatMovies($this->similarMovies);
    }
    public function genres($movies) {
        return $this->formatMovies($this->genres);
    }
    public function elenco($movies) {
        return $this->formatMovies($this->elenco);
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
