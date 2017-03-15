@extends('layouts.main')

@section('styles')
<link type="text/css" rel="stylesheet" href="{{asset('assets/pages/css/error.min.css')}}"></link>
@endsection

@section('page_header')
	@include('partials.page_header',['titolo'=>'Accesso riservato'])
@endsection

@section('content')
<div class="container">

	<div class="row">
		<div class="col-md-12 page-404">
			<div class="number font-green"> 403 </div>
			<div class="details">
				<h3>ATTENZIONE</h3>
				<p>Non sei autorizzato ad accedere alla pagina richiesta
					<br/>
				</p>
				<p>
					<a href="{{ url('/') }}" class="btn red btn-outline"> Torna alla homepage </a>
					<br>
				</p>
			</div>
		</div>
	</div>
</div>
@endsection
