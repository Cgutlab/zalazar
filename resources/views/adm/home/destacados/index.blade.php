@include('adm.home.destacados.partials.header')

				</div>

				<h5>Productos Destacados</h5>					
				<div class="divider"></div>
				<table class="index-table-logos responsive-table ">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Nombre</th>
							<th>Orden</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($destacados as $d)
							<tr>
								<td style="width: 200px;"><img src="{{ asset('images/subfamilias/'.$d->subfamilia->file_image) }}"></td>
								<td style="width: 100px;">{{ $d->subfamilia->nombre }}</td>
								<td>{{ $d->orden }}</td>
								<td>
									<a href=" {{ action('DestacadoController@edit', $d->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="material-icons">autorenew</i></a>								</td>
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



@include('layouts.script')



<script>



	$(document).ready(function(){		
		M.AutoInit();
		$('.collapsible').collapsible();
		$('select').formSelect();  

	});
</script>


</body>

</html>