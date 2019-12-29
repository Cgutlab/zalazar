
	@include('adm.usuarios.descuentos.partials.header')

					<a class="breadcrumb">Crear</a>
				</div>

				<h5>Crear Descuento</h5>					
				<div class="divider" style="margin-bottom: 5%"></div>
					<div class="col s12">

					<form method="POST"  enctype="multipart/form-data" action="{{action('ClienteDescuentoController@store')}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
						{{ csrf_field() }}    

						<div class="row">

							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<select class="materialSelect" id="familia" name="familia_id" ¿>
									<option value="">Familia</option>
									@foreach ($familias as $f )
										<option value="{{ $f->id }}">{{ ucwords($f->nombre) }} </option>
									@endforeach
								</select>
							</div>

							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="monto_f"  >
								<label for="icon_prefix">Monto de descuento Familia</label>
							</div>

							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<select class="materialSelect" id="subfamilia" name="subfamilia_id" >
									<option value="">Subfamilias</option>
									@foreach ($subfamilias as $sf )
										<option value="{{ $sf->id }}">{{ ucwords($sf->nombre) }} </option>
									@endforeach
								</select>
							</div>

							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="monto_sf"  >
								<label for="icon_prefix">Monto de descuento Subfamilia</label>
							</div>
							
							<input type="hidden" name="user_id" value="{{ $user->id }}">
						</div>
						<div class="row">
							<div class="right">
								<a href="#"  class="waves-effect waves-light btn  btn-color">Cancelar</a>
								<button class="btn waves-effect waves-light btn-color" type="submit" name="action">Submit
									<i class="material-icons right">send</i>
								</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>

</main>



@include('adm.layouts.script')
<script>

	$(document).ready(function(){		

		M.AutoInit();

		$('.collapsible').collapsible();

		$('select').formSelect();  

	});

</script>
</body>
</html>