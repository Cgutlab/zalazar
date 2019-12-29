@include('adm.descuentos.partials.header')
				</div>
				<div class="col s6">
					<h5>Descuentos</h5>	
				</div>
				<div class="col s1 offset-s5">
					<a href=" {{ action('DescuentoController@create')}}" class="btn-floating btn waves-effect waves-light orange"><i style="font-size: 15px" class="fas fa-plus"></i></a>
				</div>				
				<div class="divider"></div>
				<table class="index-table-logos responsive-table ">
					<thead>
						<tr>
							<th>Tipo</th>
							<th>Porcentaje</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($descuentos as $d)
							<tr>
								<td>{{ $d->tipo }}</td>
								<td>{{ $d->monto }}%</td>
								<td>
									<a href=" {{ action('DescuentoController@edit', $d->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="3">No existen registros</td>
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