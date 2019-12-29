@extends('app')



@section('content')



	<div class="container container-fluid-secciones" id="productos-row" style="padding-top: 2%">

		<div class="breadcrumb-productos">

			<a href="{{ action('SeccionProductoController@index') }}">Productos</a> | <a href="{{ action('SeccionProductoController@show', $familia->id) }}">{{$familia->nombre}}</a> 

		</div>



		<div class="row">



			@forelse($subfamilias_familia as $s)

				<div class="col s12 m12 l3 center">

					<div class="card z-depth-0" id="subfamilia">

						<div class="subfamilia-productos">

					        <div class="efecto  hide-on-med-and-down">

								<a href="{{ action('SeccionProductoController@showProducto', ['id' => $s->id, 'tipo' => 'subfamilia']) }}">

									<img src="{{ asset('images/subfamilias/hover-subfamilias.png') }}" class="responsive-img" style="width: 100%; margin-left: 3%">	    

								</a>                

							</div>

							<a href="{{ action('SeccionProductoController@showProducto', ['id' => $s->id, 'tipo' => 'subfamilia']) }}"><img src="{{ asset('images/subfamilias/'.$s->file_image) }}"></a>

						</div>

						<div class="card-content" id="image-subfamilias-card-content" style="height: 50px;" >

							<span class="card-title center" id="image-subfamilias-card-content-title">{{ $s->nombre }}</span>

						</div>

					</div>

				</div>

			@empty

			@if($familia->productos->count() > 0)
				@include('page.productos.partials.menu')


				@guest
					<div class="col s12 m12 l9">
						<div class="row">


							<div class="col s12" >
								<p id="productos-show-nombre">{{ $familia->nombre }}</p>
							</div>

							<div class="col s12" style="padding: 5%">	
								<div id="medidas-productos">
									<table class="striped">
										<thead class="center">
											<tr>
												<th class="center">
													Imagen
												</th>
												<th class="center">
													Código
												</th>
												<th>
													Descripción
												</th>
												<th>
													
												</th>
											</tr>
										</thead>
										<tbody>
											@foreach($familia->productos as $p)
												<tr>
													<td class="image-td center" >
														@if (file_exists(public_path('images/productos/'.$p->file_image.'.jpg')))<img class="materialboxed" src="{{ asset('images/productos/'.$p->file_image.'.jpg') }}"> @else <img src="{{asset('images/productos/no-image.jpg')}}"> @endif	
													</td>
													<td class="codigo-td center">
														{{ $p->codigo }}	
													</td>
													<td>
														{{ $p->descripcion }}	
													</td>
													<td class="consulta-td">
														<a href="{{ action('SeccionContactoController@show', ['producto'=>$p->id]) }}">CONSULTAR</a>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>

								</div>
							</div>
						</div>
					</div>
				@endguest

				@auth('web')
				

				<div class="col s12 m12 l9">


					<div class="col s12" >
						<p id="productos-show-nombre">{{ $familia->nombre }}</p>
					</div>

				
					<div class="row">
						<div class="col s12">	
							<div id="medidas-productos">
								<table class="striped">
									<thead class="center">
										<tr>
											<th>
												
											</th>
											<th class="center">
												Código
											</th>
											<th>
												Descripción
											</th>
											<th class="center">
												Precio
											</th>
											<th class="center">
												Cantidad
											</th>
											<th class="center">
												Agregar
											</th>
										</tr>
									</thead>
									<tbody>
										@foreach($familia->productos as $p)
											
											<tr>
												<td class="image-td center" >
													@if (file_exists(public_path('images/productos/'.$p->file_image.'.jpg')))<img class="materialboxed" src="{{ asset('images/productos/'.$p->file_image.'.jpg') }}"> @else <img src="{{asset('images/productos/no-image.jpg')}}"> @endif	
												</td>
												<td class="codigo-td center">
													{{ $p->codigo }}	
												</td>
												<td>
													{{ $p->descripcion }}	
												</td>
												<td class="center">
													{{ $p->precio - $p->oferta }}	
												</td>
												<td class="center">
													<input min="1" required class="cantidad" name="cantidad[]" data-id="{{ $p->id }}" style="width: 50px" type="number" @if(in_array($p->id, $carrito))  value="{{ array_search($p->id, $carrito) }}" @else value="1" @endif >
													<input id="cantidad-{{$p->id}}" name="cantidad-{{$p->id}}" type="hidden" @if(in_array($p->id, $carrito))  value="{{ array_search($p->id, $carrito) }}" @else value="1" @endif >
												</td>
												<td class="center ">
													<div @if(in_array($p->id, $carrito)) 
															class="icon-shop-green add-cart"
														@else 
															class="icon-shop add-cart"
														@endif
														data-id="{{ $p->id }}" id="cart{{$p->id}}">
														<a href="#!"> 
															<i @if(in_array($p->id, $carrito)) 
																class="far fa-check-circle"
															@else 
																class="fas fa-cart-plus"
															@endif
															style="font-size: 30px;"></i> 
														</a>
													</div>
												</td>
											</tr>
										@endforeach
									</tbody>

									<tfoot>													
										<tr >
											<td colspan="3"></td>
											<td >
												<a href="{{ action('SeccionProductoController@index') }}" class=" z-depth-0 btn button-continuar-compra center-align" id="estandar-otro-btn">VER PRODUCTOS</a>					
											</td>

											<td >
												<a id="estandar-btn" class="btn center-align z-depth-0 confirmar-pedido " href="{{ url('/privada/pedido') }}">CONFIRMAR PEDIDO</a>	
											</td>

										</tr>
									</tfoot>
								</table>

							</div>
						</div>
					</div>
				</div>


					@endauth
				@endif


			@endforelse

				{{-- @forelse($productos_sf_familia as $p)

					<div class="col s12 m12 l3">

						<div class="card z-depth-0" id="subfamilia">

							<div class="subfamilia-productos">

						        <div class="efecto  hide-on-med-and-down">

									<a href="{{ action('SeccionProductoController@showProducto', ['id' => $p->familia_id, 'tipo' => 'producto']) }}"><img src="{{ asset('images/familias/hover-familias.png') }}" class="responsive-img" style="width: 100%; margin-left: 3%">	    </a>                

								</div>

								<a href="{{ action('SeccionProductoController@showProducto', ['id' => $p->familia_id, 'tipo' => 'producto']) }}">																@if (file_exists(public_path('images/productos/'.$p->file_image.'.jpg')))<img class="materialboxed" src="{{ asset('images/productos/'.$p->file_image.'.jpg') }}"> @else <img src="{{asset('images/productos/no-image.jpg')}}"> @endif	</a>

							</div>

							<div class="card-content" id="image-subfamilias-card-content" style="height: 50px;" >

								<span class="card-title center" id="image-subfamilias-card-content-title">{{ $p->descripcion }}</span>

							</div>

						</div>

					</div>

				@empty

					<p>

						No conseguimos productos relacionados a esta categoría

					</p>

				@endforelse --}}





	</div>
	</div>



@endsection
@include('layouts.script')
<script>

	$(document).ready(function(){  
		$('.materialboxed').materialbox();
		$( ".miniatura-img" ).click(function() {
			var src = $(this).data("srcimage");
			$("#bg-imagen").attr("src", src);
		});
		$('.slider').slider({
			height: 400,
		});




		$('.cantidad').on("change",function () {
			var cantidad = $(this).val();
			var id       = $(this).data('id');
		    $('#cantidad-'+id).text(cantidad);

			var updateCart  = "{{ action('SeccionPrivadaController@update')}}";

	        $.ajax({
        		data: {id: id, cantidad: cantidad},
        		method: 'POST',
	        	url: updateCart,
			  	headers: {
			    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  	}
	        })
	        .always(function(response, status, responseObject){
	        	console.log(response);
        		
	        });


		});

		$('.icon-shop').click(function() {
			console.log('1');
			var id       = $(this).data('id');
			var c        = $('#cantidad-'+id).val(); 
			var cantidad = $('#cantidad-'+id).text();

			if(cantidad == null || cantidad == '')
				cantidad = c;


			var addCart  = "{{ action('SeccionPrivadaController@store')}}";

	        $.ajax({
        		data: {id: id, cantidad: cantidad},
        		method: 'POST',
	        	url: addCart,
			  	headers: {
			    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  	}
	        })
	        .always(function(response, status, responseObject){
        		if(response['status'] == 0){
				    $("i", '#cart'+id).toggleClass("fas fa-cart-plus far fa-check-circle");
				    $('#cart'+id).toggleClass("icon-shop icon-shop-green");
        		}
	        });
		});


		$('.icon-shop-green').click(function() {
			var id         = $(this).data('id');			
			var removeItem = "{{ action('SeccionPrivadaController@remover')}}";

	        $.ajax({
        		data:{id: id},
        		method: 'POST',
	        	url: removeItem,
			  	headers: {
			    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  	}
	        })
	        .always(function(response, status, responseObject){
        		if(response['status'] == 0){
				    $("i", '#cart'+id).toggleClass("fas fa-cart-plus far fa-check-circle");
				    $('#cart'+id).toggleClass("icon-shop icon-shop-green");
        		}
	        });
		});


	});

</script>

</body>
</html>


