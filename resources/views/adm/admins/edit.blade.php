	@include('adm.usuarios.partials.header')

					<a class="breadcrumb">Editar</a>
				</div>

				<h5>Editar Usuario</h5>					
				<div class="divider" style="margin-bottom: 5%"></div>
					<div class="col s12">

					<form method="POST"  enctype="multipart/form-data" action="{{action('AdminController@update', $user->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
						{{ csrf_field() }}    
						{{ method_field('PUT')}}  

						<div class="row">
							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="username" readonly value="{{$user->username}}" >
								<label for="icon_prefix">Username</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="name" value="{{$user->name}}" >
								<label for="icon_prefix">Nombre</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="password" class="validate" name="password"   >
								<label for="icon_prefix">Contraseña</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<select name="tipo">
									@foreach ($tipo as $i => $t)
										<option value="{{ $i }}" @if($user->tipo == $i)  selected @endif > {{ ucwords($t) }}</option>
									@endforeach
								</select>
							</div>

						</div>
						<div class="row">
							<div class="right">
								<a href="{{action('AdminController@index')}}"  class="waves-effect waves-light btn  btn-color">Cancelar</a>
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