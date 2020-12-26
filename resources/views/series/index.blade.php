@extends('layouts.main')
@section('content')
	<div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ml-28">Séries populares</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ml-24"  style=width:1300px;>
            	@foreach($popularSeries as $series)
            	<x-series-card :series="$series" :genres="$genres"/>
            	@endforeach

            </div>
        </div> <!-- end pouplar-movies -->

        <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ml-28">No ar</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ml-24"  style=width:1300px;>
            	@foreach($nowPlaying as $series)
            		<x-series-card :series="$series" :genres="$genres"/>
            	@endforeach
            </div>
        </div> <!-- end now-playing-movies -->
        
        <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ml-28">As mais bem votadas</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ml-24"  style=width:1300px;>
            	@foreach($topSeries as $series)
            		<x-series-card :series="$series" :genres="$genres"/>
            	@endforeach
            </div>
        </div> <!-- end now-playing-movies -->
	</div>
@endsection