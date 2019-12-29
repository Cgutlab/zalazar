@include('adm.productos.partials.header')

				</div>

				<h5>Productos</h5>	
				<div class="right">
					<a href=" {{ action('ProductoController@carga')}} " class="btn waves-effect waves-light orange"><i style="font-size: 15px" class="fas fa-plus-circle"></i>CARGA AUTOMÁTICA</a>
				</div>				
				<div class="divider"></div>
				<table class="index-table-logos responsive-table mdl-data-table hover" id="table"  style="width:100%">
					<thead>
						<tr>
							<th>Orden</th>
							<th>Imagen</th>
							<th>Código</th>
							<th>Descripción</th>
							<th>Familia</th>
							<th>Subfamilia</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($productos as $p)
							<tr>
								<td>{{ $p->orden }}</td>
								<td>@if (file_exists(public_path('images/productos/'.$p->file_image.'.jpg')))<img src="{{ asset('images/productos/'.$p->file_image.'.jpg') }}"> @else <img src="{{asset('images/productos/no-image.jpg')}}"> @endif </td>
								<td>{{ $p->codigo }}</td>
								<td>{{ $p->descripcion }}</td>
								<td>{{ $p->familia->nombre }}</td>
								<td>{{ $p->subfamilia->nombre }}</td>
								<td>
									<a href=" {{ action('ProductoController@edit', $p->id)}} " class="btn-floating btn waves-effect waves-light orange"><i style="font-size: 15px" class="fas fa-pencil-alt"></i></a>
									<a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href=" {{ action('ProductoController@eliminar', $p->id)}} " class="btn-floating btn waves-effect waves-light deep-orange"><i style="font-size: 15px" class="fas fa-trash-alt"></i></a>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="7">No existen registros</td>
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