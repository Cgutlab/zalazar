@include('adm.datos.contacto.partials.header')
					<a class="breadcrumb">Editar</a>
				</div>

				<h5>Información de Contacto</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<tbody>
						@if($telefono_fax)
							<tr>
								<td><b>Teléfono y Fax</b></td>
								<td>{{ $telefono_fax->descripcion }}</td>
								<td >
									<a href=" {{ action('DatoController@editContacto', $telefono_fax->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
								</td>
							</tr>
						@endif
						@if($telefono)
							<tr>
								<td><b>N° de Teléfono</b></td>
								<td>{{ $telefono->descripcion }}</td>
								<td >
									<a href=" {{ action('DatoController@editContacto', $telefono->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
								</td>
							</tr>
						@endif
						@if($email)
							<tr>
								<td><b>Correo Electrónico</b></td>
								<td>{{ $email->descripcion }}</td>
								<td >
									<a href=" {{ action('DatoController@editContacto', $email->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
								</td>
							</tr>
						@endif
						@if($whatsapp)
							<tr>
								<td><b>Whatsapp</b></td>
								<td>{{ $whatsapp->descripcion }}</td>
								<td >
									<a href=" {{ action('DatoController@editContacto', $whatsapp->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
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