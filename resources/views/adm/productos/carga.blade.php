		@include('adm.productos.partials.header')
			<a class="breadcrumb">Carga Automática </a>
			</div>

			<h5>Productos</h5>					
			<div class="divider"></div>
				<div class="col s12">

					<form method="POST"  enctype="multipart/form-data" action="{{action('ProductoController@archivo')}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
						{{ csrf_field() }}    

						<div class="row">
							<h5>Cargar archivo de productos</h5>					
							<div class="divider"></div>

							<div class="file-field input-field s12">
								<div class="btn">
									<span>Archivo</span>
									<input type="file" name="file">            

								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
									<span class="helper-text" data-error="wrong" data-success="right">Formato aceptado: .xlxs</span>
									<span class="helper-text" data-error="wrong" data-success="right" style="color: red; font-weight: bold">Nota: Verificar que no existan filas completamente vacías y que el archivo no contenga más de una hoja.</span>
								</div>
							</div>
						</div>

						<div class="right">
							<a href="{{ action('ProductoController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
							<button class="btn waves-effect waves-light btn-color" type="submit" name="action">Submit
								<i class="material-icons right">send</i>
							</button>
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
	


	$(document).on("change", '#familia', function () {
		var subfamiliasURL = "{{ url('adm/productos/select/subfamilias')}}";

		$.get(subfamiliasURL,
			{option: $(this).val()},
			function (data) {
				var model = $('#subfamilia');
				model.empty();
                    //model.append("<option value='1'>Ninguna</option>");
                    $.each(data, function (index, element) {
                    	model.append("<option value='" + element.id + "'>" + element.nombre + "</option>");

                    });
                    $('select').formSelect();  

                }
                );

	});
</script>


</body>

</html>