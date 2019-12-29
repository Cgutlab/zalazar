@extends('app')

@section('content')


<body>


    <div class="container" style="border-top: 3px solid #5C89C5; margin-top: 5%;">
        <div class="col s12" id="seccion-nombre">
            <span>Registrarme</span>
        </div>

        @if ($errors->any())
	        <div class="row" style="margin-top: 5%">
	            <div class="card-panel alert-error">
	                <ul><li>ALERTA:
		                    @foreach ($errors->all() as $error)
		                    {{ $error }}
		                    @endforeach
		                </li>
		            </ul>
		        </div>
		    </div>
	    @endif

	    @if (session('alert'))
	    <div class="card-panel alert-success">
	        <ul>
	            <li>ALERTA:
	                {{ session('alert') }}              
	            </li>
	        </ul>
	    </div>
	    @endif
	    
	    <form method="POST" action="{{ route('enviar-correo') }}" aria-label="{{ __('Register') }}">
	        @csrf

	        <div class="form-group row">
	            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

	            <div class="col-md-6">
	                <input id="nombre" placeholder="Ingrese su nombre y apellido" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="name" value="{{ old('nombre') }}" required autofocus>

	                @if ($errors->has('nombre'))
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('nombre') }}</strong>
	                </span>
	                @endif
	            </div>
	        </div>

	        <div class="form-group row">
	            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

	            <div class="col-md-6">
	                <input  placeholder="Ingrese su dirección de correo electrónico" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

	                @if ($errors->has('email'))
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
	                @endif
	            </div>
	        </div>

	        <input type="hidden" name="parent_id" value="1">

	        <div class="form-group row mb-0">
	            <div class="col-md-6 offset-md-4">
	                <button id="estandar-btn"  type="submit" class="btn btn-primary z-depth-0">
	                    {{ __('Registrar') }}
	                </button>
	            </div>
	        </div>
	    </form>
	</div>

@endsection
@include('layouts.script')


	<script>
		$(document).ready(function(){		
			M.AutoInit();
			$('.collapsible').collapsible();
			$('select').formSelect();  

		});
	</script>
</body>

</html>