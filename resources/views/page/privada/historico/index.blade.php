@extends('app')

@section('content')


<body>

	<div class="privada" >
		
		<!-- Formulario  -->


		<div class="container">
			@if($pedidos->count() >0 )

			<div class="tabla-pedidos" style="margin-top: 5%">

				<table class="orden-table">

					<thead class="pedidos-table">

						<tr >


							<th>#</th>
							<th>FECHA</th>
							<th>MONTO</th>
							<th>STATUS</th>

						</tr>

					</thead>

					<tbody>

						@foreach($pedidos as $p)
						<tr >

							<td>{{$p->id}}</td>
							<td>{{Carbon\Carbon::parse($p->created_at)->format('d/m/Y')}}</td>
							<td>${{$p->monto_total}}</td>
							<td>{{($p->status == 0)?'En Espera':'Confirmada'}}</td>
						</tr>
						@endforeach


					</tbody>
				</table>
			</div>
			@else
				<div class="center">
					
					<p>No ha realizado compras. </p>
					<a href="{{ action('SeccionProductoController@index') }}" class=" z-depth-0 btn button-continuar-compra center-align" id="estandar-otro-btn">VER PRODUCTOS</a>					

				</div>
			@endif


		</div>



		@endsection
	</div>

	@include('layouts.script')


</body>
</html>


