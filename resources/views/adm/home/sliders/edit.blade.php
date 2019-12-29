@include('adm.sliders.partials.header')

					<a class="breadcrumb">Editar</a>
				</div>

				<form method="POST"  enctype="multipart/form-data" action="{{action('SliderController@update', ['id' => $slider->id, 'seccion' => 'home'])}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
					{{ csrf_field() }}    
					{{ method_field('PUT')}}  

					<div class="row">
						<h5>Editar Slider</h5>					
						<div class="divider"></div>
						<div class="file-field input-field s12">
							<div class="btn">
								<span>Imagen</span>
								<input type="file" name="file_image">            

							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
								<span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado: 1400x450</span>
							</div>
						</div>

						<div class="row">
							
							<div class="col s12">
								<h6 for="textarea1">Título</h6>
							</div>
							<div class="input-field col s12">
								<textarea id="titulo" name="titulo"> {{$slider->titulo}} </textarea>
							</div>

						</div>

						<div class="row">
							
							<div class="col s12">
								<h6 for="textarea1">Descripción</h6>
							</div>
							<div class="input-field col s12">
								<textarea id="descripcion" name="descripcion"> {{$slider->descripcion}} </textarea>
							</div>

						</div>

						<div class="input-field col s6">
							<select name="seccion" disabled>
								<option value="home" >Home</option>
							</select>
						</div>
						<div class="input-field col s6">
							<i class="material-icons prefix">text_rotation_none</i>
							<input id="icon_prefix" type="text" class="validate" name="orden"  value="{{ $slider->orden }}">
							<label for="icon_prefix">Orden</label>
						</div>
					</div>

					<div class="row">					
						<div class="right">
							<a href="{{ action('SliderController@index', ['seccion' => 'home']) }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
							<button class="btn waves-effect waves-light btn-color" type="submit" name="action">Submit
								<i class="material-icons right">send</i>
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</main>

	@include('adm.layouts.script')
	 
	<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
	<script>

		CKEDITOR.replace('titulo');
		CKEDITOR.config.height = '150px';
		CKEDITOR.config.width = '100%';

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