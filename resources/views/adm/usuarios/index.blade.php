	@include('adm.usuarios.partials.header')

				</div>

				<h5>Usuarios</h5>					
				<div class="divider"></div>
				<table class="index-table-logos responsive-table mdl-data-table hover" id="table"  style="width:100%">
					<thead>
						<tr>
							<th>Código</th>
							<th>Username</th>
							<th>Nombre</th>
							<th>Email</th>
							<th>Opciones</th>

						</tr>
					</thead>
					<tbody>
						@forelse($usuarios as $u)
							<tr>
								<td>{{ $u->codigo }}</td>
								<td>{{ $u->username }}</td>
								<td>{{ $u->name }}</td>
								<td>{{ $u->email }}</td>
								<td>
									@if($u->tipo == 'cliente')
										<a href=" {{ action('ClienteDescuentoController@index', $u->id)}}" class="btn-floating btn waves-effect waves-light red"><i style="font-size: 15px" class="fas fa-percent"></i></a>
									@endif
									<a href=" {{ action('UserController@edit', [ 'id' => $u->id, 'tipo' => $u->tipo])}} " class="btn-floating btn waves-effect waves-light orange"><i  style="font-size: 15px"  class="fas fa-pencil-alt"></i></a>
									<a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href=" {{ action('UserController@eliminar',  ['tipo' => $u->tipo, 'id' => $u->id])}} " class="btn-floating btn waves-effect waves-light blue"><i style="font-size: 15px"  class="fas fa-user-minus"></i></a>
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