@extends('app')

@section('content')


<body>

	<div class="privada">
		
		<!-- Formulario  -->


			<div class="container container-fluid" style="padding-top: 5%">
				<div class="row">
					
					@forelse($productos as $s)
						<div class="col s12 m12 l3 center">
							<div class="card z-depth-0" id="subfamilia">
								<div class="subfamilia-productos">
							        <div class="efecto  hide-on-med-and-down">
										<a href="{{ action('SeccionProductoController@showProducto', $s->subfamilia->id) }}">
											<img src="{{ asset('images/subfamilias/hover-subfamilias.png') }}" class="responsive-img" style="width: 100%; margin-left: 3%">	    
										</a>                
									</div>
									<a href="{{ action('SeccionProductoController@showProducto', $s->subfamilia->id) }}"><img src="{{ asset('images/subfamilias/'.$s->subfamilia->file_image) }}"></a>
								</div>
								<div class="card-content" id="image-subfamilias-card-content" style="height: 50px;" >
									<span class="card-title center" id="image-subfamilias-card-content-title">{{ $s->descripcion }}</span>
									<span class="card-title left precio-anterior" id="image-subfamilias-card-content-title">${{ $s->precio }}</span>
									<span class="card-title right precio-actual" id="image-subfamilias-card-content-title">${{ $s->precio - $s->oferta }}</span>
								</div>
							</div>
						</div>
					@empty
						<p>
							No conseguimos productos relacionados a esta categoría
						</p>
					@endforelse
				</div>
			</div>


		@endsection
	</div>

	@include('layouts.script')
</body>
</html>


