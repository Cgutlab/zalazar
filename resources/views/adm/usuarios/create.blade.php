	@include('adm.usuarios.partials.header')
					<a class="breadcrumb">Crear</a>
				</div>

				<h5>Crear Usuario</h5>					
				<div class="divider" style="margin-bottom: 5%"></div>
					<div class="col s12">

					<form method="POST"  enctype="multipart/form-data" action="{{action('UserController@store', ['tipo' => $tipo])}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
						{{ csrf_field() }}    

						<div class="row">
							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="name" >
								<label for="icon_prefix">Nombre</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="username" readonly>
								<label for="icon_prefix">Usuario</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="email">
								<label for="icon_prefix">Correo Electrónico</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="password" class="validate" name="password">
								<label for="icon_prefix">Contraseña</label>
							</div>

							@if($tipo == 'cliente')		
								<div class="input-field col s6">
									<i class="material-icons prefix">keyboard_arrow_right</i>
									<select name="parent_id">
										@foreach ($vendedores as $v)
											<option value="{{ $v->id }}"  > {{ ucwords($v->name) }}</option>
										@endforeach
									</select>

									<label for="icon_prefix">Vendedor Asignado</label>
								</div>	
								<div class="input-field col s6">
									<i class="material-icons prefix">keyboard_arrow_right</i>
									<select name="descuento_id">
										@foreach ($descuentos as $d)
											<option value="{{ $d->id }}"  > {{ ucwords($d->tipo) }}</option>
										@endforeach
									</select>

									<label for="icon_prefix">Descuento Asignado</label>
								</div>	

								<input type="hidden" name="tipo" value="cliente">			
							@endif

							@if($tipo == 'vendedor')	
								<input type="hidden" name="tipo" value="vendedor">			
								<input type="hidden" name="descuento_id" value="1">			
								<input type="hidden" name="parent_id" value="1">			
							@endif


						</div>
						<div class="row">
							<div class="right">
								<a href="{{action('UserController@index', ['tipo' => $tipo])}}"  class="waves-effect waves-light btn btn-color">Cancelar</a>
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