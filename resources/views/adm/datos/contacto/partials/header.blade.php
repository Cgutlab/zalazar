@include('adm.layouts.app')
@include('adm.layouts.navbar')
@include('adm.layouts.sidebar')


<main>
	<div class="container" id="container-fluid">
		<div class="row">
			@if ($errors->any())
				<div class="card-panel alert-error">
					<ul>
						<li>ALERTA:
							@foreach ($errors->all() as $error)
							{{ $error }}

							@endforeach
						</li>
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
					<a href="{{ url('adm/datos/contacto' )}}" class="breadcrumb">Contacto</a>