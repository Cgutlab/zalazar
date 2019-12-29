	@include('adm.usuarios.descuentos.partials.header')

				</div>

				<div class="col s12">
					<div class="col s6">
						<h5>Descuentos para el usuario {{ $user->username }}</h5>	
					</div>
					<div class="col s1 offset-s5">
						<a href=" {{ action('ClienteDescuentoController@create', $user->id)}}" class="btn-floating btn waves-effect waves-light orange"><i style="font-size: 15px" class="fas fa-plus"></i></a>
					</div>
				</div>				
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<thead>
						<tr>
							<th>Familia / Subfamilia</th>
							<th>Porcentaje</th>
							<th>Opciones</th>

						</tr>
					</thead>
					<tbody>
						@forelse($descuentos as $d)
							<tr>

								<td>{{ $d->nombre }}</td>
								<td>{{ $d->pivot->monto }}</td>
								<td>
									<a href=" {{ action('ClienteDescuentoController@edit', ['id' => $d->pivot->id, 'tipo' => ($d->pivot->subfamilia_id != null)?'subfamilia':'familia'])}}" class="btn-floating btn waves-effect waves-light blue"><i style="font-size: 15px" class="fas fa-edit"></i></a>
									<a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href=" {{ action('ClienteDescuentoController@eliminar', ['id' => $d->pivot->id, 'tipo' => ($d->pivot->subfamilia_id)?'subfamilia':'familia', 'user' => $user->id])}} " class="btn-floating btn waves-effect waves-light red"><i style="font-size: 15px"  class="fas fa-trash"></i></a>

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