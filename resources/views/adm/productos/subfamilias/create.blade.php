@include('adm.productos.familias.partials.header')
					<a class="breadcrumb">Crear</a>
				</div>

				<h5>Subfamilias</h5>					
				<div class="divider"></div>
				<div class="col s12">

					<form method="POST"  enctype="multipart/form-data" action="{{action('SubfamiliaController@store')}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
						{{ csrf_field() }}    

						<div class="row">
							<h5>Crear</h5>					
							<div class="divider"></div>


							<div class="file-field input-field s12">
								<div class="btn">
									<span>Imagen</span>
									<input type="file" name="file_image">            

								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
									<span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado: 266x279</span>
								</div>
							</div>
							
							<div class="file-field input-field s12">
								<div class="btn">
									<span>Ficha</span>
									<input name="file_ficha" type="file">
								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
									<span class="helper-text" data-error="wrong" data-success="right">Formato aceptado: PDF</span>

								</div>
							</div>

							<div class="input-field col s9">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="nombre" >
								<label for="icon_prefix">Nombre</label>
							</div>

							<div class="input-field col s3">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="orden" >
								<label for="icon_prefix">Orden</label>
							</div>

							<div class="col s12">
								<h6 for="textarea1">Descripción</h6>
							</div>
							<div class="input-field col s12">

								<textarea id="descripcion" name="descripcion"> </textarea>
							</div>



							<div class="input-field col s12">
								<select name="familia_id">
									@foreach ($familias as $f )
									<option value="{{ $f->id }}" >{{ ucwords($f->nombre) }} </option>
									@endforeach
								</select>
							</div>

							<div class="right">
								<a href="{{ action('SubfamiliaController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
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

	CKEDITOR.replace('descripcion');
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