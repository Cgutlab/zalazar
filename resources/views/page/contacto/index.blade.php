@extends('app')



@section('content')





<body>



	<div class="contacto" style="background: #F4F4F4">

		

		<!-- Formulario  -->





			<div class="container" style="width: 95%">

				<div class="row">

					<div class="col s12" id="seccion-nombre"  style="border-top: 3px solid #5C89C5; margin-top: 5%">

						<span>Contacto</span>

					</div>

				</div>



				@include('page.contacto.partials.form')

			</div>





		@endsection

	</div>



	@include('layouts.script')

</body>

</html>





