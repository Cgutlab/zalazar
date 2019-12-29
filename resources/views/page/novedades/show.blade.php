@extends('app')

@section('content')


<body>

<div class="container">
	
	<div class="row">

		
		<div class="col s12" id="seccion-nombre" style="margin-top: 5%">
			<span>Novedades</span>
		</div>
		
		
		<div class="col s12 m12 l9">

			<ul class="tabs">
				<li class="tab col s3" style="text-align: left !important"><a href="#" class="active titulo-tab-novedades" >{{ $novedad->clasificacion->nombre }}</a></li>
			</ul>
            <img src="{{ asset('images/novedades/'.$novedad->file_image) }}" alt="" class="responsive-img">

            <div class="texto">
            	<p id="titulo-show-novedades">{{ $novedad->titulo }}</p>
            	<span id="descripcion-show-novedades">{!!  $novedad->texto !!}</span>
            </div>
		</div>

		<div class="col s12 m12 l3">
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


