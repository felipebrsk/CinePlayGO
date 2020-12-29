<!doctype html>

<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
 	<title>CinePlay GO</title>


  	<link rel="stylesheet" href="/css/main.css">
	<link rel="shortcut icon" href="{{asset('storage/upload/favicon.ico')}}" type="image/x-icon">
	<link rel="icon" href="{{asset('storage/upload/favicon.ico')}}" type="image/x-icon">
	@livewireStyles
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="font-sans bg-gray-900 text-white">
	<nav class="border-b border-gray-800">
		<div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
			<ul class="flex items-center flex-col md:flex-row">
				<li>
					<a href="{{route('filmes.index')}}">
						<img src="/storage/upload/KhHq1hd.png" style=width:70px;height:70px;>
					</a>
				</li>
				<li class="md:ml-16 mt-3 md:mt-0">
					<a href="{{route('filmes.index')}}" class="hover:text-gray-300">Filmes</a>
				</li>
				<li class="md:ml-16 mt-3 md:mt-0">
					<a href="{{route('series.index')}}" class="hover:text-gray-300">Séries</a>
				</li>
				<li class="md:ml-16 mt-3 md:mt-0">
					<a href="#" class="hover:text-gray-300">Atores</a>
				</li>
			</ul>
			<div class="flex items-center flex-col md:flex-row">
				<livewire:search-dropdown>
				<div>
					@if(Auth::user())
				<div class="md:ml-4 mt-3 md:mt-0" style=position:relative;top:24px;>
					<a href="#">
						<img src="/storage/upload/icone-sem-foto.png" alt="Foto de perfil" style=background-color:gray; class="rounded-full w-8 h-8">
					</a>
				</div>
					<div class="flex ml-16" style=position:relative;bottom:10px;>Bem vindo, {{ auth()->user()->name }}!</div>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
					<div class="ml-16 hover:text-gray-300" style=position:relative;bottom:14px;text-align:right;><a class="login100-form-btn" href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sair</a></div>
                    </form>
					@else
					<div class="ml-4 hover:text-gray-300" style=position:relative;top:11px;><a href="{{route('login')}}">Login</a></div>
					<div class="ml-16 hover:text-gray-300" style=position:relative;bottom:12.5px;><a class="ml-4" href="{{route('register')}}">Cadastro</a></div>
					@endif
				</div>
			</div>
		</div>
	</nav>
	@yield('content')
	@livewireScripts
</body>
</html>