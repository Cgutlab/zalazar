@extends('app')

@section('content')


	<div class="container container-fluid-secciones" id="productos-row" style="padding-top: 2%">
		<div class="breadcrumb-productos">
			<a href="{{ action('SeccionProductoController@index') }}">Productos</a> | <a href="{{ action('SeccionProductoController@show', $familia->id) }}">{{$familia->nombre}}</a> | <a href="{{ action('SeccionProductoController@showProductos', $subfamilia->id) }}">{{$subfamilia->nombre}}</a> 
		</div>

		<div class="row">
			
			@include('page.productos.partials.menu')

			<div class="col s12 m12 l9">

				@forelse($subfamilias_productos as $p)
					<div class="col s12 m12 l4">
						<div class="card z-depth-0" id="subfamilia">
							<div class="subfamilia-productos">
						        <div class="efecto  hide-on-med-and-down">
									<a href="{{ action('SeccionProductoController@showProducto', $p->id) }}"><img src="{{ asset('images/familias/hover-familias.png') }}" class="responsive-img" style="width: 100%; margin-left: 3%">	    </a>                
								</div>
								<a href="{{ action('SeccionProductoController@showProducto', $p->id) }}"><img src="{{ asset('images/productos/'.$p->file_image) }}"></a>
							</div>
							<div class="card-content" id="image-subfamilias-card-content" style="height: 50px;" >
								<span class="card-title center" id="image-subfamilias-card-content-title">{{ $p->nombre }}</span>
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



	</div>

@include('layouts.script')
@endsection
</body>
</html>


