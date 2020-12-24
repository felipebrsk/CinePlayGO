<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>CinePlay GO | Login</title>


	<link rel="stylesheet" href="/css/main.css">
	<link rel="shortcut icon" href="{{asset('storage/upload/favicon.ico')}}" type="image/x-icon">
	<link rel="icon" href="{{asset('storage/upload/favicon.ico')}}" type="image/x-icon">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale =1">
<title>Página de login</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="{{url(mix('assets/css/login.css'))}}">
</head>

<div class="card-header">
				<h3>Login</h3>
				<div class="d-flex justify-content-end social_icon">
					<a href="#"><span><i class="fab fa-facebook-square"></i></span></a>
					<a href="#"><span><i class="fab fa-google-plus-square"></i></span></a>
					<a href="#"><span><i class="fab fa-twitter-square"></i></span></a>
				</div>
			</div>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			
			<div class="card-body">
				<form method="POST" action="{{ route('login') }}">
                        @csrf
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Digite seu e-mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Digite a sua senha" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Lembrar-me
					</div>
					<div class="form-group">
						<button type="submit" class="form-control" style=position:relative;top:40px;>Login</button>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Não possui uma conta?<a href="{{ route('register') }}">Cadastre-se</a>
				</div>
				@if (Route::has('password.request'))
                                    <a class="btn btn-link" style=position:relative;text-align:center;left:80px; href="{{ route('password.request') }}">
                                        Esqueceu sua senha?
                                    </a>
                                @endif
			</div>
		</div>
	</div>
</div>
</html>
