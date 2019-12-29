	<div class="row" >

		<div class="col s12 m3 l3">

			<ul>

				<li class="contacto-text" >

					<div class="row">

						<div class="col s1 contacto-icon">

							<i class="fas fa-phone-volume"></i>

						</div>

						<div class="col s10">

							<span>Teléfono y Fax:</span>

						</div>

						<div class="col s9 offset-s1">

							<a href="tel:{{ $telefono_fax->descripcion }}">{{ $telefono_fax->descripcion }}</a>

						</div>

						<div class="col s9 offset-s1" style="margin-top: 5%">

							<span>Teléfono:</span>

						</div>

						<div class="col s9 offset-s1">

							<a href="tel:{{ $telefono->descripcion }}">{{ $telefono->descripcion }}</a>

						</div>

					</div>

				</li>

				<li class="contacto-text" style="margin-bottom: 10px">

					<div class="row">

						<div class="col s1 contacto-icon">

							<i class="fas fa-envelope"></i>

						</div>

						<div class="col s10">

							<a href="mailto:{{ $email->descripcion }}">{{ $email->descripcion }}</a> 

						</div>

					</div>

				</li>

			</ul>

		</div>

		<div class="col s12 m12 l8 offset-l1">
			

		<form method="POST"  enctype="multipart/form-data" action="{{action('SeccionContactoController@store')}}" class="col s12 l9 ">

			{{ csrf_field() }}



			<div class="row">

				<div class="input-field col s12 m6 l6">

					<input id="icon_prefix" type="text" class="validate" name="nombre"  value="{{ old('nombre') }}">

					<label class="label-form-contact" for="icon_prefix">Nombre</label>

				</div>

				<div class="input-field col s12 m6 l6">

					<input id="icon_prefix" type="text" class="validate" name="apellido"  value="{{ old('apellido') }}">

					<label class="label-form-contact" for="icon_prefix">Apellido</label>

				</div>

			</div>

			<div class="row">

				<div class="input-field col s12 m6 l6">

					<input id="email" type="email"  name="email" class="validate"  value="{{ old('email') }}">

					<label class="label-form-contact" for="email">Email</label>

				</div>

				<div class="input-field col s12 m6 l6">

					<input  id="empresa" type="text" name="empresa" class="validate"  value="{{ old('empresa') }}">

					<label class="label-form-contact" for="empresa">Empresa</label>

				</div>

			</div>

			<div class="row">

				<div class="input-field col s12 m6 l12">

					<input style="height: 150px;" id="mensaje" type="text" name="mensaje" class="validate"  @if($mensaje!='') value="{{$mensaje}}" @else value="{{ old('mensaje') }}" @endif>

					<label class="label-form-contact" for="mensaje">Mensaje</label>

				</div>

				<div class="input-field col s12 m6 l6">

					<div class="g-recaptcha" data-sitekey = "{{env('GOOGLE_RECAPTCHA_SITE_KEY')}}"></div>

				</div> 

				<div class="input-field col s12 m6 l5 offset-l1">

					<p>

						<label>

							<input type="checkbox" required name="condiciones" />

							<span>Acepto los términos y condiciones</span>

						</label>

					</p>

				</div> 

			</div>

			<div class="center">

				<button class="btn button-enviar-mas z-depth-0 center" type="submit" style="background-color: #425E89; width: 132px; color: #FFFFFF;" name="action">Enviar</button>

			</div>

		</form>
		</div>

	</div>

