@include('adm.novedades.partials.header')

				</div>

				<h5>Novedades</h5>					
				<div class="divider"></div>
				<table class="index-table-logos responsive-table mdl-data-table hover" id="table"  style="width:100%">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Título</th>
							<th>Texto</th>
							<th>Categoría</th>
							<th>Orden</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($novedades as $n)
							<tr>
								<td style="width: 150px;"><img src="{{ asset('images/novedades/'.$n->file_image) }}"></td>
								<td style="width: 100px;">{{ $n->titulo }}</td>
								<td style="width: 250px;">{!! substr($n->texto, 0, 150) !!} ...</td>
								<td>{{ $n->clasificacion->nombre }}</td>
								<td>{{ $n->orden }}</td>
								<td>
									<a href=" {{ action('NovedadController@edit', $n->id)}} " class="btn-floating btn waves-effect waves-light orange"><i style="font-size: 15px;" class="fas fa-pencil-alt"></i></a>
									<a href=" {{ action('ImagenController@index', $n->id)}}" class="btn-floating btn waves-effect waves-light teal"><i title="Ver galeria de imágenes" class="material-icons">photo_library</i></a>
									<a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href=" {{ action('NovedadController@eliminar', $n->id)}} " class="btn-floating btn waves-effect waves-light deep-orange"><i style="font-size: 15px;" class="fas fa-trash-alt"></i></a>

								</td>
							</tr>
						@empty
							<tr>
								<td colspan="6">No existen registros</td>
							</tr>
						@endforelse
					</tbody>
				</table>

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