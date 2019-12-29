@include('adm.productos.subfamilias.partials.header')

				</div>

				<h5>Subfamilias</h5>					
				<div class="divider"></div>
				<table class="index-table-logos responsive-table mdl-data-table hover" id="table"  style="width:100%">
					<thead>
						<tr>
							<th>Orden</th>
							<th>Imagen</th>
							<th>Nombre</th>
							<th>Familia</th>
							<th>Ficha</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($subfamilias as $f)
							<tr>
								<td>{{ $f->orden }}</td>
								<td><img src="{{ asset('images/subfamilias/'.$f->file_image) }}"></td>
								<td >{{ $f->nombre }}</td>
								<td>{{ $f->familia->nombre }}</td>
								<td>{{ ($f->file_ficha != null)?'SÍ':'NO' }}</td>
								<td>
									<a href=" {{ action('SubfamiliaController@edit', $f->id)}} " class="btn-floating btn waves-effect waves-light orange"><i style="font-size: 15px;" class="fas fa-pencil-alt"></i></a>										
									<a href=" {{ action('GaleriaController@index', ['id' => $f->id, 'tipo' => 'productos'])}}" class="btn-floating btn waves-effect waves-light teal"><i title="Ver galeria de imágenes" class="material-icons">photo_library</i></a>
									<a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href=" {{ action('SubfamiliaController@eliminar', $f->id)}} " class="btn-floating btn waves-effect waves-light deep-orange"><i style="font-size: 15px;" class="fas fa-trash-alt"></i></a>

								</td>
							</tr>
						@empty
							<tr>
								<td colspan="5">No existen registros</td>
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