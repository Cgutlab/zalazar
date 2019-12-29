	@include('adm.usuarios.partials.header')

					<a class="breadcrumb">Editar</a>
				</div>

				<h5>Editar Usuario</h5>					
				<div class="divider" style="margin-bottom: 5%"></div>
					<div class="col s12">

					<form method="POST"  enctype="multipart/form-data" action="{{action('UserController@update',  ['tipo' => $user->tipo, 'id' => $user->id])}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
						{{ csrf_field() }}    
						{{ method_field('PUT')}}  

						<div class="row">

							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="name" value="{{$user->name}}" >
								<label for="icon_prefix">Nombre</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="username" readonly value="{{$user->username}}" >
								<label for="icon_prefix">Usuario</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="email" value="{{$user->email}}" >
								<label for="icon_prefix">Correo Electrónico</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="password" class="validate" name="password"   >
								<label for="icon_prefix">Contraseña</label>
							</div>

							@if($user->tipo == 'cliente')		
								<div class="input-field col s6">
									<i class="material-icons prefix">keyboard_arrow_right</i>
									<select name="parent_id">
										@foreach ($vendedores as $v)
											<option value="{{ $v->id }}" @if($user->parent_id == $v->id)  selected @endif > {{ ucwords($v->name) }}</option>
										@endforeach
									</select>

									<label for="icon_prefix">Vendedor Asignado</label>
								</div>	
								<div class="input-field col s6">
									<i class="material-icons prefix">keyboard_arrow_right</i>
									<select name="descuento_id">
										@foreach ($descuentos as $d)
											<option value="{{ $d->id }}" @if($user->descuento_id == $d->id)  selected @endif > {{ ucwords($d->tipo) }}</option>
										@endforeach
									</select>

									<label for="icon_prefix">Descuento Asignado</label>
								</div>	

								<input type="hidden" name="tipo" value="cliente">			
							@endif


							@if($user->tipo == 'vendedor')	
								<input type="hidden" name="tipo" value="vendedor">			
								<input type="hidden" name="descuento_id" value="1">			
								<input type="hidden" name="parent_id" value="1">			
							@endif



						</div>
						<div class="row">
							<div class="right">
								<a href="{{action('UserController@index', ['tipo' => $user->tipo, 'id' => $user->id])}}"  class="waves-effect waves-light btn  btn-color">Cancelar</a>
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