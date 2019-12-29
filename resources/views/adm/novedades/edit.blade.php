@include('adm.novedades.partials.header')
					<a class="breadcrumb">Editar</a>
				</div>

				<h5>Novedades</h5>					
				<div class="divider"></div>
				<div class="col s12">

					<form method="POST"  enctype="multipart/form-data" action="{{action('NovedadController@update', $novedad->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
						{{ csrf_field() }}    
						{{ method_field('PUT')}}  

						<div class="row">
							<h5>Editar</h5>					
							<div class="divider"></div>



							<div class="file-field input-field s12">
								<div class="btn">
									<span>Imagen</span>
									<input type="file" name="file_image">            

								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
									<span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado: 682x405</span>
								</div>
							</div>

							<div class="input-field col s10">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="titulo" value="{{$novedad->titulo}}" >
								<label for="icon_prefix">Título</label>
							</div>

							<div class="input-field col s2">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="orden"  value="{{$novedad->orden}}" >
								<label for="icon_prefix">Orden</label>
							</div>
							<div class="col s12">
								<h6 for="textarea1">Texto</h6>
							</div>
							<div class="input-field col s12">

								<textarea id="texto" name="texto"> {!! $novedad->texto !!} </textarea>
							</div>

							<div class="input-field col s6">
								<select name="clasificacion_id">
									@foreach ($categorias as $c )
									<option value="{{ $c->id }}" @if($c->id == $novedad->clasificacion_id) selected @endif >{{ ucwords($c->nombre) }} </option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row">
							<div class="right">
								<a href="{{ action('NovedadController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
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

<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>

	CKEDITOR.replace('texto');
	CKEDITOR.config.height = '150px';
	CKEDITOR.config.width = '100%';

	$(document).ready(function(){		
		M.AutoInit();
		$('.collapsible').collapsible();
		$('select').formSelect();  
	});
</script>


</body>

</html>