<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.are-you-sure.js')}}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
						@if (Auth::user() && Auth::user()->ruolo=="fornitore")
							<li><a href="{{ url('/ordini/') }}">Storico ordini</a></li>
						@elseif (Auth::user() && \Auth::user()->ruolo!='referente')
							<li><a href="{{ url('/ordini/create') }}">Crea nuovo ordine</a></li>
							<li><a href="{{ url('/ordini/') }}">Modifica Ordini</a></li>
						@endif
						@if (Auth::user() && Auth::user()->gas_id)
							<li><a href="{{ url('/ordini/current/edit') }}">Compila Ordine</a></li>
							<li><a href="{{ url('/ordini/') }}">Storico ordini GAS</a></li>
						@endif
						@if (Auth::user() && (Auth::user()->ruolo!='fornitore' || \Auth::user()->gas_id))
							<li><a href="{{ url('/contributi') }}">Verifica Contributi</a></li>
						@endif
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Ciao, {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                	<li>{{ strtoupper(Auth::user()->ruolo)}}</li>
                                	@if (Auth::user()->gas_id)
                                		<li>GAS: {{ Auth::user()->gas ? Auth::user()->gas->nome : ""}}</li>
                                	@endif
                                    <li><a id="edit" href="{{route('user.edit',\Auth::user()->id)}}">Modifica i tuoi dati</a>
                                    <li>
                                        <a id="logout" href="#">Logout</a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container row">
	        <div class="col-md-4 col-md-offset-4">
				@if (Session::has('message'))
				<div class="alert alert-info alert-dismissible fade" role="alert">
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  					{{ Session::get('message') }}
				</div>
				@endif
			</div>
		</div>
        @yield('content')
    </div>

	<script>
		$(document).ready(function(){
			$("#logout").click(function(){
				$('#logout-form').submit();
			});
		});
	</script>
	@yield('page-scripts')
</body>
</html>
