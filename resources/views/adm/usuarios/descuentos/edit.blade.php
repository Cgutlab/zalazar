	@include('adm.usuarios.descuentos.partials.header')

					<a class="breadcrumb">Editar</a>
				</div>

				<h5>Editar Descuento</h5>					
				<div class="divider" style="margin-bottom: 5%"></div>
					<div class="col s12">

					<form method="POST"  enctype="multipart/form-data" action="{{action('ClienteDescuentoController@update',  ['id' => $descuento->id,  'tipo' => $tipo ])}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
						{{ csrf_field() }}    
						{{ method_field('PUT')}} 



						<div class="row">
							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" readonly value="{{$nombre}}" >
								<label for="icon_prefix">{{ucwords($tipo)}}</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="monto" value="{{$descuento->monto}}" >
								<label for="icon_prefix">Monto</label>
							</div>
							<input type="hidden" name="user_id" value="{{ $descuento->user_id }}">
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