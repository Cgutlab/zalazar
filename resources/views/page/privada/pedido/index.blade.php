@extends('app')

@section('content')


<body>

	<div class="privada" >
		
		<!-- Formulario  -->


		<div class="container container-fluid" id="pedido-div">
			@if($cart != '')

			<div class="tabla-pedidos" style="margin-top: 5%">

				<table class="orden-table">

					<thead class="pedidos-table">

						<tr >

							<th></th>

							<th colspan="2">CÓDIGO</th>

							<th>DESCRIPCIÓN</th>
							<th>CATEGORÍA</th>
							<th class="center">CANTIDAD</th>

							<th class="center">PRECIO ($)</th>

							<th class="center">TOTAL ($)</th>
							<th class="center">ELIMINAR</th>

						</tr>

					</thead>

					<tbody>

						@foreach($cart as $c)
						<tr id="item-{{$c->id}}">

							<td><img style="max-width: 80px; border: 1px solid #BBBBBB" src="{{ asset('images/subfamilias/'.$c->attributes->get('image')) }}" alt=""></td>

							<td colspan="2">{{$c->attributes->get('codigo')}}</td>
							<td >{{$c->name}}</td>
							<td>{{$c->attributes->get('categoria')}}</td>

							<td class="cantidad-td center" data-descuento="{{(\Auth::user()->tipo == 'cliente')?$user->descuento->monto:$cliente->descuento->monto }}" data-cantidad="{{ $c->quantity }}" data-precio="{{ $c->price-$c->attributes->oferta }}" data-producto={{ $c->id }}>{{ $c->quantity }}</td>
							<td class="precio-td center"  >${{$c->price-$c->attributes->oferta}}</td>

							<td class="monto-total center" id="monto_total-td-{{ $c->id }}"  data-descuento_total="{{ $descuento }}" data-descuento_sf="{{ ($c->attributes->get('subfamilia_monto') == 0)?0:$c->attributes->get('subfamilia_monto') }}" data-descuento_f="{{ ($c->attributes->get('familia_monto') == 0)?0:$c->attributes->get('familia_monto') }}" data-cantidad="{{  $c->quantity }}" data-precio="{{ $c->price-$c->attributes->oferta }}" ></td>
							<td class="center"><a href="#!" class="icon-remove" data-id="{{ $c->id }}"><i style="color: #9B9B9B; font-size: 25px;" class="far fa-trash-alt"></i></a></td>

						</tr>
						@endforeach


					</tbody>


					<tfoot style="border-top: 2px solid #01275C">

						<tr style="border: 0 !important" >

							<td colspan="5"><textarea placeholder="Mensaje adicional" name="mensaje"  style="height: 100px;"></textarea></td>
							<td colspan="3" style="text-align: right">Subtotal</td>
							<td style="text-align: right" id="subtotal"></td>
						</tr>

						<tr  style="border: 0 !important"  >

							<td colspan="5"></td>
							<td colspan="3" style="text-align: right">Descuento</td>
							<td style="text-align: right" data-descuento="{{ $descuento }}"  id="descuento" ></td>
						</tr>

						<tr style="border: 0 !important">

							<td colspan="5"></td>
							<td colspan="3" style="text-align: right">Total</td>
							<td id="total" style="font-size: 20px;font-weight: 900; text-align: right"></td>
							<input type="hidden" id="total-input" name="monto_total">
						</tr>

						<tr style="border: 0 !important">

							<td colspan="6"></td>
							<td colspan="3" style="border-top: 1px solid #CCCCCC !important; color: #5C89C5; font-size: 15px; font-weight: 900">PRECIOS SIN IVA</td>
						</tr>

						<tr >
							<td colspan="6"></td>
							<td style="width: 200px">
								<a href="{{ action('SeccionProductoController@index') }}" class=" z-depth-0 btn button-continuar-compra center-align" id="estandar-otro-btn">CONTINUAR PEDIDO</a>					
							</td>

							<td style="width: 200px">
								<a id="estandar-btn" class="btn center-align z-depth-0 confirmar-pedido ">CONFIRMAR PEDIDO</a>	
							</td>

						</tr>

					</tfoot>
				</table>
			</div>
			@else
				<div class="center">
					
					<p>No tiene elementos agregados en su pedido. </p>
					<a href="{{ action('SeccionProductoController@index') }}" class=" z-depth-0 btn button-continuar-compra center-align" id="estandar-otro-btn">VER PRODUCTOS</a>					

				</div>
			@endif


		</div>


		<!-- Modal Structure -->
		<div id="modal1" class="modal">
			<div class="modal-content">
				<p>¡Muchas gracias por su compra!</p>
				<p>Nuestro equipo se pondrá en contacto con usted.</p>
			</div>
			<div class="modal-footer">
				<a href="{{ action('SeccionProductoController@index') }}" class="modal-close waves-effect waves-green btn-flat">OK</a>
			</div>
		</div>

		@endsection
	</div>

	@include('layouts.script')

	<script type="text/javascript">
		
    	$('.modal').modal();

    	function calculo(){
			monto_total = [];
			total       = 0;
			aux         = 0;
			desc        = 0;
			totalTotal  = 0;

			$('.orden-table').find('.cantidad-td').each(function(){
				var cantidad  = ($(this).data('cantidad'));
				var precio    = ($(this).data('precio'));
				var producto  = ($(this).data('producto'));
				var descuento = ($(this).data('descuento'));

				monto_total[producto]  = cantidad*precio;
				aux++
			});

			jQuery.each(monto_total, function(index, value){
				$('#monto_total-td-'+index).html(value);
			})

			$('.orden-table').find('.monto-total').each(function(){
				var descuento_f     = $(this).data('descuento_f');
				var descuento_sf    = $(this).data('descuento_sf');
				var descuento_total = $(this).data('descuento_total');
				var cantidad        = $(this).data('cantidad');
				var precio          = $(this).data('precio');


				var descuento = 0;

				if(descuento_sf != 0){
					descuento = descuento_sf;
				}else{
					if(descuento_f != 0){
						descuento = descuento_f;
					}else{
						if(descuento_total != '0'){
							descuento = descuento_total;
						}
					}
				}
				var monto_total     = cantidad * precio;

				var monto_descuento = (monto_total * descuento)/100;
				
				var monto_final     = monto_total - monto_descuento;

				$(this).html('$'+monto_final.toFixed(2));

				total = parseFloat(total) + parseFloat(monto_total);
				desc  = parseFloat(desc) + parseFloat(monto_descuento);
			})

			//var descuento = $('#descuento').data('descuento');

			//var desc  = (descuento*total)/100;
			//var totalTotal = total - ((descuento*total)/100);
 
			totalTotal = total - desc;

			$('#subtotal').html('$'+total.toFixed(2));
			$('#descuento').html('$'+desc.toFixed(2));
			$('#total').html('$'+totalTotal.toFixed(2));
			$('#total-input').val(totalTotal.toFixed(2));

    	}

		$(document).ready(function(){

		
			calculo();

			$('.icon-remove').click(function() {
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
						$('#item-'+id).remove();

						calculo();
					}
				});
			});

			$('.confirmar-pedido').click(function() {
				var monto = $('#total-input').val();

				var overlay= "<div class='overlay'><i class='fa fa-refresh' fa-spin></i></div>";

	    		$('#pedido-div').append(overlay);


				var confirmar = "{{ action('SeccionPrivadaController@confirmar')}}";

				$.ajax({
					data:{monto: monto},
					method: 'POST',
					url: confirmar,
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				})
				.always(function(response, status, responseObject){

	    			$('#pedido-div .overlay').remove();

					alertify.minimalDialog || alertify.dialog('minimalDialog',function(){
					    return {
					        main:function(content){
					            this.setContent(content); 
					        },
					        setup:function(){
					            return { 
					              options: {
					              	title: 'Confirmación de Pedido'
					              } 
					            };
					        },
					    };
					});


					alertify.minimalDialog("Comprar registrada exitósamente. Nuestro equipo lo contactará."+
											"</br>"+
											"</br>"+
											"</br>"+
											"</br>"+
											"<a href='{{ action('SeccionPrivadaController@historico') }}'> Ver Pedido </a>");

				});


			});


		});

	</script>

</body>
</html>


