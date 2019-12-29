@extends('app')



@section('content')





<body>



	<div class="privada">

		

		<!-- Formulario  -->





			<div class="container container-fluid" style="padding-top: 5%">

				<div class="row">

					

					@forelse($resultado as $s)

						<div class="col s12 m12 l3 center">

							<div class="card z-depth-0" id="subfamilia">

								<div class="subfamilia-productos">

							        <div class="efecto  hide-on-med-and-down">

										<a href="{{ action('SeccionProductoController@showProducto', ['id' => $s->familia_id, 'tipo' => 'producto']) }}">

											<img src="{{ asset('images/subfamilias/hover-subfamilias.png') }}" class="responsive-img" style="width: 100%; margin-left: 3%">	    

										</a>                

									</div>

									<a href="{{ action('SeccionProductoController@showProducto', ['id' => $s->familia_id, 'tipo' => 'producto']) }}">@if (file_exists(public_path('images/productos/'.$s->file_image.'.jpg')))<img class="materialboxed" src="{{ asset('images/productos/'.$s->file_image.'.jpg') }}"> @else <img src="{{asset('images/productos/no-image.jpg')}}"> @endif	</a>

								</div>

								<div class="card-content" id="image-subfamilias-card-content" style="height: 50px;" >

									<span class="card-title center" id="image-subfamilias-card-content-title">{{ $s->descripcion }}</span>

								
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





