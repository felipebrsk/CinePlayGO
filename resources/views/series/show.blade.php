@extends('layouts.main')

@section('content')
	<div class="movie-info border-b border-gray-800">
		<div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
			<img alt="{{ $popularSeries['name'] }}" src="{{ 'https://image.tmdb.org/t/p/w342/' . $popularSeries['poster_path'] }}" class="w-64 md:w-96">
			<div class="md:ml-24">
				<h2 class="text-4xl font-semibold">{{ $popularSeries['name'] }}</h2>
				<div class="flex flex-wrap items-center text-gray-400 text-sm mt-2">
					<svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
					<span class="ml-1"> {{ $popularSeries['vote_average'] }} </span>
					<span class="mx-2">|</span>
						{{ \Carbon\Carbon::parse($popularSeries['first_air_date'])->format('d M, Y') }}
					<span class="mx-2">|</span>
					<span>
						@foreach($popularSeries['genres'] as $genre)
        					{{ $genre['name'] }}@if(!$loop->last), @endif
        				@endforeach
					</span>
				</div>
				<p class="text-gray-300 mt-8">{{ $popularSeries['overview'] . ' ' . $popularSeries['tagline'] }}</p>
				@foreach($episodeGroups as $groups)
				<div class="mt-4 text-sm text-gray-400">Episódios: {{$groups['episode_count']}}</div>
				<div class="flex text-sm text-gray-400">Temporadas: {{$groups['group_count']}}</div>
				@endforeach
				<div class="mt-12">
					<h4 class="text-white font-semibold">Equipe técnica</h4>
					<div class="flex mt-4">
						@foreach($popularSeries['credits']['crew'] as $crew)
							@if($loop->index < 2)
        						<div class="mr-8">
        							<div>{{ $crew['name'] }}</div>
        							<div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
        						</div>
        					@endif
						@endforeach
						</div>
					</div>
					<div x-data="{ isOpen: false }">
                        <div class="mt-12">
					@if(isset($popularSeries['videos']['results'][0]['key']))
                            <button
                                @click="isOpen = true"
                                class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150"
                            >
                                <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                <span class="ml-2">Assistir ao trailer</span>
                            </button>
                    @else
                    <div>Trailer indisponível.</div>
                    @endif
                        </div>
                        <template x-if="isOpen">
                            <div
                                style="background-color: rgba(0, 0, 0, .5);"
                                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                            >
                                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                    <div class="bg-gray-900 rounded">
                                        <div class="flex justify-end pr-4 pt-2">
                                            <button
                                                @click="isOpen = false"
                                                @click.away="isOpen = false"
                                                class="text-3xl leading-none hover:text-gray-300">&times;
                                            </button>
                                        </div>
                                        <div class="modal-body px-8 py-8">
                                            <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
												@if(isset($popularSeries['videos']['results'][0]['key']))
                                                <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $popularSeries['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            	@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
				</div>
			</div>
		</div>


<div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Elenco</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($elenco as $cast)
                	@if($cast['popularity'] > 1.000)
                	@if($loop->index < 5)
                    <div class="mt-8" style=width:200px;>
                        <a href="">
                            <img src="{{ 'https://image.tmdb.org/t/p/w342/' . $cast['profile_path'] }}" alt="Atores" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
                            <div class="text-sm text-gray-400">
                                {{ $cast['character'] }}
                            </div>
                        </div>
                    </div>
                    @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div> <!-- end movie-cast -->
    
    
    <div class="movie-images" x-data="{ isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Imagens de {{$popularSeries['name']}}</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-8">
            @foreach($popularSeries['images']['backdrops'] as $images)
            	@if($loop->index < 10)
                    <div class="mt-8">
                        <a
                            @click.prevent="
                                isOpen = true
                                image='{{ 'https://image.tmdb.org/t/p/original/'.$images['file_path'] }}'
                            "
                            href="#"
                        >
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $images['file_path'] }}" alt="Imagens do filme" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endif
            @endforeach
            </div>
            <div
                style="background-color: rgba(0, 0, 0, .5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                x-show="isOpen"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                @click="isOpen = false"
                                @click.away="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="text-3xl leading-none hover:text-gray-300">&times;
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image" alt="poster">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end movie-images -->
</div>


<div class="container mx-auto px-4 pt-16">
	<div class="now-playing-movies py-24">
		<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Séries similares</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($similarSeries as $similar)
                	<div class="mt-8" style=width:260px;>
                		<a href="{{route('filmes.show', $similar['id'])}}">
                			@if($similar['poster_path'])
                				<img alt="" src="{{ 'https://image.tmdb.org/t/p/w342/' . $similar['poster_path'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
                			@else
                				<img alt="Resultados de pesquisa" src="https://via.placeholder.com/300x450">
                			@endif
                		</a>
                			<div class="mt-2">
                				<a href="{{route('filmes.show', $similar['id'])}}" class="text-lg mt-2 hover:text-gray:300">{{ $similar['name'] }}</a>
                					<div class="flex items-center text-gray-400 text-sm mt-1">
                						<svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                							<span class="ml-1">{{ $similar['vote_average'] }} </span>
                							<span class="mx-2"> |</span>
                							@if(isset($similar['release_date']))
                							<span>{{ \Carbon\Carbon::parse($similar['release_date'])->format('d M, Y') }}</span>
                							@else
                							<span>Sem data de lançamento.</span>
                							@endif
                						</div>
                					<div class="text-gray-400 text-sm">
                				@foreach($similar['genre_ids'] as $genre)
                					{{ $genres->get($genre) }}@if(!$loop->last), @endif
                				@endforeach
                			</div>
                		</div>
                	</div>
                @endforeach
			</div>
		</div>
	</div> <!-- end similar-movies -->
	
<div class="container mx-auto px-4 pt-16">
	<div class="now-playing-movies py-24">
		<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Outras séries que possa gostar (baseado em {{$popularSeries['name']}})</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($recommendedSeries as $similar)
                	<div class="mt-8" style=width:260px;>
                		<a href="{{route('filmes.show', $similar['id'])}}">
                			@if($similar['poster_path'])
                				<img alt="" src="{{ 'https://image.tmdb.org/t/p/w342/' . $similar['poster_path'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
                			@else
                				<img alt="Resultados de pesquisa" src="https://via.placeholder.com/300x450">
                			@endif
                		</a>
                			<div class="mt-2">
                				<a href="{{route('filmes.show', $similar['id'])}}" class="text-lg mt-2 hover:text-gray:300">{{ $similar['name'] }}</a>
                					<div class="flex items-center text-gray-400 text-sm mt-1">
                						<svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                							<span class="ml-1">{{ $similar['vote_average'] }} </span>
                							<span class="mx-2"> |</span>
                							@if(isset($similar['release_date']))
                							<span>{{ \Carbon\Carbon::parse($similar['release_date'])->format('d M, Y') }}</span>
                							@else
                							<span>Sem data de lançamento.</span>
                							@endif
                						</div>
                					<div class="text-gray-400 text-sm">
                				@foreach($similar['genre_ids'] as $genre)
                					{{ $genres->get($genre) }}@if(!$loop->last), @endif
                				@endforeach
                			</div>
                		</div>
                	</div>
                @endforeach
			</div>
		</div>
	</div> <!-- end similar-movies -->
@endsection