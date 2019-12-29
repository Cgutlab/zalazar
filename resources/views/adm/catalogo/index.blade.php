@include('adm.catalogo.partials.header')

				</div>

				<h5>Catálogos</h5>					
				<div class="divider"></div>
				<table class="index-table-logos responsive-table ">
					<thead>
						<tr>
							<th>Link</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@if($catalogo->link != null)
							<tr>
								<td>{{ $catalogo->link }}</td>
								<td>
									<a href=" {{ action('CatalogoController@edit', $catalogo->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
								</td>
							</tr>
						@else
							<tr>
								<td colspan="2">No existen registros</td>
							</tr>
						@endif
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