<ul class="nav nav-tabs" style="margin-bottom:15px">
	<li @if (Request::is('admin/stagioni*')) class="active" @endif><a href="{{ url('admin/stagioni') }}">Stagioni</a></li>
	<li @if (Request::is('admin/associazioni*')) class="active" @endif><a href="{{ url('admin/associazioni') }}">Associazioni fornai-GAS</a></li>
</ul>
