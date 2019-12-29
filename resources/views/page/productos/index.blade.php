@extends('app')

@section('content')


<body>




	<div class="container container-fluid-secciones" style="margin-top: 5%">
		@auth('web')
			@if($has_cliente == false && \Auth::user()->tipo == 'vendedor')
				<div class="card-panel alert-success">
					<ul>
						<li>ALERTA:
							No has seleccionado ningún cliente. Para procesar la compra debes seleccionar uno: <a href="{{action('SeccionPrivadaController@index')}}" style="color: white; ">HAZ CLIC AQUÍ</a> 
						</li>
					</ul>
				</div>
			@endif
		@endauth
		<div class="row" id="familias-row">
			
			@forelse($familias as $f)
				<div class="col s12 m12 l3">
					<div class="subfamilia-productos">
				        <div class="efecto">
							<a href="{{ action('SeccionProductoController@show', $f->id) }}"><img src="{{ asset('images/subfamilias/hover-subfamilias.png') }}" class="responsive-img" style="width: 100%">	    </a>                
						</div>
						<img src="{{ asset('images/familias/'.$f->file_image) }}">
					</div>
					<div class="card-content center" id="image-familias-card-content" style="height: 60px; margin-bottom: 15%" >
						<span class="card-title center" id="image-familias-card-content-title">{{ $f->nombre }}</span>
					</div>
				</div>	
			@empty
			@endforelse
		</div>
	</div>

	@endsection

	@include('layouts.script')
</body>
</html>


