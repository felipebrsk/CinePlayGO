<!doctype html>

<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
 	<title>CinePlay GO</title>


  	<link rel="stylesheet" href="/css/main.css">
	<link rel="shortcut icon" href="{{asset('storage/upload/favicon.ico')}}" type="image/x-icon">
	<link rel="icon" href="{{asset('storage/upload/favicon.ico')}}" type="image/x-icon">

</head>

<body class="font-sans bg-gray-900 text-white">
	<nav class="border-b border-gray-800">
		<div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
			<ul class="flex items-center flex-col md:flex-row">
				<li>
					<a href="/">
						<img src="/storage/upload/KhHq1hd.png" style=width:80px;height:60px;>
					</a>
				</li>
				<li class="md:ml-16 mt-3 md:mt-0">
					<a href="#" class="hover:text-gray-300">Filmes</a>
				</li>
				<li class="md:ml-16 mt-3 md:mt-0">
					<a href="#" class="hover:text-gray-300">Séries</a>
				</li>
				<li class="md:ml-16 mt-3 md:mt-0">
					<a href="#" class="hover:text-gray-300">Atores</a>
				</li>
			</ul>
			<div class="flex items-center flex-col md:flex-row">
				<div class="relative mt-3 md:mt-0">
					<input type="text" class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline text-sm" placeholder="Pesquisar">
						<div class="absolute top-0">
							<svg class="fill-current text-gray-500 w-4 ml-3 mt-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/>Oi</svg>
						</div>
				</div>
				<div class="md:ml-4 mt-3 md:mt-0">
					<a href="#">
						<img src="/storage/upload/icone-sem-foto.png" alt="Foto de perfil" style=background-color:gray; class="rounded-full w-8 h-8">
					</a>
				</div>
					<div class="flex ml-2">Bem vindo, {{ auth()->user()->name }}!</div>
			</div>
		</div>
	</nav>
	@yield('content')
</body>
</html>