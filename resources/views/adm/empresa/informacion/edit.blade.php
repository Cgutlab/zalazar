@include('adm.empresa.informacion.partials.header')


					<a class="breadcrumb">Editar</a>
				</div>

				<h5>Informacion</h5>					
				<div class="divider"></div>
				<div class="col s12">

					<form method="POST"  enctype="multipart/form-data" action="{{action('EmpresaController@update', $empresa->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
						{{ csrf_field() }}    
						{{ method_field('PUT')}}  

						<div class="row">
							<h5>Editar</h5>					
							<div class="divider"></div>
							<div class="row">
								<div class="file-field input-field s6">
									<div class="btn">
										<span>Imagen</span>
										<input type="file" name="file_image">            
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text">
										<span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado: 555x432</span>
									</div>
								</div>
							</div>
							

							<div class="row">
								
								<div class="col s12">
									<h6 for="textarea1">Descripción</h6>
								</div>
								<div class="input-field col s12">
									<textarea id="descripcion" name="descripcion"> {{ $empresa->descripcion }} </textarea>
								</div>

							</div>
							<div class="right">
								<a href="{{ action('EmpresaController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
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