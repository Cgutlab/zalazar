@include('adm.logos.partials.header')
				</div>
				<h5>Logos</h5>					
				<div class="divider"></div>
				<table class="index-table-logos responsive-table ">
					<thead>
						<tr>
							<th>Logo</th>
							<th>Ubicación</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($logos as $l)
							<tr>
								<td style="width: 350px"><img src="{{ asset('images/logos/'.$l->file_image) }}"></td>
								 @switch($l->ubicacion)
									@case('navbar')
										<td>Barra Principal</td>  
									@break 
									@case('footer')
										<td>Pie de Página</td> 
									@break  
									@default 
										<td>Favicon</td> 										
								@endswitch
								<td>
									<a href=" {{ action('LogoController@edit', $l->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
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