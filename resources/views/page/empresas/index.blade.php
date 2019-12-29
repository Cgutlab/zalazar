@extends('app')

@section('content')


<body>


	@include('page.partials.slider')

	<div class="container" style="border-top: 3px solid #5C89C5">
		<div class="row">
			<div class="col s12" id="seccion-nombre">
				<span>Quiénes Somos</span>
			</div>

			<div class="col s12  m12 l6" id="descripcion-empresa">
				{!! $empresa->descripcion !!}
			</div>
			<div class="col s12  m12 l6">
				<img src="{{ asset('images/empresa/'.$empresa->file_image) }}" class="responsive-img">
			</div>
		</div>

	</div>

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


