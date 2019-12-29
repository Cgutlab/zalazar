@include('adm.descuentos.partials.header')
					<a class="breadcrumb">Editar</a>
				</div>
				<form method="POST"  enctype="multipart/form-data" action="{{action('CatalogoController@update', $catalogo->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
					{{ csrf_field() }}    
					{{ method_field('PUT')}}  

					<div class="row">
						<h5>Editar Catálogo</h5>					
						<div class="divider"></div>


						<div class="input-field col s12">
							<i class="material-icons prefix">keyboard_arrow_right</i>
							<input id="icon_prefix" type="text" class="validate" name="link" value="{{$catalogo->link}}" >
							<label for="icon_prefix">Link</label>
						</div>

					</div>

					<div class="right">
						<a href="{{ action('CatalogoController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
						<button class="btn waves-effect waves-light btn-color" type="submit" name="action">Submit
							<i class="material-icons right">send</i>
						</button>
					</div>
				</div>
			</form>
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