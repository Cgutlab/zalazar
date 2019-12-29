@include('adm.logos.partials.header')
					<a class="breadcrumb">Editar</a>
				</div>
				<form method="POST"  enctype="multipart/form-data" action="{{action('LogoController@update', $logo->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
					{{ csrf_field() }}    
					{{ method_field('PUT')}}  

					<div class="row">
						<h5>Editar Logo</h5>					
						<div class="divider"></div>
						<div class="file-field input-field s12">
							<div class="btn">
								<span>Imagen</span>
								<input type="file" name="file_image">            

							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
								@switch($logo->ubicacion)
									@case('navbar')
										<span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado: 134x137</span>
									@break
									@case('footer')
										<span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado: 134x137</span>
									@break
									@default
										<span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado: 32x32</span>
								@endswitch
							</div>
						</div>

						<div class="input-field col s12">
							<select name="seccion" disabled>
								@foreach ($secciones as $i => $s)
								<option value="{{ $i }}" @if($i == $logo->ubicacion) selected @endif >{{ ucwords($s) }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="right">
						<a href="{{ action('LogoController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
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