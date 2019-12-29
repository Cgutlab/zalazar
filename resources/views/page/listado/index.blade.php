@extends('app')



@section('content')





<body>



	<div class="container">

		<div class="row">

			<div class="col s12" id="seccion-nombre" style="margin-top: 5%">

				<span>Lista de Precios</span>

			</div>



			@forelse($descargas as $d)

			<div class="col s12 m6 l3">

				<div class="card z-depth-0 card-catalogo" >

					<div class="card-image waves-effect waves-block waves-light" style="background: #e0e0e0; height: 180px; ">

						<img class="activator" src="{{ asset('images/catalogo/card-catalogo.png') }}" style="left: 30% !important;  top: 70% !important; width: auto !important">

					</div>

					<div class="card-content card-content-catalogo" style="padding: 10px; height: 100px">

						<span class="card-title card-title-catalogo">{{ $d->nombre }}</span>

					</div>

					<div class="card-content card-content-down-catalogo">

						<div class="col l6 center">

							<a href=" {{route('listado-view', $d->file)}}" target="_blank">

								<i class="fas fa-eye" style="color: #5C89C5; font-size: 20px;"></i>

							</a>

						</div>


					</div>

				</div>

			</div>

			@empty

			<p>No hay listados disponibles en este momento</p>

			@endforelse

		</div>



	</div>



	@endsection



	@include('layouts.script')



</body>

</html>





