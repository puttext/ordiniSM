@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="details">
				<h3>ATTENZIONE</h3>
				<p>{{$messaggio}}
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