<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ url(mix('login/vendor/css/style.css')) }}"/>

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
				</div>
			</div>
			<div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-book"></span>
                        </div>
                        <h3 class="text-center mb-4">Login</h3>
                        
                        @if(session('message'))
                            <div class="col-md-12">
                                <div class="alert alert-warning mt-3">
                                    <p>{{session('message')}}</p>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('singin') }}" class="login-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control rounded-left" placeholder="Email" value="admin@admin.com">
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="password" class="form-control rounded-left" placeholder="Senha" value="admin">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded px-3">Entrar</button>
                            </div>
                        </form>
                    </div>
			    </div>
			</div>
		</div>
	</section>

    <script src="{{ url(mix('admin/vendor/js/core.js')) }}"></script>
    <script src="{{ url(mix('login/vendor/js/main.js')) }}"></script>

	</body>
</html>

