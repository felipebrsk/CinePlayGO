<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>CinePlay GO | Verificação de e-mail</title>


	<link rel="stylesheet" href="/css/main.css">
	<link rel="shortcut icon" href="{{asset('storage/upload/favicon.ico')}}" type="image/x-icon">
	<link rel="icon" href="{{asset('storage/upload/favicon.ico')}}" type="image/x-icon">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale =1">
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="{{url(mix('assets/css/login.css'))}}">
</head>

<div class="card-header">
				<h3>Verificação</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			
			<div class="card-body">
			@if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Um link de verificação foi enviado para o seu e-mail.
                        </div>
                    @endif
					</div>
					<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
					<div class="form-group">
						<button type="submit" class="form-control" style=position:relative;top:40px;>Clique aqui para solicitar outro e-mail.</button>
					</div>
                    </form>
			</div>
		</div>
	</div>
</html>