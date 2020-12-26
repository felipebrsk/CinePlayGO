@extends('layouts.main')
@section('content')
	<div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ml-28">Filmes populares</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ml-24"  style=width:1300px;>
            @foreach($popularMovies as $movies)
                <x-movie-card :movies="$movies" :genres="$genres"/>
            @endforeach

            </div>
        </div> <!-- end pouplar-movies -->

        <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ml-28">Tocando agora</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ml-24"  style=width:1300px;>
            	@foreach($nowPlaying as $movies)
                	<x-movie-card :movies="$movies" :genres="$genres"/>
            	@endforeach
            </div>
        </div> <!-- end now-playing-movies -->

    
    <div class="py-24" style=position:relative;bottom:100px;>
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ml-28">Próximos lançamentos</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ml-24"  style=width:1300px;>
            	@foreach($upcomingMovies as $movies)
                	<x-movie-card :movies="$movies" :genres="$genres"/>
            	@endforeach
            </div>
        </div> <!-- end upcoming-movies -->
        
        <div class="now-playing-movies py-24" style=position:relative;bottom:180px;>
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ml-28">Os mais bem votados</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ml-24"  style=width:1300px;>
            	@foreach($topMovies as $movies)
                	<x-movie-card :movies="$movies" :genres="$genres"/>
            	@endforeach
            </div>
        </div> <!-- end upcoming-movies -->
    </div>
    
    
@endsection