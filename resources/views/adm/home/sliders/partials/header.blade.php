@include('adm.layouts.app')
@include('adm.layouts.navbar')
@include('adm.layouts.sidebar')

<main>
	<div class="container" id="container-fluid">
		<div class="row">
			@if ($errors->any())
			<div class="card-panel alert-error">
				<ul>
					<li><i class="material-icons">error_outline</i><b>ALERTA: </b></li>
					@foreach ($errors->all() as $error)
					<li>{{ $error }} </li>
					@endforeach
				</ul>
			</div>
			@endif

			@if (session('alert'))
			<div class="card-panel alert-success">
				<ul>
					<li>ALERTA:
						{{ session('alert') }}				
					</li>
				</ul>
			</div>
			@endif

			<div class="col s12">
				<div class="col s12" id="breadcrumb-admin">
					<a href="{{ url('adm/home/' )}}" class="breadcrumb">Home</a>
					<a href="{{ url('adm/empresa/sliders/' )}}" class="breadcrumb">Sliders</a>