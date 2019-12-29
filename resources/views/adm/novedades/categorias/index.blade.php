@include('adm.novedades.categorias.partials.header')

				</div>

				<h5>Categorías</h5>					
				<div class="divider"></div>
				<table class="index-table-logos responsive-table ">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($categorias as $c)
							<tr>
								<td>{{ $c->nombre }}</td>
								<td>
									<a href=" {{ action('ClasificacionController@edit', $c->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
									<a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href=" {{ action('ClasificacionController@eliminar', $c->id)}} " class="btn-floating btn-large waves-effect waves-light deep-orange"><i class="fas fa-trash-alt"></i></a>

								</td>
							</tr>
						@empty
							<tr>
								<td colspan="2">No existen registros</td>
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