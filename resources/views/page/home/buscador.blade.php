@extends('app')



@section('content')





<body>



	<div class="privada">

		

		<!-- Formulario  -->





			<div class="container container-fluid" style="padding-top: 5%">

				<div class="row">
					<div class="col s12" id="seccion-nombre"  style="border-top: 3px solid #5C89C5; margin-top: 5%">
						<span style="text-transform: capitalize">BÚSQUEDA</span>
					</div>
				</div>

				<div class="row">

								
					<form method="GET" action="{{action('SeccionHomeController@buscador')}}">
						<div class="col s12">
								
								<ul >
									<li>
							          <input id="icon_prefix" name="nombre" type="text" class="validate right " style="width: 80%;">
							          <i style="color: #5C89C5; margin-top: 5%" class="material-icons prefix right" >search</i>
							      	</li>     
								</ul>
							</div>
					</form>

				</div>

			</div>





		@endsection

	</div>



	@include('layouts.script')

</body>

</html>





