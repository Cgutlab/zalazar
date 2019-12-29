@include('adm.datos.redes.partials.header')
					<a class="breadcrumb">Editar</a>
				</div>

				<h5>Información de Redes Sociales</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<tbody>
						@if($ig)
							<tr>
								<td><b>Instagram</b></td>
								<td>{{ $ig->descripcion }}</td>
								<td >
									<a href=" {{ action('DatoController@editRedes', $ig->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
								</td>
							</tr>
						@endif
						@if($fb)
							<tr>
								<td><b>Facebook</b></td>
								<td>{{ $fb->descripcion }}</td>
								<td >
									<a href=" {{ action('DatoController@editRedes', $fb->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
								</td>
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