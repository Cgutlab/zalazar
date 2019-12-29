@extends('app')

@section('content')


<body>

	@include('page.partials.slider')



	@if($destacados->count() > 0)
		<div class="container container-fluid" style="border-top: 3px solid #5C89C5" >
			<div class="row">
				<div class="col s12" id="seccion-nombre">
					<span>Productos Destacados</span>
				</div>
				@foreach($destacados as $s)
					<div class="col s12 m12 l3 center">
						<div class="card z-depth-0" id="subfamilia">
							<div class="subfamilia-productos">
						        <div class="efecto  hide-on-med-and-down">
									<a href="{{ action('SeccionProductoController@showProducto', ['id' => $s->subfamilia->id, 'tipo' => 'subfamilia']) }}">
										<img src="{{ asset('images/subfamilias/hover-subfamilias.png') }}" 
											 class="responsive-img" 
											 style="width: 100%; margin-left: 3%">	    
									</a>                
								</div>
								<a href="{{ action('SeccionProductoController@showProducto', ['id' => $s->subfamilia->id, 'tipo' => 'subfamilia']) }}">
									<img src="{{ asset('images/subfamilias/'.$s->subfamilia->file_image) }}"></a>
							</div>
							<div class="card-content" id="image-subfamilias-card-content" style="height: 50px;" >
								<span class="card-title center" id="image-subfamilias-card-content-title">{{ $s->subfamilia->nombre }}</span>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="row center">
				<a href="{{ action('SeccionProductoController@index') }}" style="margin-top: -2% !important" class=" z-depth-0 btn button-continuar-compra center-align" id="estandar-btn">VER PRODUCTOS</a>					
			</div>
		</div>
	@endif

	

	@if($informacion)
		<div class="row hide-on-med-and-down " style="margin-bottom: 0px; height: 279px; position: relative; background-image:url({{url('images/home/'.$informacion->file_image) }}) ">
				<img src="{{ asset('images/home/capa_informacions.png') }} " style="position: absolute; " class="responsive-img">
				<div class="col s12" style="position: absolute; width: 80%; margin-left: 10%; margin-top: 5%;">
					<div class="col s12 m12 l2" >
						<img src="{{ asset('images/home/logo-1.png') }} ">
					</div>
					<div class="col s12 m12 l4" >
						<div class="informacion-titulo-caption">{!! $informacion->titulo1 !!} </div>
					</div>
					<div class="col s12 m12 l2" >
						<img src="{{ asset('images/home/logo-2.png') }} ">
					</div>
					<div class="col s12 m12 l4">
						<div class="informacion-titulo-caption">{!! $informacion->titulo2 !!}</div>
					</div>
				</div>
				
		</div>
	@endif




	@endsection

	@include('layouts.script')


	<script>
		$(document).ready(function(){  
			$('#slider-home').slider({
				height: 479,
			})
		});
	</script>


</body>
</html>


