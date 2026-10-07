@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">Accesso riservato</h3>
				</div>
				<div class="panel-body">
					<p>{{ isset($exception) && $exception->getMessage() ? $exception->getMessage() : 'Non sei autorizzato ad accedere alla pagina richiesta.' }}</p>
					<a href="{{ url('/') }}" class="btn btn-default">Torna alla homepage</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
