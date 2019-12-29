@extends('app')

@section('content')


<body>

	<div class="privada" style="background: #F4F4F4">
		
		<!-- Formulario  -->


			<div class="container">
				<div class="row">
					<div class="col s12" id="seccion-nombre"  style="border-top: 3px solid #5C89C5; margin-top: 5%">
						<span style="text-transform: capitalize">{{ (\Auth::user()->tipo) }} : {{ $user->name }}</span>
					</div>
				</div>

				@if($user->tipo == 'vendedor')

					@if($user->clientes->count() > 0)

						<div class="row">
							
							<div class="col s12 m12 l6">

								<span id="titulo-cliente">Seleccione un cliente</span>
								
								<ul class="collection" id="clientes-collection">
									@foreach($user->clientes as $c)
										<a class="collection-item" href="{{ action('SeccionPrivadaController@cliente', $c->id) }}">{{ $c->name }}</a>
									@endforeach
								</ul>

							</div>
						</div>
					@endif

				@else

					<div class="center">
						
						<p>Bienvenido. </p>
						<a href="{{ action('SeccionProductoController@index') }}" class=" z-depth-0 btn button-continuar-compra center-align" id="estandar-otro-btn">VER PRODUCTOS</a>					

					</div>
				@endif
			</div>


		@endsection
	</div>

	@include('layouts.script')
</body>
</html>


