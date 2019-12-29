@include('adm.novedades.galeria.partials.header')
					<a class="breadcrumb">Editar</a>
				</div>
				<form method="POST"  enctype="multipart/form-data" action="{{action('ImagenController@update', $galeria->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
					{{ csrf_field() }}    
					{{ method_field('PUT')}}  

					<div class="row">
						<h5>Editar Imagen de la Galería</h5>					
						<div class="divider"></div>
						<div class="file-field input-field s12">
							<div class="btn">
								<span>Imagen</span>
								<input type="file" name="file_image">            

							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
								<span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado: 400x400</span>
							</div>
						</div>
					</div>

					<div class="right">
						<a href="{{ action('NovedadController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
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