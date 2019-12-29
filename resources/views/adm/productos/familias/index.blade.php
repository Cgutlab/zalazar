@include('adm.productos.familias.partials.header')

				</div>

				<h5>Familias</h5>					
				<div class="divider"></div>
				<table class="index-table-logos responsive-table mdl-data-table hover" id="table"  style="width:100%">
					<thead>
						<tr>
							<th>Orden</th>
							<th>Imagen</th>
							<th>Nombre</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($familias as $f)
							<tr>
								<td>{{ $f->orden }}</td>
								<td><img src="{{ asset('images/familias/'.$f->file_image) }}"></td>
								<td >{{ $f->nombre }}</td>
								<td>
									<a href=" {{ action('FamiliaController@edit', $f->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
									<a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href=" {{ action('FamiliaController@eliminar', $f->id)}} " class="btn-floating btn-large waves-effect waves-light deep-orange"><i class="fas fa-trash-alt"></i></a>

								</td>
							</tr>
						@empty
							<tr>
								<td colspan="4">No existen registros</td>
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