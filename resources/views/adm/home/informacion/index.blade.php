@include('adm.home.informacion.partials.header')

				</div>

				<h5>Información en HOME</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<tbody>
						@if($informacion)
							<tr>
								<td><b>Título 1</b></td>
								<td>{!! $informacion->titulo1 !!}</td>
							</tr>
							<tr>
								<td><b>Título 2</b></td>
								<td>{!! $informacion->titulo2 !!}</td>
							</tr>
							<tr>
								<td><b>Imagen</b></td>
								<td><img src="{{ asset('images/home/'.$informacion->file_image) }}"></td>
							</tr>
							<tr>
								<td colspan="2">
									<a href=" {{ action('HomeController@editInformacion', $informacion->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
								</td>
							</tr>
						@else
							<tr>
								<td colspan="4">No existen registros</td>
							</tr>
						@endif
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