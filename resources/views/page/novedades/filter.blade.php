@extends('app')

@section('content')


<body>

<div class="container container-fluid">
	
	<div class="row">
		<div class="col s12" id="seccion-nombre" style="margin-top: 5%">
			<span>Novedades</span>
		</div>
		
		
		<div class="col s12 m12 l10">
		
			@forelse($novedades as $n)
				<div class="col s12 m12 l5" style="margin-left: 5%">

					<ul class="tabs">
						<li class="tab col s5" 
							style="text-align: left !important">
							<a href="#" class="active titulo-tab-novedades" style="text-transform: capitalize !important">{{ $n->clasificacion->nombre }}</a>
						</li>
					</ul>
					<div class="card z-depth-0" style="border-top: 4px solid #FFFFFF; margin-top: 0;">
						<a  id="link-index-novedades" href="{{ route('ver', $n->id) }}" >
							<div class="card-image">
								<img src="{{ asset('images/novedades/'.$n->file_image) }}">
							</div>
							<div class="card-stacked" style="background: #fafafa !important">
								<span class="card-title" id="titulo-index-novedades">{{ $n->titulo }}</span>

								<div class="card-content" style="">
									<p  id="descripcion-index-novedades" >{{ substr($n->texto, 0, 130) }}...</p>
								</div>
							</div>
						</a>
					</div>
				</div>
			@empty
				<p>No hay novedades disponibles para esta catergoría.</p>
			@endforelse
		</div>

		<div class="col s12 m12 l2">
			<p id="titulo-categorias">Categorías</p>
			<div class="divider" style="background: #B0B0B0;"></div>

			<ul class="collection" id="collection-novedades">
				@foreach($categorias as $c)
		      		<a href="{{ route('filtros', $c->id) }}" class="collection-item" id="collection-novedades-item"><i class="fas fa-angle-double-right" style="margin-right: 5%"></i>{{ $c->nombre }}</a>
		      	@endforeach
		    </ul>
		</div>
	</div>
		
</div>
	@endsection

	@include('layouts.script')
</body>
</html>


